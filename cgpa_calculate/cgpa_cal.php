<?php
	// $s1 = $_POST['point1'];
	// $s2 = $_POST['point2'];

	// $c1 = $_POST['credit1'];
	// $c2 = $_POST['credit2'];

	// $suball = (($s1*$c1) + ($s2*$c2));

	// //echo $suball;
?>

<!DOCTYPE html>
<html>
<head>
	<title>CGPA Calculate</title>
	<!-- <script type="text/javascript" src="jquery.js"></script> -->
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(e){
			$("input").change(function(){
				var total=0;
				$("input[name=point]").each(function(){
					total = total + parseInt($(this).val());
				})
				$("input[name=gd_point1]").val(total);
			});
		});
	</script>

<!-- <script type="text/javascript">
	$('.num').change(function(){
    var tot = 1;
    $.each($('input[class=num]'),function(){
      var curr_val = $(this).val();
        if(curr_val != ""){
          tot = tot * curr_val;
          $('.tot').val(tot);
        }
    });
});

Please enter value 1: <input value="" type="text"  class='num'/><br/>
Please enter value 2: <input value=""  type="text" class='num'/><br/>
Please enter value 3: <input value=""  type="text" class='num'/><br/>
Please enter value 4: <input value=""  type="text" class='tot'/><br/>
</script> -->

<script type="text/javascript">
	$(document).ready(function(){
	$("input").change(function(){
	var amount1=$("#amount1").val();
	var amount2=$("#amount2").val();
	var Total=amount1+amount2;
	$("#total").attr("value", Total);
	});
	});
</script>



</head>
<body>
<input type="text" name="amount1" class="amount1">*
<input type="text" name="amount1" class="amount1">=
<input type="text" name="amount1" class="total">

<form action="" method="post">	
<table border="1">
<tr>
	<th>Grade</th>
	<th>Point</th>
	<th>*Credit</th>
	<th>=Grade Points</th>
</tr>
	<tr>
		<td>
			<select id="grade1">
				<option id="grade1">A+ (80-100)</option>
				<option id="grade1">A (80-100)</option>
				<option id="grade1">A- (80-100)</option>
				<option id="grade1">B+ (80-100)</option>
				<option id="grade1">B (80-100)</option>
			</select>
		</td>
		<td><input type="text" name="point" id="point1"></td>
		<td>*<input type="text" name="point" id="credit1"></td>
		<td>=<input type="text" name="gd_point1" id="gd_point1"></td>
	</tr>

	<tr>
		<td>
			<select id="grade2">
				<option id="grade2">A+ (80-100)</option>
				<option id="grade2">A (80-100)</option>
				<option id="grade2">A- (80-100)</option>
				<option id="grade2">B+ (80-100)</option>
				<option id="grade2">B (80-100)</option>
			</select>
		</td>
		<td><input type="text" name="point2" id="point2"></td>
		<td>*<input type="text" name="credit2" id="credit2"></td>
		<td>=<input type="text" name="gd_point2" id="gd_point2"></td>
	</tr>
	<input type="submit" name="submit" onclick="cal();">
</table>
</form>

</body>
</html>