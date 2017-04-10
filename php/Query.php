<?php
/**
 * Created by PhpStorm.
 * User: Clay
 * Date: 4/9/2017
 * Time: 12:28 PM
 */
        $select = $_POST["select"];

        //build select query
        $query = "SELECT " . $select . " FROM urltable";
        //connect to database
        if( !( $database = @mysql_connect("CopDataSvr.ccec.unf.edu","n00934565","34565Spr2017#")))
            die("Could not connect to database </body></html>" );
        //open Products database
        if ( !mysql_select_db("n00934565", $database ))
            die("Cant open table </body></html>" );
        if ( !( $result = mysql_query( $query, $database ) ) )
        {
            print("<p>Search Failed</p>" );
            die( mysql_error() . "</body></html>" );
        }
        mysql_close($database);
    ?>

<table>
    <caption>Results of SELECT <?php print( "$select" ) ?>FROM urltable</caption>

    <?php
    while( $row = mysql_fetch_row( $result ) )
    {
        print("<tr>");
        foreach ($row as $value)
            print("<td>$value</td>" );
        print("</tr>");
    }
    ?>
</table>
<?php

$url = isset($_POST["url"]) ? $_POST["url"] : "";
$description = isset($_POST["description"]) ? $_POST["description"] : "";

$inputlist = array("url" => "URL", "description" => "Description");

$query = "INSERT INTO urltable " .
"(URL,Description)" .
"VALUES( '$url', '$description')";

//connect to database
if( !( $database = @mysql_connect("CopDataSvr.ccec.unf.edu","n00934565","34565Spr2017#")))
die("Could not connect to database </body></html>" );

//open Database
if ( !mysql_select_db("n00934565", $database ))
die("Could not open database </body></html>" );

if ( !( $result = mysql_query( $query, $database ) ) )
{
print("<p>Could not execute.</p>" );
die( mysql_error() . "</body></html>" );
}else{
print("<p>URL and Description added to Database.</p>" );
}

mysql_close($database);

?>
