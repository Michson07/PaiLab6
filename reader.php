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
        <label for="town">Miasto: (np.: Tarnobrzeg)</label> </br>
        <input type="text" id="town" name="town"><br></br>
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
            $miasto = $reader->address;
            if (strstr($miasto, $_POST['town']))
                {echo '<tr>';
                echo "<td>".$reader->name."</td>";
                echo "<td>".$reader->lastname."</td>";
                echo "<td>".$miasto."</td>";
                echo "</tr>";
                }
        };
        echo '</table> </br></br>';
    }

echo '<a href="reader.php">Odśwież</a> ';
echo '</div> </body> </html>';
?>
<a href="index.html">Stona główna</a>