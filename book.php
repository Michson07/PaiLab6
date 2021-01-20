<?php
include_once "databaseQuery.php";

echo '<html>
    <head>
        <meta http-equiv ="Content Type" content=text html;charset=utf 8">
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
    <div id="content">
        <h2> Wykaz książek danego Autora </h2>';
    if($_SERVER['REQUEST_METHOD']=='GET')
    {
        echo '<form method="post" action="book.php" class="form-container">
        <label for="author">Autor ksiazki:</label><br>
        <input type="text" id="author" name="author"><br>
        <input type="submit" value="Wyszukaj" class="btn">
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
            if (strcasecmp($author,$_POST['author']) == 0)
            {
                echo '<tr>';
                echo "<td>".$author."</td>";
                echo "<td>".$book->title."</td>";
                echo "</tr>";
            }
        };
        echo '</table> </br></br>';
    }

echo '<a href="book.php" class="return">Odśwież</a> ';
echo '<a href="index.html" class="return">Stona główna</a>';
echo '</div> </body> </html>';
?>
