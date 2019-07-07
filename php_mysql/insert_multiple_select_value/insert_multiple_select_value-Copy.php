<?php
	$server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "rasoft";
    
    $con = mysql_connect($server,$db_user,$db_pass) && mysql_select_db($db_name);
    
    if(!$con)
    {
        echo "can not be connected";
    }
    else{
        //echo "connected";
    }
?>
 
<?php
if (isset($_POST['submit'])) {

	$fee_desc = $_POST['course'];
	$sdate = $_POST['sdate'];
	 
	foreach($fee_desc as $fee_description) {
	 $sql = mysql_query("INSERT INTO multy (course,sdate) VALUES ('$fee_description','$sdate')") or die (mysql_error());
	}
	 
	if($sql) 
	{
		header("location: insert_multiple_select_value-Copy.php");
	}
	else 
	{
	    echo mysql_error();
	}
} 
?>
			<form method="post" action="" class="box validate">
                <div class="header">
                    <h2>Multiple List Select an Date Entry</h2>
                </div>
                <div class="content">
	                <fieldset>
	                    <p class="_75 small">
	                        <label>Class:</label>
	                        <select  multiple="multiple" class="search" data-placeholder="Choose a fee" name="course[]">
	                        	<option value="Class One">Class One</option>
	                            <option value="Class Two">Class Two</option>
	                            <option value="Class Three">Class Three</option>
	                            <option value="Class Four">Class Four</option>
	                            <option value="Class Five">Class Five</option>
	                            <option value="Class Six">Class Six</option>
	                            <option value="JHS One">JHS One</option>
	                            <option value="JHS Two">JHS Two</option>
	                            <option value="JHS Three">JHS Three</option>
	                    	</select>
	                    </p>
	                 </fieldset>
	                 <fieldset>
	                    <p  class="_25 small" style="padding-bottom: 10px;">
	                    <label >Start Date</label><br>
	                    <input type="date"  id="startdate" name="sdate" />
	                    </p>
	                </fieldset>
                </div>
                <div class="actions">                   
                    <div class="right">
                        <input type="submit" name="submit" value="Send"  id="fee-submit" />
                    </div>
                </div>
            </form>    

