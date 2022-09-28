<?php

// Permet de valider la prise en compte des CGU, dans le cas échéant : retour
if (!isset($_SESSION['travaux'])) {
    header('Location: cgu.php');
    exit;
}

var_dump($_POST);
var_dump($_SESSION);

// 1 Gros Oeuvre, 2 Second Oeuvre, 3 Jardin : tableau à générer via requête.
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
        // Puis retour au début du formulaire
        header('Location: devis.php');
        exit;
    }

    // nous allons stocker toutes les infos dans la variable de session lors du submit recap :
    if (isset($_POST['recap'])) {

        $type = intval($_GET['type']);
        $travaux = intval($_POST['travaux']);
        $size = intval($_POST['size']);
        $units = htmlspecialchars($_POST['units']);
        $description = htmlspecialchars($_POST['description']);

        // Nous vidons les infos actuels pour injecter les nouvelles infos
        $_SESSION['travaux'] = [];

        // nous poussons les éléments dans la session afin de les conserver dans un tableau associatif
        $_SESSION['travaux'] += ['type' => $type];
        $_SESSION['travaux'] += ['travaux' => $travaux];
        $_SESSION['travaux'] += ['size' => $size];
        $_SESSION['travaux'] += ['units' => $units];
        $_SESSION['travaux'] += ['description' => $description];
        header('Location: devis.php?step=3&type=' . $_GET['type']);
        exit;
    }
}
