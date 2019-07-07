<!doctype>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>example1-year-function - php mysql examples | w3resource</title>
<meta name="description" content="example1-year-function - php mysql examples | w3resource">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
            <h2>Date From Year</h2>
               <table class='table table-bordered'>
               <tr style="background: green"> 
                  <th>SL</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Year</th>
               </tr>
               <?php
               
                  function change_date_format($date, $new_format)
                  {
                     $new_sep = "";                  
                     if ($new_sep=="") $new_sep="-";

                     $year=date("Y",strtotime($date));
                     $mon=date("m",strtotime($date));
                     $day=date("d",strtotime($date));
                     
                     if ($new_format=="yyyy-mm-dd")  // yyyy-mm-dd
                     $dd= $year.$new_sep.$mon.$new_sep.$day ;
                     else if ($new_format=="dd-mm-yyyy")  // dd-mm-yyyy
                     $dd= $day.$new_sep.$mon.$new_sep.$year ;
                     //if ($dd=="1970-01-01" || $dd=="01-01-1970" || $dd=="30-11--0001") return ""; else return $dd;
                     return $dd;                 
                  }


                  $hostname="localhost";
                  $username="root";
                  $password="";
                  $db = "ajaxdata";
                  $db_type = "";
                  $dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
                  foreach($dbh->query('SELECT id,`name`,tgl,YEAR(tgl) `year` FROM `tabledata` WHERE YEAR(tgl)>2016') as $row) 
                  {
                     echo "<tr>"; 
                     echo "<td>" . $row['id'] . "</td>";
                     echo "<td>" . $row['name'] . "</td>";
                     $originalDate = $row['tgl'];
                     //$newDate = date("d-m-Y", strtotime($originalDate)); // or below

                     $txt_date=change_date_format($originalDate,'dd-mm-yyyy');
                     
                     echo "<td>" . $txt_date . "</td>";
                     echo "<td>" . $row['year'] . "</td>";
                     echo "</tr>"; 
                  }
               ?>
               </tbody>
               </table>
            </div>
         </div>
      </div>
   </body>
</html>
