<?php
// Naloga 1: Podatki za vozila
$prostornina = array(
    "Ford" => array("Focus" => 1800, "Mondeo" => 1900),
    "Mercedes" => array("CLX" => 2800, "Meibach" => 3200, "razredB" => 1900),
    "Kia" => array("Ced" => 1400, "Sorento" => 2000, "Picanto" => 990, "Rio" => 1300)
);

// Naloga 2: Podatki za skoke
$skoki = [
    "Slovenija" => [
        "Prevc" => [123, 131], "Lanišek" => [128, 133], "Čop" => [113, 130], "Avbelj" => [129, 128]
    ],
    "Avstrija" => [
        "Kraft" => [121, 130], "Holz" => [128, 130], "Linzer" => [120, 120], "Strauss" => [110, 128]
    ],
    "Češka" => [
        "Kafka" => [118, 110], "Jiruše" => [128, 123], "Ager" => [110, 115], "Binaček" => [112, 118]
    ],
    "Švedska" => [
        "Jurgens" => [116, 131], "Vinger" => [128, 133], "Zisen" => [119, 120], "Avgens" => [119, 118]
    ],
    "Slovaška" => [
        "Morže" => [113, 114], "Šinki" => [120, 125], "Čap" => [122, 1333], "Pokl" => [133, 122]
    ]
];

?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vozila in Skoki</title>
</head>
<body>

<!-- Obrazec za Nalogo 1 -->
<h2>Naloga 1: Izbira Znamke Vozila</h2>
<form method="POST" action="vaja.php">
    <label for="znamke">Izberite znamke vozil:</label><br>
    <input type="checkbox" name="znamke[]" value="Ford"> Ford<br>
    <input type="checkbox" name="znamke[]" value="Mercedes"> Mercedes<br>
    <input type="checkbox" name="znamke[]" value="Kia"> Kia<br>
    <button type="submit">Izberi</button>
</form>

<?php
if (isset($_POST['znamke'])) {
    $znamke = $_POST['znamke'];
    foreach ($znamke as $znamka) {
        echo "<h2>Podatki za znamko: " . $znamka . "</h2>";
        arsort($prostornina[$znamka]);
        echo "<table border='1'>
                <tr><th>Model</th><th>Prostornina</th></tr>";
        foreach ($prostornina[$znamka] as $model => $prostornina_value) {
            echo "<tr><td>" . $model . "</td><td>" . $prostornina_value . "</td></tr>";
        }
        echo "</table><br>";
    }
}
?>

<hr> <!-- Prelom med nalogama -->

<!-- Obrazec za Nalogo 2 -->
<h2>Naloga 2: Izbira Države in Skoka</h2>
<form method="POST" action="vaja.php">
    <label for="drzava">Izberite državo:</label>
    <select name="drzava" id="drzava">
        <option value="Avstrija">Avstrija</option>
        <option value="Češka">Češka</option>
        <option value="Slovenija">Slovenija</option>
        <option value="Švedska">Švedska</option>
        <option value="Slovaška">Slovaška</option>
    </select><br>

    <label for="skok">Izberite skok:</label><br>
    <input type="radio" name="skok" value="prvi" checked> Prvi skok<br>
    <input type="radio" name="skok" value="drugi"> Drugi skok<br>

    <label for="ozadje">Izberite barvo ozadja prvega skakalca:</label><br>
    <input type="color" name="ozadje" value="#ffffff"><br>

    <button type="submit">Izberi</button>
</form>

<?php
if (isset($_POST['drzava']) && isset($_POST['skok'])) {
    $drzava = $_POST['drzava'];
    $skok = $_POST['skok'];
    $barva = $_POST['ozadje'];

    echo "<h2>Skoki za državo: " . $drzava . "</h2>";
    $skakalci = $skoki[$drzava];
    echo "<div style='background-color: $barva;'>";
    
    echo "<h3>Izbran skok: " . ucfirst($skok) . "</h3>";
    foreach ($skakalci as $ime => $dolzine) {
        $skok_index = $skok == 'prvi' ? 0 : 1;
        echo $ime . ": " . $dolzine[$skok_index] . " m<br>";
    }
    echo "</div>";
}
?>

<hr> <!-- Prelom med nalogama -->

<!-- Obrazec za Nalogo 2 - Drugi del (Checkbox za oba skoka) -->
<h2>Naloga 2.2: Izbira Države in Oba Skoka</h2>
<form method="POST" action="vaja.php">
    <label for="drzava">Izberite državo:</label>
    <select name="drzava" id="drzava">
        <option value="Avstrija">Avstrija</option>
        <option value="Češka">Češka</option>
        <option value="Slovenija">Slovenija</option>
        <option value="Švedska">Švedska</option>
        <option value="Slovaška">Slovaška</option>
    </select><br>

    <label for="skoki">Izberite skoke:</label><br>
    <input type="checkbox" name="skoki[]" value="prvi" checked> Prvi skok<br>
    <input type="checkbox" name="skoki[]" value="drugi"> Drugi skok<br>

    <button type="submit">Izberi</button>
</form>

<?php
if (isset($_POST['drzava']) && isset($_POST['skoki'])) {
    $drzava = $_POST['drzava'];
    $izbrani_skoki = $_POST['skoki'];
    
    echo "<h2>Skoki za državo: " . $drzava . "</h2>";
    $skakalci = $skoki[$drzava];
    $skoki_dolzine = [];

    foreach ($skakalci as $ime => $dolzine) {
        $skoki_dolzine[$ime] = 0;
        if (in_array('prvi', $izbrani_skoki)) {
            $skoki_dolzine[$ime] += $dolzine[0];
        }
        if (in_array('drugi', $izbrani_skoki)) {
            $skoki_dolzine[$ime] += $dolzine[1];
        }
    }

    // Sortiraj po padajoči dolžini skokov
    arsort($skoki_dolzine);

    foreach ($skoki_dolzine as $ime => $dolzina) {
        echo $ime . ": " . $dolzina . " m<br>";
    }
}
?>

</body>
</html>
