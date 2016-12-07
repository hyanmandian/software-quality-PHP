<?php

require "../vendor/autoload.php";

use App\Calculators\IMC;
use App\Calculators\TGC;
use App\Calculators\IdealWeight;
use App\People\Men;
use App\People\Women;

$imc = new IMC();
$tgc = new TGC();
$idealWeight = new IdealWeight();

$genre = $_GET['genre'];
$height = $_GET['height'];
$weight = $_GET['weight'];
$age = $_GET['age'];

$person = $_GET['genre'] === 'men'
    ? new Men($height, $weight, $age)
    : new Women($height, $weight, $age);
    
$imc = $imc->calculate($person);
$tgc = $tgc->calculate($person);
$idealWeight = $idealWeight->calculate($person);

?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Calculadora</h1>
            <form action="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                <input type="text" name="height" placeholder="Altura" value="<?php echo $height; ?>" />
                <input type="text" name="weight" placeholder="Peso" value="<?php echo $weight; ?>" />
                <input type="text" name="age" placeholder="Idade" value="<?php echo $age; ?>" />
                <label>Homem<input <?php echo $genre === 'men' ? 'checked' : ''; ?> type="radio" name="genre" value="men" /></label>
                <label>Mulher<input <?php echo $genre === 'women' ? 'checked' : ''; ?> type="radio" name="genre" value="women" /></label>
                <input type="submit" value="Calcular" />
            </form>
            <ul>
                <li>IMC: <?php echo $imc; ?></li>
                <li>TGC: <?php echo $tgc; ?></li>
                <li>Peso ideal: <?php echo $idealWeight; ?></li>
            </ul>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.1.0.min.js"><\/script>')</script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>