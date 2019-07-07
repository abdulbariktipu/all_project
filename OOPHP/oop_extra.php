<?php
	/**
	* 
	*/
	class book
	{
		private $abc='You can access me (abc) inside of test class';
			public function xyz(){
				echo $this->abc;
			}
		
	}
	$b = new book();
	//echo $b->abc;
	$b->xyz();
	//echo $b->p;
?>