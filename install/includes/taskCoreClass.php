<?php
class Core {
	function checkEmpty($data)
	{
	    if(!empty($data['hostname']) && !empty($data['username']) && !empty($data['database']) && !empty($data['template']) && !empty($data['purchasecode'])){
	        return true;
	    }else{
	        return false;
	    }
	}

	function show_message($type,$message) {
		return $message;
	}
	
	function getAllData($data) {
		return $data;
	}

	function write_db_config($data) {

        if($data['template'] == 2){
		    $template_path 	= 'includes/templatevtwo.php';
        }else if($data['template'] == 3){
            $template_path 	= 'includes/templatevthree.php';
        }
		$output_path 	= '../application/config/database.php';

		$database_file = file_get_contents($template_path);

		$new  = str_replace("%HOSTNAME%",$data['hostname'],$database_file);
		$new  = str_replace("%USERNAME%",$data['username'],$new);
		$new  = str_replace("%PASSWORD%",$data['password'],$new);
		$new  = str_replace("%DATABASE%",$data['database'],$new);

		$handle = fopen($output_path,'w+');
		@chmod($output_path,0777);
		
		if(is_writable($output_path)) {
			if(fwrite($handle,$new)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function write_config($data) {

       
		$template_path 	= 'includes/config.php';
       
		$output_path 	= '../application/config/config.php';

		$config_file = file_get_contents($template_path);

		$new  = str_replace("%BASE_URL%", $data['url'] ,$config_file);
		

		$handle = fopen($output_path,'w+');
		@chmod($output_path,0777);
		
		if(is_writable($output_path)) {

			if(fwrite($handle,$new)) {
				return true;
			} else {
				return false;
			}
		} else {
			return true;
		}
	}

	function cd_check($data)
	{
		$cd = $data['purchasecode'];
		$d = $this->isLocalhost() == 1 ? 'localhost' : $_SERVER['HTTP_HOST'];
		// Build the request
		$ch = curl_init();

		/* Array Parameter Data */
		$data = ['code'=>$cd, 'domain'=>$d];
		
		curl_setopt_array($ch, array(
			CURLOPT_URL => "https://axis96.co/purchaseverifier",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 20,
			CURLOPT_POSTFIELDS => $data,
		));

		// Send the request with warnings supressed
		$response = @curl_exec($ch);

		return json_decode($response);
	}
	
	function checkFile(){
	    $output_path = '../application/config/database.php';
	    
	    if (file_exists($output_path)) {
           return true;
        } 
        else{
            return false;
        }
	}

	function isLocalhost($whitelist = ['127.0.0.1', '::1']) {
        return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
    }
}