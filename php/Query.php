<?php
/**
 * Created by PhpStorm.
 * User: Clay
 * Date: 4/9/2017
 * Time: 12:28 PM
 */
$select = $_POST["select"];

//Create Select query
$query = "SELECT " . $select . " FROM urltable";

//Communicate with database
if( !( $database = @mysql_connect("CopDataSvr.ccec.unf.edu","n00934565","34565Spr2017#")))
    die("Could not connect to database </body></html>" );
//Open Database
if ( !mysql_select_db("n00934565", $database ))
    die("Could not open database </body></html>" );
if ( !( $result = mysql_query( $query, $database ) ) )
{
    print("<p>Invalid Search</p>" );
    die( mysql_error() . "</body></html>" );
}

mysql_close($database);
?>

<table>
    <caption>Results of SELECT <?php print( "$select" ) ?>FROM urltable </caption>

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
