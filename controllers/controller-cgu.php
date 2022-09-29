<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Nous detecton si la personne accepte les cgu pour demarrer les devis
    if (isset($_POST['cgu']) && $_POST['cgu'] == true) {
        
        $_SESSION['cgu'] = true;
        $_SESSION['devisNb'] = 1;

        header('Location: devis.php?step=1');
        exit;
    }
}
