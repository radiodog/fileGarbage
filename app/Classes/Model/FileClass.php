<?php
namespace App\Classes\Model;

/**
* 
*/
class FileClass
{
	private $name;
	private $size;
	private $created_at;
	private $comment;
	function __construct($name,$size,$created_at,$comment)
	{
		$this->name = $name;
		$this->size = $size;
		$this->created_at = $created_at;
		$this->comment = $comment;
	}
	public function getName()
	{
		return $this->name;
	}

	public function getSize()
	{
		return $this->size;
	}

	public function getCreated_at()
	{
		return $this->created_at;
	}

	public function getComment()
	{
		return $this->comment;
	}
}