<?php
include_once "databaseQuery.php";

echo '<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
    <div id="content">
        <h2> Wykaz readerów z danego miasta </h2>';
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        echo '<form method="post" action="reader.php">
        Opcja
        <select name="option" id="option">
            <option value="name">Imie</option>
            <option value="lastname">Nazwisko</option>
            <option value="address">Adres</option>
        </select>
        <label for="optionvalue">Wartosc</label> </br>
        <input type="text" id="optionvalue" name="optionvalue"><br></br>
        <input type="submit" value="Wyszukaj"> 
        </form>';
    }
    else
    {
        echo '<table>
        <tr><td><b>name</b></td>
            <td><b>lastname</b></td>
            <td><b>Miasto</b></td>
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
                echo '<tr>';
                echo "<td>".$reader->name."</td>";
                echo "<td>".$reader->lastname."</td>";
                echo "<td>".$reader->address."</td>";
                echo "</tr>";
            }
        }
        echo '</table> </br></br>';
    }

echo '<a href="reader.php">Odśwież</a> ';
echo '</div> </body> </html>';
?>
<a href="index.html">Stona główna</a>