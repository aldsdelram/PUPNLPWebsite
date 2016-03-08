<?php

	function generate_salt(){
		$random = md5(uniqid(rand(), true));
    	return substr($random, 0, 13);
	}

	function encrypt_salt($text,$salt)
    {  
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }
 
    function decrypt_salt($text,$salt)
    {  
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }

    function hash_password($password, $salt)
    {
    	return hash("sha512", "en3lP1" . $password . "To0l8" . $salt);
    }

    function verify($password, $hashed_password, $salt){
        $original_salt = decrypt_salt($salt, 'enElpiPUP1516');
        $hashed_password2 = hash_password($password, $original_salt);
        if($hashed_password2 === $hashed_password)
            return true;
        else
            return false;
    }
?>