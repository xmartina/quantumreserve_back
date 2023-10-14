<?php
error_reporting(0);
$db_config_path = '../application/config/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST) {
    
	require_once('includes/taskCoreClass.php');
	require_once('includes/databaseLibrary.php');

	$core = new Core();
	$database = new Database();

	if($core->checkEmpty($_POST) == true)
	{
                if(false){
                        $message = $core->show_message('error',$core->cd_check($_POST)->msg);
                }
                else if($database->create_database($_POST) == false)
                {
                        $message = $core->show_message('error',"The database could not be created, make sure that your the host, username, password and database name is correct.");
                } 
                else if ($database->create_tables($_POST) == false)
                {
                        $message = $core->show_message('error',"The database could not be created, make sure that your the host, username, password and database name is correct.");
                } 
                else if ($core->checkFile() == false)
                {
                        $message = $core->show_message('error',"File application/config/database.php is Empty");
                }
                else if ($core->write_db_config($_POST) == false)
                {
                        $message = $core->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
                }		
	}
	else {
		$message = $core->show_message('error','The host, username, password, database name are required.');
	}
	
	echo $message;
}
?>
