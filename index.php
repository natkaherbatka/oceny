<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dziennik ocen</title>
</head>
<body>

<h1>Dziennik ocen</h1>

<form method="POST">
    Imię i nazwisko:
    <input type="text" name="uczen">
    <br><br>

    Przedmiot:
    <input type="text" name="przedmiot">
    <br><br>

    Ocena:
    <select name="ocena">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
    <br><br>

    <input type="submit" name="zapisz" value="Zapisz ocenę">
</form>

<h2>Zapisane oceny</h2>

<?php

if (isset($_POST["zapisz"])) {

    $uczen = $_POST["uczen"];
    $przedmiot = $_POST["przedmiot"];
    $ocena = $_POST["ocena"];

    $plik = fopen("oceny.txt", "a");

    fwrite($plik, $uczen . ";" . $przedmiot . ";" . $ocena . "\n");

    fclose($plik);
}

if (file_exists("oceny.txt")) {

    $plik = fopen("oceny.txt", "r");

    while (!feof($plik)) {

        $wiersz = fgets($plik);

        if ($wiersz != false) {

            $dane = explode(";", trim($wiersz));

            $uczen = $dane[0];
            $przedmiot = $dane[1];
            $ocena = $dane[2];

            echo $uczen . " | " . $przedmiot . " | ocena: " . $ocena . "<br>";
        }
    }

    fclose($plik);
}

?>

</body>
</html>



