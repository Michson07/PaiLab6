<?php
include_once "databaseQuery.php";

echo '<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
    <div id="content">
        <h2> Wykaz Czytelników z danego miasta </h2>';
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        echo '
        <form method="post" action="reader.php" class="form-container">
            <label for="optionvalue">Wartosc</label>
            <select name="option" id="option">
                <option value="name">Imie</option>
                <option value="lastname">Nazwisko</option>
                <option value="address">Adres</option>
            </select><br>
            <label for="optionvalue">Wartosc</label>
            <input type="text" id="optionvalue" name="optionvalue"><br>
            <input type="submit" value="Wyszukaj" class="btn">
        </form>
        ';
    }
    else
    {
        echo '<table class="data-table">
        <tr><td><b>name</b></td>
            <td><b>lastname</b></td>
            <td><b>Address</b></td>
            <td><b>Books</b></td>
        </tr>';

        $query = new DatabaseQuery();
        $readers = $query->getReaders();
        foreach($readers ->reader as $reader)
        {
            $option = $_POST['option'];
            $optionvalue = $_POST['optionvalue'];
            $readerOption = $reader->name;
            if($option === "lastname") {
                $readerOption = $reader->lastname;
            }
            else if($option === "address") {
                $readerOption = $reader->address;
            }

            if ((strcasecmp($readerOption, $optionvalue)) == 0)
            {
                $books = $query->getReaderBooks($reader["id"]);
                $booksNames = array_map(function($book) { return $book->title; }, $books);
                echo '<tr>';
                echo "<td>".$reader->name."</td>";
                echo "<td>".$reader->lastname."</td>";
                echo "<td>".$reader->address."</td>";
                echo "<td>".implode (", ", $booksNames)."</td>";

                echo "</tr>";
            }
        }
        echo '</table> </br></br>';
    }

echo '<a href="reader.php" class="return">Odśwież</a> ';
echo '<a href="index.html" class="return">Stona główna</a>';
echo '</div> </body> </html>';
?>