<?php
session_start();

require 'controller.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stella Test</title>
    <!-- Cdn Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Cdn Sweet Alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Link style -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="row justify-content-center">

        <div class="col-8">
            <form action="" method="POST">

                <div class="border rounded devis p-3">

                    <!-- Fil d'Ariane -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item <?= isset($_GET['step']) && $_GET['step'] == 1  ? 'active aria-current="page"' : '' ?>">
                                <?= isset($_GET['step']) && $_GET['step'] == 1  ? '1 - Type de travaux' : '<a href="index.php?step=1">1 - Type de travaux</a>' ?>
                            </li>
                            <li class="breadcrumb-item <?= isset($_GET['step']) && $_GET['step'] == 2  ? 'active aria-current="page"' : '' ?>">
                                <?= isset($_GET['step']) && $_GET['step'] == 2  ? '2 - Description des travaux' : '<a href="index.php?step=2">2 - Description des travaux</a>' ?>
                            </li>
                            <li class="breadcrumb-item <?= isset($_GET['step']) && $_GET['step'] == 3  ? 'active aria-current="page"' : '' ?>">
                                <?= isset($_GET['step']) && $_GET['step'] == 3  ? '3 - Synthèse' : '<a href="index.php?step=3">3 - Synthèse</a>' ?>
                            </li>
                        </ol>
                    </nav>

                    <form action="index.php" method="POST">

                        <?php if (isset($_GET['step']) && $_GET['step'] == 1) { ?>
                            <!-- ETAPE 1 -->
                            <div class="border border-primary bg-primary step p-3">
                                <h2 class="text-center mb-3">TYPE DE TRAVAUX</h2>
                                <a href="index.php?step=2" class="d-block btn btn-outline-light btn-large fs-2 m-4"><i class="bi bi-bricks me-3"></i>Gros Oeuvre</a>
                                <a href="index.php?step=2" class="d-block btn btn-outline-light btn-large fs-2 m-4"><i class="bi bi-paint-bucket me-3"></i>Second Oeuvre</a>
                                <a href="index.php?step=2" class="d-block btn btn-outline-light btn-large fs-2 m-4"><i class="bi bi-scissors me-3"></i>Jardinage</a>
                            </div>
                        <?php } else if (isset($_GET['step']) && $_GET['step'] == 2) { ?>
                            <!-- ETAPE 2 -->
                            <div class="border border-danger bg-danger step p-3">
                                <h2 class="text-center mb-3)">DESCRIPTION DES TRAVAUX</h2>
                            </div>
                        <?php } else if (isset($_GET['step']) && $_GET['step'] == 3) { ?>
                            <!-- ETAPE 3  -->
                            <div class="border border-warning bg-warning step p-3">
                                <h2 class="text-center mb-3">SYNTHESE</h2>
                            </div>
                        <?php } else { ?>
                            <!-- CGU  -->
                            <div class="border step p-3 text-center">
                                <form action="" method="POST">
                                    <h2 class="text-center mb-3">CGU</h2>
                                    <p class="h4">Etes-vous ok pour tout ?</p>
                                    <input type="checkbox" name="cgu" id="cgu">
                                    <label for="cgu">J'accepte</label>
                                    <button class="d-block mt-3 mx-auto btn btn-outline-secondary">Demande de devis</button>
                                </form>
                            </div>
                        <?php } ?>

                    </form>
                </div>


            </form>
        </div>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>