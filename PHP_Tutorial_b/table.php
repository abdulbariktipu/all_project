<!DOCTYPE html>
<html>
	<head>
		
		<title>Page Title</title>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>		
		<script>
			function printDiv(divName) {
			     var printContents = document.getElementById(divName).innerHTML;
			     var originalContents = document.body.innerHTML;
			     document.body.innerHTML = printContents;
			     window.print();
			     document.body.innerHTML = originalContents;
			}
		</script>
				  
		<style>
		@page 
		{
		  size: A4;
		  margin: 0;
		}
		@media print {
		  html, body {
		    width: 210mm;
		    height: 297mm;
		  }
		  /* ... the rest of the rules ... */
		}
			table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			  
			}

			tr:nth-child(even) {
			  background-color: #dddddd;
			}
		</style>

	</head>	
	<body>
		<input type="button" onclick="printDiv('printableArea')" value="print a div!" />
		<div id="printableArea">
			<div>
				<h2>HTML Table</h2>
				<table>
					<thead>
						<tr>
						    <th>SL</th>
						    <th>Company</th>
						    <th>Contact</th>
						    <th>Country</th>
						  </tr>
					</thead>
					<tbody>
						<?php
							$arr=array('1'=>'a','2'=>'c','3'=>'d','4'=>'e','5'=>'a','6'=>'7','8'=>'d','9'=>'e','11'=>'a','12'=>'c','13'=>'d','14'=>'e','1'=>'a','2'=>'c','3'=>'d','4'=>'e','5'=>'a','6'=>'7','8'=>'d','9'=>'e','11'=>'a','12'=>'c','13'=>'d','14'=>'e','43'=>'a','223'=>'c','434'=>'d','122'=>'e','232'=>'a','71'=>'rr','545'=>'d','233'=>'e','545'=>'a','233'=>'c','56'=>'d','67'=>'e','1'=>'a','2'=>'c','3'=>'d','4'=>'e','5'=>'a','6'=>'7','8'=>'d','9'=>'e','11'=>'a','12'=>'c','13'=>'d','14'=>'e','878'=>'a','8785'=>'c','44'=>'d','33'=>'e','66'=>'a','78'=>'7TT','90'=>'d','89'=>'e','097'=>'a','234'=>'c','65'=>'d','890'=>'e','345'=>'a','677'=>'c','322'=>'d','776'=>'e','433'=>'a','2345'=>'rr','876'=>'d','4567'=>'e','908'=>'a','3452'=>'c','234'=>'d','902'=>'e');
							$i=1;
							foreach ($arr as $key => $value) 
							{
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $value; ?></td>
									<td><?php echo $value; ?></td>
									<td><?php echo $value; ?></td>
								</tr>
								<?php
								$i++;
							}
						?>						
					</tbody>
				</table>

			</div>
		</div>		
	</body>
</html>
