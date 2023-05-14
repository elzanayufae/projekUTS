<?php require 'dbkoneksi.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap project-4 | E-commerce Project</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- header section -->
    <header id="header" class="header">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="index.php" class="navbar-brand">
                <img src="img/logo.png" alt="company logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-2 nav-active">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="products.php" class="nav-link">Products</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="products.php" class="nav-link">Store</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-icons d-none d-lg-flex">
                <!-- single icon -->
                <div class="navbar-icon mx-2"><i class="fas fa-search"></i></div>
                <!-- end of single icon -->
                <!-- single icon -->
                <a href="products.php" class="navbar-icon mx-2 navbar-cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <div class="cart-items">2</div>
                </a>
                <!-- end of  single icon -->
            </div>
        </nav>