<?php

// Permet de valider la prise en compte des CGU, dans le cas échéant : go cgu again
if (!isset($_SESSION['cgu'])) {
    header('Location: cgu.php');
    exit;
}

// Permet de valider que nous démarrons sytematiquement en step 1 lorsque les paramètre step et type en sont pas présent (Safe Fil d'Ariane)
if (!isset($_GET['step']) || ($_GET['step'] != 1 && !isset($_GET['type']))) {

    header('Location: devis.php?step=1');
    exit;
}

// tableau à générer via requête.
$type = [
    1 => 'Gros Oeuvre',
    2 => 'Second Oeuvre',
    3 => 'Jardinage'
];

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

// Nous calculons le dernier Index de notre array $_SESSION
if (isset($_SESSION['devisNb'])) {
    $index = $_SESSION['devisNb'] - 1;
} else {
    $index = 0;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Si la personne annule via le bouton annuler
    if (isset($_POST['cancel'])) {
        // Je supprime la variable de session travaux
        unset($_SESSION['travaux']);
        unset($_SESSION['cgu']);
        unset($_SESSION['devisNb']);
        unset($_SESSION['addTravaux']);

        header('Location: cgu.php');
        exit;
    }

    // Si la personne appuie ajout de travaux
    if (isset($_POST['addTravaux'])) {

        // Je crée une variable de session permettant de savoir que nous avons cliqué sur addTravaux
        $_SESSION['addTravaux'] = true;
        // je modifie la variable de session devisNb en comptant la longueur du tableau
        $_SESSION['devisNb'] = count($_SESSION['travaux']) + 1;
        header('Location: devis.php');
    }


    // nous allons stocker toutes les infos dans la variable de session lors du submit recap :
    if (isset($_POST['recap'])) {

        // Je supprime la variable session à l'aide d'un unset
        unset($_SESSION['addTravaux']);

        $type = intval($_GET['type']);
        $travaux = intval($_POST['travaux']);
        $size = intval($_POST['size']);
        $units = htmlspecialchars($_POST['units']);
        $description = htmlspecialchars($_POST['description']);

        // Nous vidons les infos actuels pour injecter les nouvelles infos
        // $_SESSION['travaux'] = [];

        // Nous stockons toutes les infos dans un tableau
        $travaux = [
            'type' => $type,
            'travaux' => $travaux,
            'size' => $size,
            'units' => $units,
            'description' => $description
        ];

        // nous enregistrons les données sous forme de tableau dans la variable de session
        $_SESSION['travaux'][$index] = $travaux;

        header('Location: devis.php?step=3&type=' . $_GET['type']);
        exit;
    }
}
