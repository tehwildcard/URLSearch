<?php
/**
 * Created by PhpStorm.
 * User: Clay
 * Date: 4/11/2017
 * Time: 9:18 PM
 */


    //Communicate with database
    if(isset($_POST['submit'])) {
        if (isset($_GET['go'])) {
            if (preg_match("^[A-Za-z] +/", $_POST['queryDatabase'])) {
                $search = $_POST['queryDatabase'];
                //Connect to database
                $db = mysql_connect("CopDataSvr.ccec.unf.edu", "n00934565", "34565Spr2017#") or die('Could not connect to database because: ' . mysql_error());
                //Select Database
                $mydb = mysql_select_db("n00934565");
                //Query Database
                $sql = "SELECT * FROM urltable WHERE description LIKE '%" . $search . "%'";
                //$sql = "SELECT * FROM urltable WHERE URL LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%'";
                $result = mysql_query($sql);

                //Create while loop and loop through result set
                while ($row = mysql_fetch_array($result)) {
                    $URL = $row['URL'];
                    $Description = $row['description'];
                    //Display the results into an array
                    echo "<ul>\n";
                    echo "<li>" . "<a href = \"..\php\Search.php\">" . $URL . " " . $Description . "</a>""</li>\n";
                    echo "</ul>";
                }
                else
                    "<p>Please enter a search query</p>";
                }
            }
        }

/*<table>
    <caption>Results of SELECT <?php print( "$select" ) */?><!--FROM urltable</caption>

<?php
/*while( $row = mysql_fetch_row( $result ) )
{
    print("<tr>");
    foreach ($row as $value)
        print("<td>$value</td>" );
    print("</tr>");
}
*/?>
</table>-->