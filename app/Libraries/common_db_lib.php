<?php 
    namespace App\Libraries;
    
class common_db_lib{
	function __construct()
	{
		// Call the Model constructor
		$this->db = \Config\Database::connect();
	}
}


?>