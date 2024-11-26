<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Poradnia</title>
        <link rel="stylesheet" href="poradnia.css">
    </head>
    <body>
        <header>
            <h1>PORADNIA SPECJALISTYCZNA</h1>
        </header>

        <div id="lewy">
            <h3>LEKARZE SPECJALIŚCI</h3>

            <table>
                <tr>
                    <td colspan="2">Poniedziałek</td>
                </tr>
                <tr>
                    <td>Anna Kowalska</td>
                    <td>otolaryngolog</td>
                </tr>
                <tr>
                    <td colspan="2">Wtorek</td>
                </tr>
                <tr>
                    <td>Jan Nowak</td>
                    <td>kardiolog</td>
                </tr>
            </table>

            <h3>LISTA PACJENTÓW</h3>

            <?php
                $conn = new mysqli("localhost","root","","poradnia egzamin");

                $sql = "SELECT id,imie,nazwisko,choroba FROM Pacjenci;";
                $result = $conn->query($sql);

                while($row = $result -> fetch_array()) {
                    echo $row["id"]." ".$row["imie"]." ".$row["nazwisko"]." ".$row["choroba"]."<br>";
                }

                $conn -> close();
            ?>

            <br><br>

            <form action="pacjent.php" method="post">
                Podaj id:<br>
                <input type="number" name="id" id="id">
                <button type="submit">Pokaż szczegóły</button>
            </form>
        </div>

        <div id="prawy">
            <h2>KARTA PACJENTA</h2>
            <?php
                if(isset($_POST["id"])) {

                    $id = $_POST["id"];

                    $conn = new mysqli("localhost","root","","poradnia egzamin");

                    $sql = "SELECT imie,nazwisko,leki_przepisane,opis FROM pacjenci WHERE id=$id;";
                    $result = $conn->query($sql);
    
                    while($row = $result -> fetch_array()) {
                        echo "Imię i nazwisko: ".$row["imie"]." ".$row["nazwisko"]."<br><br>";
                        echo "Przepisane leki: ".$row["leki_przepisane"]."<br><br>";
                        echo "Opis choroby: ".$row["opis"]."<br><br>";
                    }
    
                    $conn -> close();
                }
            ?>
        </div>
    </body>
</html>