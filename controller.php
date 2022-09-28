<?php

var_dump($_POST);
var_dump($_SESSION);

// 1 Gros Oeuvre, 2 Second Oeuvre, 3 Jardin
$sousType = [
    1 => [
        1 => 'Ravalement',
        2 => 'Toiture',
        3 => 'Terrassement'
    ],
    2 => [
        4 => 'Papier Peint',
        5 => 'Platre',
        6 => 'Peinture'
    ],
    3 => [
        7 => 'Haie',
        8 => 'Elagage',
        9 => 'Tonte gazon'
    ]
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Nous detecton si la personne accepte les cgu pour demarrer les devis
    if (isset($_POST['cgu']) && $_POST['cgu'] == true) {
        $_SESSION['travaux'] = [];
    }

    // Si la personne annule via le bouton annuler
    if (isset($_POST['cancel'])) {
        // Je supprime la variable de session travaux
        unset($_SESSION['travaux']);
        header('Location: index.php');
    }

    

}
