<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi CRUD Perpustakaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            background-image: url("/img/bg.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .navbar-nav .nav-link.active {
            font-weight: bold;
            border-bottom: 2px solid white;
        }
    </style>
</head>

<body class="bg-body-tertiary">
<!-- HEADER: MENU + HEROE SECTION -->
<header>
    <!-- HEADER -->
</header>

<!-- CONTENT -->
<?php
$uri = service('uri');
$current = $uri->getSegment(1);
?>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">Perpustakaan</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $current === '' || $current === 'home' ? 'active' : '' ?>" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $current === 'buku' ? 'active' : '' ?>" href="/buku">Data Buku</a>
                </li>
                <?php if (session()->get('login')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login/ Sign Up</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4 m-auto">
    <?= $this->renderSection('content') ?>
</div>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer class="mt-auto py-3 bg-secondary">
    <!-- FOOTER -->
    <div class="container text-center">
        <span class="text-white">Copyright &copy; 2025 Noviana Nur Aisyah.  All rights reserved.</span>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
