<?php
session_start();
require_once 'config.php';
$GLOBALS['config']=array(
	'mysql'=>array('host'=>DB_SERVER,'username'=>DB_USER,'password'=>DB_PASS,'db'=>DB_NAME),
	'remember'=>array('h_type'=>'sha1','cookie_name'=>'hsh','cookie_expiry'=>604800),
	'session'=>array('session_name'=>'uzr','token_name'=>'tokn')
);
spl_autoload_register(function($class){
	require_once 'cls/'.$class.'.php';
});

function escape($string){
	return htmlentities($string,ENT_QUOTES,'UTF-8');
}
if(Cookie::exists(Config::get('remember/cookie_name'))&&!Session::exists(Config::get('session/session_name'))){
	$hash=Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck=DB::getInstance()->get('user_session',array('hash','=',$hash));
	if($hashCheck->count()){
		$user=new User($hashCheck->first()->userid);
		$user->login();
	}
}