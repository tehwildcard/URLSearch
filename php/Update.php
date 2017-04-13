<?php
/**
 * Created by PhpStorm.
 * User: Clay
 * Date: 4/10/2017
 * Time: 6:40 PM
 */

$url = isset($_POST["url"]) ? $_POST["url"] : "";
$description = isset($_POST["description"]) ? $_POST["description"] : "";

$inputlist = array("url" => "URL", "description" => "Description");


//inserts correctly into database, does not update existing entries
//$query = "INSERT INTO urltable " . "(URL,Description)" . "VALUES ( '$url', '$description')";


$query = "INSERT INTO urltable " . "(URL,Description)" . "VALUES ( '$url', '$description')" . "ON DUPLICATE KEY UPDATE URL " . "VALUES  ('$url' , '$description')";

//Connect to Database
if( !( $database = @mysql_connect("CopDataSvr.ccec.unf.edu","n00934565","34565Spr2017#")))
    die("Could not connect to database </body></html>" );

//Open Database
if ( !mysql_select_db("n00934565", $database ))
    die("Could not open urltable database </body></html>" );

if ( !( $result = mysql_query( $query, $database ) ) )
{
    print("<p>Could not execute query!</p>" );
    die( mysql_error() . "</body></html>" );
}else{
    print("<p>Record added!</p>" );
}

mysql_close($database);


?>