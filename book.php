<?php
echo '<html>
    <head>
        <meta http-equiv ="Content Type" content=text html;charset=utf 8">
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
    <div id="header"> <b>books</b> </div>
    <div id="content">
        <h2> Wykaz książek danego authora </h2>';
    if($_SERVER['REQUEST_METHOD']=='GET')
    {
        $baza = simplexml_load_file ("database.xml");
        echo '<form method="post" action="book.php">
        <label for="l1">author: (np.: Sienkiewicz)</label></br>
        <input type="text" id="l1" name="l1"><br></br>
        <input type="submit" value="Wyszukaj"> 
        </form>';
    }
    else
    {
        echo '<table>
        <tr><td><b>author</b></td>
            <td></b>title</b></td>
        </tr>';
        $baza = simplexml_load_file ("database.xml");
        foreach($baza ->books ->book as $book)
        {
            $author = $book->author;
            if (strstr($author,$_POST['l1']))
                {echo '<tr>';
                echo "<td>".$author."</td>";
                echo "<td>".$book->title."</td>";
                echo "</tr>";
                }
        };
        echo '</table> </br></br>';
    }

echo '<a href="book.php">Odśwież</a> ';
echo '</div> </body> </html>';
?>
<a href="index.html">Stona główna</a>
    