<?php

session_start();

require '../controllers/controller-devis.php';

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
    <link rel="stylesheet" href="../public/style/style.css">
</head>

<body>

    <div class="row justify-content-center">

        <div class="col-8">

            <div class="border rounded devis p-3">

                <!-- Fil d'Ariane -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item<?= isset($_GET['step']) && $_GET['step'] == 1  ? ' active" aria-current="page' : '' ?>">
                            <?= isset($_GET['step']) && $_GET['step'] == 1  ? '1 - Type de travaux' : '<a href="devis.php?step=1' . (isset($_GET['type']) ? "&type=". $_GET['type']: "") . '">1 - Type de travaux</a>' ?></li>
                        <li class="breadcrumb-item<?= isset($_GET['step']) && $_GET['step'] == 2  ? ' active" aria-current="page' : '' ?>">
                            <?= isset($_GET['step']) && $_GET['step'] == 2  ? '2 - Description des travaux' : '<a href="devis.php?step=2' . (isset($_GET['type']) ? "&type=". $_GET['type']: "") . '">2 - Description des travaux</a>' ?></li>
                        <li class="breadcrumb-item<?= isset($_GET['step']) && $_GET['step'] == 3  ? ' active" aria-current="page' : '' ?>">
                            <?= isset($_GET['step']) && $_GET['step'] == 3  ? '3 - Synthèse' : '<a href="devis.php?step=3' . (isset($_GET['type']) ? "&type=". $_GET['type']: "") . '">3 - Synthèse</a>' ?></li>
                    </ol>
                </nav>
                <!-- FinFil d'Ariane -->

                <?php if (isset($_GET['step']) && $_GET['step'] == 1) { ?>

                    <!-- DEBUT ETAPE 1 -->
                    <div class="border border-primary bg-primary step p-3">
                        <!-- bien rajouter un paramètre dans le action -->
                        <h2 class="text-center mb-3">TYPE DE TRAVAUX</h2>
                        <!-- ternaire pour conserver le bouton active lors du retour du choix du type depuis l'étape 2 -->
                        <a href="devis.php?step=2&type=1" class="d-block btn btn-outline-light btn-large fs-2 m-4 <?= isset($_GET['type']) && $_GET['type'] == 1 ? 'active' : '' ?>"><i class="bi bi-bricks me-3"></i>Gros Oeuvre</a>
                        <a href="devis.php?step=2&type=2" class="d-block btn btn-outline-light btn-large fs-2 m-4 <?= isset($_GET['type']) && $_GET['type'] == 2 ? 'active' : '' ?>"><i class="bi bi-paint-bucket me-3"></i>Second Oeuvre</a>
                        <a href="devis.php?step=2&type=3" class="d-block btn btn-outline-light btn-large fs-2 m-4 <?= isset($_GET['type']) && $_GET['type'] == 3 ? 'active' : '' ?>"><i class="bi bi-scissors me-3"></i>Jardinage</a>
                    </div>
                    <!-- FIN ETAPE 1 -->

                <?php } else if (isset($_GET['step']) && $_GET['step'] == 2) { ?>

                    <!-- DEBUT ETAPE 2 -->
                    <div class="border border-danger bg-danger text-white step p-3">
                        <form action="devis.php?step=3&type=<?= $_GET['type'] ?>" method="POST">
                            <h2 class="text-center mb-3)">DESCRIPTION DES TRAVAUX</h2>

                            <!-- Nous vérifions que le type de travaux existe et qu'il est présent dans l'URL -->
                            <?php if (isset($_GET['type']) && key_exists($_GET['type'], $sousType)) { ?>

                                <label for="travaux" class="d-block">1 - Selectionnez les travaux à effectuer :</label>
                                <select class="d-block" name="travaux" id="travaux">
                                    <?php foreach ($sousType[$_GET['type']] as $key => $value) { ?>
                                        <option value="<?= $key ?>"><?= $value ?></option>
                                    <?php } ?>
                                </select>

                                <label for="size" class="d-block">2 - Estimation des la taille des travaux :</label>
                                <input type="number" name="size" id="size">
                                <select name="units" id="units">
                                    <option>m</option>
                                    <option>m2</option>
                                    <option>m3</option>
                                </select>

                                <label for="description" class="d-block">3 - Description des travaux :</label>
                                <textarea class="mb-2" name="description" id="description" cols="30" rows="10"></textarea>

                            <?php } else { ?>
                                <p>Veuillez sélectionner un type de travaux</p>
                            <?php } ?>

                            <div>
                                <a href="devis.php?step=1&type=<?= $_GET['type'] ?>" class="btn btn-light">Précédent</a>
                                <input type="submit" name="recap" class="btn btn-light" value="Suivant">
                            </div>

                        </form>
                    </div>
                    <!-- FIN ETAPE 2 -->

                <?php } else if (isset($_GET['step']) && $_GET['step'] == 3) { ?>

                    <!-- DEBUT ETAPE 3  -->
                    <div class="border border-warning bg-warning step p-3">
                        <form action="devis.php?step=4" method="POST">
                            <h2 class="text-center mb-3">SYNTHESE</h2>

                            <div>
                                <a href="devis.php?step=2&type=<?= $_GET['type'] ?>" class="btn btn-light">Précédent</a>
                            </div>

                        </form>
                    </div>
                    <!-- FIN ETAPE 3  -->

                <?php } ?>

                <form action="devis.php" method="POST">
                    <input type="submit" name="cancel" class="btn btn-outline-secondary m-2" value="Annuler">
                </form>
            </div>

        </div>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>