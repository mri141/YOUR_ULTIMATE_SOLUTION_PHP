<?php
class User{
	private $_db,$_data,$_sessionName,$_cookieName,$_isLoggedIn;
	public function __construct($user=null){
		$this->_db=DB::getInstance();
		$this->_sessionName=Config::get('session/session_name');
		$this->_cookieName=Config::get('remember/cookie_name');
		if(!$user){
			if(Session::exists($this->_sessionName)){
				$user=Session::get($this->_sessionName);
				if($this->find($user)){
					$this->_isLoggedIn=true;
				}else{
					$this->logout();
				}
			}
		}else{
			$this->find($user);
		}
	}
	public function update($fields=array(),$id=null){
		if(!$id&&$this->isLoggedIn()){
			$id=$this->data()->id;
		}
		if(!$this->_db->update('user',$id,$fields)){
			throw new Exception('There was a problem updating.');
		}
	}
	public function create($fields=array()){
		if(!$this->_db->insert('user',$fields)){
			throw new Exception('There was a problem creating an account.');
		}
	}
	public function find($user=null){
		if($user){
			$field=(is_numeric($user))?'id':'username';
			$data=$this->_db->get('user',array($field,'=',$user));
			if($data->count()){
				$this->_data=$data->first();
				return true;
			}
		}
		return false;
	}
	public function login($username=null,$password=null,$remember=false){
		if(!$username&&!$password&&$this->exists()){
			Session::put($this->_sessionName,$this->data()->id);
		}else{
			$user=$this->find($username);

			if($user){
				if(Hash::decript($this->data()->password)===$password){
					Session::put($this->_sessionName,$this->data()->id);
					if($remember){
						$hash=HASH::unique();
						$hashCheck=$this->_db->get('user_session',array('userid','=',$this->data()->id));
						if(!$hashCheck->count()){
							$this->_db->insert('user_session',array(
								'userid'=>$this->data()->id,
								'hash'=>$hash
							));
						}else{
							$hash=$hashCheck->first()->hash;
						}
						Cookie::put($this->_cookieName,$hash,Config::get('remember/cookie_expiry'));
					}
					return true;
				}
			}
		}
		return false;
	}
public function exists(){
		return (!empty($this->_data))?true:false;
	}
	public function data(){
		return $this->_data;
	}
	public function isLoggedIn(){
		return $this->_isLoggedIn;
	}
	public function logout(){
		$this->_db->delete('user_session',array('userid','=',$this->data()->id));
		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}
	public function permission($key){
		$role=$this->_db->get('role',array('id','=',$this->data()->role));
		if($role->count()){
			$permissions=json_decode($role->first()->permission,true);
			if($permissions[$key]==true){
				return true;
			}
		}
		return false;	
	}
}