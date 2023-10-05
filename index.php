<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centrum szkoleniowe dla psów</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div id="baner">
        Centrum szkoleniowe dla psów
    </div>
    <div id="blok-pod-banerem">
        <table>
            <tr>
                <td><img src="./pies.png" alt="pies"></td>
                <td><img src="./pies.png" alt="pies"></td>
                <td><img src="./pies.png" alt="pies"></td>
                <td><img src="./pies.png" alt="pies"></td>
                <td><img src="./pies.png" alt="pies"></td>
                <td><img src="./pies.png" alt="pies"></td>
            </tr>
        </table>
        <p style="padding:5px;">Nie ma na świecie przyjaźni, która trwa wiecznie.<br> Jedynym wyjątkiem jest ta, którą
            obdarza nas pies.</p>
        <h3 style="padding:5px;">Konrad Lorenz</h3>
    </div>
    <main>
        <div id="lewy">
            Kursy w naszym ośrodku prowadzone są w sposób rzetelny. Atmosfera jestprzyjazna zwierzętom i ich
            opiekunom. Zapewniamy indywidualne podejście do kadego psa i jego przewodnika.<br><br>Staramy się, aby
            każdy z uczestników czuł się komfortowo. Szkolenie szczeniaków i dorosłych psów dostosowujemy do
            temperamentu zwierzęcia oraz jego wieku, ponieważ każdy pies wymaga indywidualnego podejścia
            i zastosowania odpowiednich technik szkoleniowych.<br><br>Podczas trwania kursu nasi instruktorzy służą
            swoim wsparciem i doświadczeniem, dzięki czemu szybko nawiążesz kontakt ze swoim psiakiem.
        </div>
        <div id="prawy">
            <h2>KALENDARZ SZKOLEŃ</h2>
            <table>
                <tr>
                    <th>Nazwa szkolenia</th>
                    <th>Data rozpoczęcia</th>
                    <th>Koszt</th>
                </tr>
                <tr>
                    <td>Psie przedszkole (grupa P1)</td>
                    <td>03-10-2023</td>
                    <td>500 zł</td>
                </tr>
                <tr>
                    <td>Posłuszeństwo psa (grupa P2)</td>
                    <td>10-10-2023</td>
                    <td>600 zł</td>
                </tr>
                <tr>
                    <td>Posłuszeństwo psa (grupa P3)</td>
                    <td>07-11-2023</td>
                    <td>600 zł</td>
                </tr>
                <tr>
                    <td>Psie przedszkole (grupa P4)</td>
                    <td>04-11-2023</td>
                    <td>500 zł</td>
                </tr>
            </table>
            <h2>Formularz zgłoszeniowy</h2>
            <form method="post">
            <div class="form">
                Dane właściciela<br>
            <label>
                <span>Imię:</span>
                <input type="text" name="imie" id="imie">
            </label>
            <label>
                <span>Nazwisko:</span>
                <input type="text" name="nazwisko" id="nazwisko">
            </label>
            <label>
                <span>Adres mailowy:</span>
                <input type="email" name="mail" id="mail">
            </label>
            </div>
            <div class="form">
            Dane psa<br>
            <label>
                <span>Imię:</span>
                <input type="text" name="imiepsa" id="imiepsa">
            </label>
            <label>
                <span>Rasa:</span>
                <input type="text" name="rasa" id="rasa">
            </label>
            <label>
                <span>Data urodzenia:</span>
                <input type="date" name="data" id="data" style="width:174px;">
            </label>
            <label>
                <span>Typ szkolenia:</span>
                <select style="width:174px;" name="psiur" id="psiur">
                    <option name="psiur" value="1">Psie przedszkole (P1)</option>
                    <option value="2">Posłuszeństwo psa (P2)</option>
                    <option value="3">Posłuszeństwo psa (P3)</option>
                    <option value="4">Psie przedszkole (P4)</option>
                </select>
            </label>
            <br>
            <input type="submit" value="Wyślij zgłoszenie">
            </div>
            </form>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "szkolenia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $mail = $_POST["mail"];
    $imiepsa = $_POST["imiepsa"];
    $rasa = $_POST["rasa"];
    $data = $_POST["data"];
    // $psiur = $_POST["psiur"]; 

    $sql_wlasciciel = "INSERT INTO wlasciciel (Imie, Nazwisko, AdresMail) VALUES ('$imie', '$nazwisko', '$mail')";

    if ($conn->query($sql_wlasciciel) === TRUE) {
        $id_wlasciciela = $conn->insert_id;

        $sql_pies = "INSERT INTO pies (IdWlasciciela, Imie, Rasa, DataUrodzenia) VALUES ('$id_wlasciciela', '$imiepsa', '$rasa', '$data')";

        if ($conn->query($sql_pies) === TRUE) {
            echo "Zgłoszenie zostało zapisane w bazie.";
        } else {
            echo "Błąd: " . $sql_pies . "<br>" . $conn->error;
        }
    } else {
        echo "Błąd: " . $sql_wlasciciel . "<br>" . $conn->error;
    }
}

$conn->close();
?>