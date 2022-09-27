<?php

var_dump($_POST);
var_dump($_SESSION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['cgu']) {
        $_SESSION['cgu'] = true;
    }
}
