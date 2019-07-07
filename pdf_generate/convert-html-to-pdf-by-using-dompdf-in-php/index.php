<?php
//index.php
//include autoloader
 
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();
if(isset($_POST["create_pdf"]))
{
$html = '
	<style>
table {
  border: 2px solid black;
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin:40px;
}
#formate
{
   border: 2px solid black;
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin:40px;
    text-align:center;
    padding: 8px;
}

td, th {
    border: 1px solid green;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<div id="formate">
<table>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table>
<p>https://www.webslesson.info/2017/04/convert-html-to-pdf-in-php-using-dompdf.html</p>
<div>';

$document->set_option('defaultFont', 'Courier');
$document->loadHtml($html);
/*$page = file_get_contents("cat.html"); // Show anothor page
//$document->loadHtml($page);

// below data show from database
$connect = mysqli_connect("localhost", "root", "", "testing1");

$query = "
	SELECT category.category_name, product.product_name, product.product_price
	FROM product 
	INNER JOIN category 
	ON category.category_id = product.category_id
";
$result = mysqli_query($connect, $query);

$output = "
	<style>
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
<table>
	<tr>
		<th>Category</th>
		<th>Product Name</th>
		<th>Price</th>
	</tr>
";

while($row = mysqli_fetch_array($result))
{
	$output .= '
		<tr>
			<td>'.$row["category_name"].'</td>
			<td>'.$row["product_name"].'</td>
			<td>$'.$row["product_price"].'</td>
		</tr>
	';
}

$output .= '</table>';

//echo $output;

$document->loadHtml($output);*/
// end data show from database

//set page size and orientation

$document->setPaper('A4', 'landscape');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("HTML_TO_PDF", array("Attachment"=>0));
//1  = Download
//0 = Preview
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Daynamic data to PDF</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    </head>
    
    <body>
        <br /><br />
        <div class="cotainer" style="width: 700px;">
            <h3>Export HTML Table data to PDF using DOMPDF in PHP</h3><br />
            <form action="" method="post">
                <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />
            </form>
        </div>
    </body>
</html>