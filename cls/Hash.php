<?php
class Hash{
	public $key = 'password to (en/de)crypt';
	public $iv;

	public static function make($string,$salt=''){
		return hash(Config::get('remember/h_type'),$string.$salt);
	}
	public static function salt($length){
		return mcrypt_create_iv($length);
	}
	public static function unique(){
		return self::make(uniqid());
	}


	public static function encript($string){
		$key = 'password to (en/de)crypt';
		$iv = mcrypt_create_iv(
		    mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
		    MCRYPT_DEV_URANDOM
		);
		$encrypted = base64_encode(
		    $iv .
		    mcrypt_encrypt(
		        MCRYPT_RIJNDAEL_128,
		        hash('sha256', $key, true),
		        $string,
		        MCRYPT_MODE_CBC,
		        $iv
		    )
		);

		return $encrypted;

	}
	public static function decript($encrypted){
		$data = base64_decode($encrypted);
		$iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
		$key = 'password to (en/de)crypt';

		$string = rtrim(
		    mcrypt_decrypt(
		        MCRYPT_RIJNDAEL_128,
		        hash('sha256', $key, true),
		        substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
		        MCRYPT_MODE_CBC,
		        $iv
		    ),
		    "\0"
		);

		return $string;
	}
}