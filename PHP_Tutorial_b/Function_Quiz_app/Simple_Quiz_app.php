<?php
	$question = "What is the most powerful computer in the world?";
	$option = array("Supercomputer"=>"Supercomputer","Personal Computer"=>"PC");
	$correct_answer="Supercomputer";
	$selected_answer="";

	//handle onchange event
	if (isset($_POST["answer"])) 
	{
		$selected_answer=$_POST['answer'];
	}

	function get_quiz_html()
	{
		global $question;
		global $option;
		global $selected_answer;
		global $correct_answer;

		$html='';
		$html.='<h3>'.$question.'</h3>';
		$html.='<br/>';
		foreach ($option as $k => $v) 
		{
			$checked="";
			$cssClass="";
			if ($selected_answer==$v) 
			{
				if ($selected_answer==$correct_answer) 
				{
					echo 'Correct answer is: '.$correct_answer;					
					$checked="checked";
					$cssClass='green';
				}
				else
				{
					echo 'Incorrect answer is: '.$selected_answer;
					$cssClass="red";
				}
			}
			$html.='<span class="'.$cssClass.'">'.$k.'<input name="answer" '.$checked.' type="radio" value="'.$v.'" onchange="this.form.submit();" /></span>';
		}
		return $html;
	}
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Simple Quiz application in PHP</title>
</head>
<style type="text/css">
	.green
	{
		background-color: green;
		color: white;
	}
	.red
	{
		background-color: red;
		color: white;
	}
</style>
<body>
	<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
	<?php
		echo get_quiz_html();
	?>
	</form>
</body>
</html>