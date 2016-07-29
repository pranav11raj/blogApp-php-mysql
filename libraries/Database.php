<?php


class Database
{
	public $db_host=DB_HOST;
	public $db_user=DB_USER;
	public $db_pass=DB_PASS;
	public $db_name=DB_NAME;

	public $link;

	public $error;

	public function __construct()

	{

		

		// Call connect function

		$this->connect();


	}

	private function connect()
	{
		$this->link= new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);

		if(!$this->link)
		{
			$this->error="Connection Failed";
			return false;
		}

	}

	public function select($query)
	{
		$result = $this->link->query($query) or die ("Query could not execute");
		if($result->num_rows > 0)
		{
			return $result;
		}
		else
		{
			return false;
		}
	}

	public function insert($query)
	{
		$insert_row = $this->link->query($query) or die ("Query could not execute");

		if($insert_row)
		{
			header("Location: index.php?msg=".urlencode('Record Added'));
			exit();
		}
		else
		{
			die("Insert SQL command could not execute");

		}
	}

	public function update($query)
	{
		$update_row = $this->link->query($query) or die ($this->link->error.__LINE__);

		if($update_row)
		{
			header("Location: index.php?msg=".urlencode('Record Updated'));
			exit();
		}
		else
		{
			die("Update SQL command could not execute");

		}
	}

	public function delete($query)
	{
		$delete_row = $this->link->query($query) or die ("Query could not execute");

		if($delete_row)
		{
			header("Location: index.php?msg=".urlencode('Record Deleted'));
			exit();
		}
		else
		{
			die("Delete SQL command could not execute");

		}
	}

}



?>