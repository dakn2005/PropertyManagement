<?php 

//EDIT YOUR MySQL Connection Info: 
$DB_Server = "localhost";        //your MySQL Server 
$DB_Username = "root";                 //your MySQL User Name 
$DB_Password = "";                //your MySQL Password 
$DB_DBName = "propertymanager1";                //your MySQL Database Name 
$DB_TBLName = $_GET['dbtab'];             //your MySQL Table Name 

echo "Outputting $DB_TBLName";

if ($DB_TBLName==null || $DB_TBLName=="")
    exit;

//$sql = "Select * from $DB_TBLName"; 

//Optional: print out title to top of Excel or Word file with Timestamp 
//for when file was generated: 
//set $Use_Titel = 1 to generate title, 0 not to use title 
$Use_Title = 1; 
//define date for title: EDIT this to create the time-format you need 
$now_date = date('m-d-Y H:i'); 
//define title for .doc or .xls file: EDIT this if you want 
$title = "Report: $DB_TBLName from Database $DB_DBName on $now_date "; 
/* 

Leave the connection info below as it is: 
just edit the above. 

(Editing of code past this point recommended only for advanced users.) 
*/ 
//create MySQL connection 
//$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) 
//     or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno()); 
//select database 
//$Db = @mysql_select_db($DB_DBName, $Connect) 
//     or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno()); 
//execute query 
//$result = @mysql_query($sql,$Connect) 
//     or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno()); 


//if this parameter is included ($w=1), file returned will be in word format ('.doc') 
//if parameter is not included, file returned will be in excel format ('.xls') 
if (isset($w) && ($w==1)) 
{ 
     $file_type = "msword"; 
     $file_ending = "doc"; 
}else { 
     $file_type = "vnd.ms-excel"; 
     $file_ending = "xls"; 
} 
//header info for browser: determines file type ('.doc' or '.xls') 
header("Content-Type: application/$file_type"); 
header("Content-Disposition: attachment; filename=database_dump.$file_ending"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 

/*    Start of Formatting for Word or Excel    */ 

if (isset($w) && ($w==1)) //check for $w again 
{ 
     /*    FORMATTING FOR WORD DOCUMENTS ('.doc')   */ 
     //create title with timestamp: 
     if ($Use_Title == 1) 
     { 
         echo("$title\n\n"); 
     } 
     //define separator (defines columns in excel & tabs in word) 
     $sep = "\n"; //new line character 

     while($row = mysql_fetch_row($result)) 
     { 
         //set_time_limit(60); // HaRa 
         $schema_insert = ""; 
         for($j=0; $j<mysql_num_fields($result);$j++) 
         { 
         //define field names 
         $field_name = mysql_field_name($result,$j); 
         //will show name of fields 
         $schema_insert .= "$field_name:\t"; 
             if(!isset($row[$j])) { 
                 $schema_insert .= "NULL".$sep; 
                 } 
             elseif ($row[$j] != "") { 
                 $schema_insert .= "$row[$j]".$sep; 
                 } 
             else { 
                 $schema_insert .= "".$sep; 
                 } 
         } 
         $schema_insert = str_replace($sep."$", "", $schema_insert); 
         $schema_insert .= "\t"; 
         print(trim($schema_insert)); 
         //end of each mysql row 
         //creates line to separate data from each MySQL table row 
         print "\n----------------------------------------------------\n"; 
     } 
}else{ 
     /*    FORMATTING FOR EXCEL DOCUMENTS ('.xls')   */ 
     //create title with timestamp: 
     if ($Use_Title == 1) 
     { 
         echo("$title\n"); 
     } 
     //define separator (defines columns in excel & tabs in word) 
     $sep = "\t"; //tabbed character 

     //start of printing column names as names of MySQL fields 
     for ($i = 0; $i < mysql_num_fields($result); $i++) 
     { 
         echo mysql_field_name($result,$i) . "\t"; 
     } 
     print("\n"); 
     //end of printing column names 

     //start while loop to get data 
     while($row = mysql_fetch_row($result)) 
     { 
         //set_time_limit(60); // HaRa 
         $schema_insert = ""; 
         for($j=0; $j<mysql_num_fields($result);$j++) 
         { 
             if(!isset($row[$j])) 
                 $schema_insert .= "NULL".$sep; 
             elseif ($row[$j] != "") 
                 $schema_insert .= "$row[$j]".$sep; 
             else 
                 $schema_insert .= "".$sep; 
         } 
         $schema_insert = str_replace($sep."$", "", $schema_insert); 
         //following fix suggested by Josue (thanks, Josue!) 
         //this corrects output in excel when table fields contain \n or \r 
         //these two characters are now replaced with a space 
         $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert); 
         $schema_insert .= "\t"; 
         print(trim($schema_insert)); 
         print "\n"; 
     } 
} 

?> 
