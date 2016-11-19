<?php
class product{
	protected $id;
	protected $name;
	protected $price;
	protected $dateAdded;
	public function __construct($id,$n,$p){
		$this->id = $id;
		$this->name = $n;
		$this->price = $p;
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
}
?>