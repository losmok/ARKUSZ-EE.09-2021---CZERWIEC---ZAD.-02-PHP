<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div id="lewy">
        <h1>Internetowy sklep z eko-warzywami</h1>
    </div>
    <div id="prawy">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
        </ol>
    </div>
        <div id="glowny">
        <?php
            $con = mysqli_connect('localhost', 'root', '', 'dane2');
            $res1 = "SELECT nazwa, ilosc, opis, cena, zdjecie FROM produkty WHERE Rodzaje_id IN (1,2)";
            $wynik = mysqli_query($con, $res1);
            while($wiersz1 = mysqli_fetch_array($wynik)){
                echo "<div id='blok'>
                    <img src='$wiersz1[4]' alt='warzywniak'>
                    <h5>$wiersz1[0]</h5>
                    <p>opis: $wiersz1[2]</p>
                    <p>na stanie: $wiersz1[1]</p>
                    <h2>$wiersz1[3] zł</h2>
                </div>";
            }
        ?>
        </div>
        <div id="stopka">
        <form action="sklep.php" method="post">
            Nazwa:  <input type="text" name="nazwa" >
             Cena:  <input type="text" name="cena" >
            <input type="submit" value="Dodaj produkt">
        </form>
        <?php
            if(isset($_POST['nazwa']) && isset($_POST['cena'])){
                $nazwa = $_POST['nazwa'];
                $cena = $_POST['cena'];
                $res2 = "INSERT INTO produkty VALUES (NULL, '1', '4', '$nazwa', '10', NULL, '$cena', 'owoce.jpg')";
                $wynik2 = mysqli_query($con, $res2);

            } 
            mysqli_close($con);
        ?>
        <br>
        Stronę wykonał: Paweł Lewandowski
    
</body>
</html>