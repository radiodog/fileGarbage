<?php
namespace App\Classes;

use \PDO;
/**
* 
*/
class UserDataTable 
{
	private $container;
	function __construct($container)
	{
		$this->container = $container;
	}

	public function addConnection(){
		$settings = $this->container['settings']['db'];
		$driver = $settings['driver'];
		$host = $settings['host'];
		$port = $settings['port'];
		$database = $settings['database'];
		$user = $settings['user'];
		$password = $settings['password'];

		try
		{
        $dbn = new PDO("$driver:host=$host;port=$port;dbname=$database; user=$user; password=$password");
    	}
		catch (PDOException $e)
 		{
    	echo $e->getMessage();
    	}
    	return $dbn;
	}

	public function getAll()
	{
		return $row = $this->container['dbn']->query('SELECT * from files ');
	}

	public function returnResultData($row)
	{
		$this->container['resultData'] = [];
		while ($result= $row->fetch(PDO::FETCH_ASSOC)) {
			$this->container['resultData'] =  new Model\FileClass($result['name'],$result['size'],$result['created_at'],$result['comment']);
		}
		return $this;
	}
}