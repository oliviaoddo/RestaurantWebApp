<?php
class product{
	protected $id;
	protected $name;
	protected $price;
	protected $dateAdded;
	public function __construct($id,$n,$p,$dA){
		$this->id = $id;
		$this->name = $n;
		$this->price = $p;
		$this->dateAdded = $dA;
	}
	public function getID(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	public function getPrice(){
		return $this->price;
	}
	public function getDateAdded(){
		return $this->dateAdded;
	}
}
?>