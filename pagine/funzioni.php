<?php
function menu(){
    echo '<nav class="hamburger-menu">';
    echo '<input type="checkbox" id="controllo">';
    echo '<label for="controllo" class="label-controllo">';
    echo '<span></span>';
    echo '</label>';
    echo '<a href="#" class="logo">PIOROCCO</a>';
    echo '<ul id="menu">';
    echo '<li><a href="index.php" title="Vai alla home" class="voceMenu">Home</a></li>';
    echo '<li><a href="lavori.php" title="Vai ai lavori" class="voceMenu">Lavori</a></li>';
    echo '<li><a href="contatti.php" title="Contattami!" class="voceMenu">Contattami</a></li>';
    echo '</ul>';
    echo '</nav>';
}

function footer(){
    echo '<div class="main-content">';
    echo '<div class="left box">';
        echo '<h2>About me</h2>';
        echo '<div class="content">';
            echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, earum consectetur qui error possimus quis debitis a praesentium, laudantium tempore nulla, suscipit ipsum tempora eius iste? Incidunt odio aliquam est.</p>';
        echo '</div>';
    echo '</div>';
    echo '<div class="center box">';
        echo '<h2>Contatti</h2>';
        echo '<div class="content">';
            echo '<div class="place">';
                echo '<span class="luogoIcon"><img src="../img/luogoIcon.png" alt="icona"></span>';
                echo '<span class="text">via Parigi, Potenza</span>';
            echo '</div>';
            echo '<div class="phone">';
                echo '<span class="phoneIcon"><img src="../img/phoneIcon.png" alt="icona"></span>';
                echo '<span class="text">3669359865</span>';
            echo '</div>';
            echo '<div class="mail">';
                echo '<span class="emailIcon"><img src="../img/emailIcon.png" alt="icona"></span>';
                echo '<span class="text">pioroccobrindisi5@gmail.com</span>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

    echo '<div class="right box">';
        echo '<h2>Messaggio rapido</h2>';
        echo '<div class="content">';
            echo '<form action="json/form_handler.php" method="POST" novalidate>';
                echo '<div class="email">';
                    echo '<div class="text">Email *</div>';
                    echo '<input type="email" name="email" class="mail" required>';
                echo '</div>';
                echo '<div class="msg">';
                    echo '<div class="text">Message *</div>';
                    echo '<textarea name="message" cols="25" rows="2" class="txtarea" required></textarea>';
                echo '</div>';
                echo '<div class="formbutton">';
                    echo '<input type="submit" value="Invia" class="confermaBtn">';
                echo '</div>';
            echo '</form>';
        echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="bottom" style="text-align:center">';
        echo '<span class="credit"><a href="#">Copyright</a> By <i>Piorocco Brindisi</i> | </span>';
        echo '<span></span><span> 2024 All rights reserved.</span>';
    echo '</div>';
}

?>

<?php

class Utility
{
    public static function controllaRangeStringa($stringa, $min = null, $max = null)
    {
        $rit = 0;
        $n = strlen($stringa);
        if ($min != null && $n < $min) {
            $rit++;
        }
        if ($max != null && $n > $max) {
            $rit++;
        }
        return ($rit == 0);
    }

    public static function leggiTesto($file)
    {
        $rit = false;
        if (!$fp = fopen($file, 'r')) {
            echo "Non posso aprire il file $file<br>";
        } else {
            if (is_readable($file) === false) {
                echo "Il file $file non è leggibile<br>";
            } else {
                $rit = fread($fp, filesize($file));
            }
        }
        fclose($fp);
        return $rit;
    }

    public static function leggiTestoCSV($file)
    {
        $rit = false;
        $riga = 0;
        if (!$fp = fopen($file, 'r')) {
            echo "Non posso aprire il file $file<br>";
        } else {
            if (is_readable($file) === false) {
                echo "Il file $file non è leggibile<br>";
            } else {
                while (($data = fgetcsv($fp, null, ";")) !== false) {
                    $rit[$riga] = $data;
                    $riga++;
                }
            }
        }
        fclose($fp);
        return $rit;
    }

    public static function richiestaHTTP($str)
    {
        $rit = null;
        if ($str !== null) {
            if (isset($_POST[$str])) {
                $rit = $_POST[$str];
            } elseif (isset($_GET[$str])) {
                $rit = $_GET[$str];
            }
        }
        return $rit;
    }

    public static function scriviTesto($file, $stringa, $commenta = false)
    {
        $rit = false;
        if (!$fp = fopen($file, 'a')) {
            echo "Non posso aprire il file $file<br>";
        } else {
            if (is_writable($file) === false) {
                echo "Il file $file non è scrivibile<br>";
            } else {
                if (!fwrite($fp, $stringa)) {
                    echo "Non posso scrivere il file $file<br>";
                } else {
                    if ($commenta) echo "Operazione completata!<br> Ho scritto:<br>" . str_repeat("-", 20) . "<br>" . str_replace(chr(10), "<br>", $stringa) . "<br>" . str_repeat("-", 20) . "<br>Nel file $file<br>";
                    $rit = true;
                }
            }
        }
        fclose($fp);
        return $rit;
    }
}

define("COMMENTA", true);