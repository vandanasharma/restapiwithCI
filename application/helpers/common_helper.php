<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('sanitizeData')){
	function sanitizeData($Data,$type=''){
		$CI=& get_instance();
		$Data = $CI->security->xss_clean($Data);
		if($type!='')
		{			
			switch(strtolower($type)){
				case 'int':
				$Data = (int)$Data;
				break;
				case 'array':
				$Data = (array)$Data;
				break;
				case 'float':
				$Data = (float)$Data;
				break;
				case 'bool':
				$Data = (bool)$Data;

			}
		}
		return $Data;
	}

if(!function_exists('validateDateTime')){
	 function validateDateTime($date) {

		$dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date);
		$errors = DateTime::getLastErrors();
		if (!empty($errors['warning_count'])) {
			return false;
		}else{
			return true;
		}
    }
}
}
?>