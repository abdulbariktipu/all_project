
 
	<?php
  include "inc/header.php";
		//Class Create
		class Person
		{
			public $name="Tipu";
			public $age;

			public function PersonName(){
				echo "Person Name Is: ".$this->name."<br/>";
			}

			public function PersonAge($value){
				echo "Person age Is: ".$this->age=$value."<br/>";
			}
		}

		//Create Object
		$PersonOne = new Person;
		//echo $PersonOne->name;
		$PersonOne->PersonName();

		$PersonOne->PersonAge("18");

    include "inc/footer.php";
	?>     