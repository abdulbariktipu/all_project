<?php
include ("db.php");

$first_name='Tania';
$last_name='Tipu';
$email='Sultan';

  $form_data = array(
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
);



$output = DBInsert('functional', $form_data);//function call
if($output){
    echo "Successfully";
}

/*INSERT*/
function DBInsert($table_name, $form_data)
{
    // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);

    // build the query
    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";

    // run and return the query result resource
    return mysql_query($sql);
}



// $sql = "INSERT INTO functional(`first_name`,`last_name`,`email`)
// VALUES('Tipu','Sultan','tstipou')";
// $result = mysql_query($sql);
// if ($result) {
//     echo 'Successfully';
// }


?>


<?php
/*
DATA ARRAY EXAMPLE
  $form_data = array(
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'address1' => $address1,
    'address2' => $address2,
    'address3' => $address3,
    'postcode' => $postcode,
    'tel' => $tel,
    'mobile' => $mobile,
    'website' => $website,
    'contact_method' => $contact_method,
    'subject' => $subject,
    'message' => $message,
    'how_you_found_us' => $how_you_found_us,
    'time' => time()
);
USING FUNCTIONS
DBSelect('my_table', $select, "WHERE fecha = '$fecha'");
DBInsert('my_table', $form_data);
DBUpdate('my_table', $form_data, "WHERE id = '$id'");
DBDelete('my_table', "WHERE id = '$id'");
*/

/*SELECT*/
// again where clause is left optional
/*
function DBSELECT($table_name, $select='*', $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "SELECT ".$select." FROM ".$table_name." ";
    // append the where statement
    $sql .= $whereSQL;
    // run and return the query result
    return mysql_query($sql);
}


/*INSERT*/
/*
function DBInsert($table_name, $form_data)
{
    // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);
    // build the query
    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";
    // run and return the query result resource
    return mysql_query($sql);
}
*/


/*UPDATE*/
// again where clause is left optional
/*
function DBUpdate($table_name, $form_data, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table_name." SET ";
    // loop and build the column /
    $sets = array();
    foreach($form_data as $column => $value)
    {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);
    // append the where statement
    $sql .= $whereSQL;
    // run and return the query result
    return mysql_query($sql);
}
*/


/*DELETE*/
// the where clause is left optional incase the user wants to delete every row!
/*
function DBDelete($table_name, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add keyword
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // build the query
    $sql = "DELETE FROM ".$table_name.$whereSQL;
    // run and return the query result resource
    return mysql_query($sql);
}
/*
?>