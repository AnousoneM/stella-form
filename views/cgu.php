<?php

session_start();

require '../controllers/controller-cgu.php';

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

                    <!-- Début CGU  -->
                    <div class="border step p-3 text-center">
                        <form action="" method="POST">
                            <h2 class="text-center mb-3">CGU</h2>
                            <p class="h4">Etes-vous ok pour tout ?</p>
                            <input type="checkbox" name="cgu" id="cgu">
                            <label for="cgu">J'accepte</label>
                            <button class="d-block mt-3 mx-auto btn btn-outline-secondary">Demande de devis</button>
                        </form>
                    </div>
                    <!-- Fin CGU  -->

            </div>

        </div>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>