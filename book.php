<?php
include_once "databaseQuery.php";

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
        echo '<form method="post" action="book.php">
        <label for="author">author: (np.: Sienkiewicz)</label></br>
        <input type="text" id="author" name="author"><br></br>
        <input type="submit" value="Wyszukaj"> 
        </form>';
    }
    else
    {
        echo '
        <table>
            <tr>
                <td><b>author</b></td>
                <td></b>title</b></td>
            </tr>';
            
        $query = new DatabaseQuery();
        $books = $query->getBooks();
        foreach($books ->book as $book)
        {
            $author = $book->author;
            if (strstr($author,$_POST['author']))
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
    