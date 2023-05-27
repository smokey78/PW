<?php
/**
 * Header for all content pages
 */
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php print ROOT_URL?>/front-end/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="<?php print ROOT_URL?>/front-end/js/jquery-3.7.0.min.js"></script>
    <script src="<?php print ROOT_URL?>/front-end/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        const API_URL = "<?php print ROOT_URL?>/api/index.php?api=";
    </script>
    <script src="<?php print ROOT_URL?>/front-end/js/ajax.js"></script>
    <script src="<?php print ROOT_URL?>/front-end/js/front.js"></script>

    <title>Super Shop</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php print ROOT_URL?>/doc/index.html">Swagger OpenAPI docs</a>
                    </li>
                </ul>
                <span class="navbar-tex ml-auto">
                    Vizitator
                </span>
            </div>
        </div>
    </nav>
    
    <!-- main content -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="errorMessage" class="alert alert-danger" style="display: none"></div>