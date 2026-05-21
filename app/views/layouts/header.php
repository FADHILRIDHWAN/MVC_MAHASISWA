<?php
$currentUrl = $_GET['url'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?= isset($title) ? $title : 'MVC Mahasiswa' ?>
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container">

            <a class="navbar-brand"
                href="<?= BASEURL ?>">

                MVC Mahasiswa

            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse"
                id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <?php if (isset($_SESSION['user'])): ?>

                        <li class="nav-item">

                            <a
                                class="nav-link <?= ($currentUrl == '' ? 'active' : '') ?>"
                                href="<?= BASEURL ?>">

                                Home

                            </a>

                        </li>


                        <li class="nav-item">

                            <a
                                class="nav-link <?= strpos($currentUrl, 'mahasiswa') !== false ? 'active' : '' ?>"
                                href="<?= BASEURL ?>/mahasiswa">

                                Data Mahasiswa

                            </a>

                        </li>


                        <?php if ($_SESSION['user']['role'] == 'admin'): ?>

                            <li class="nav-item">

                                <a
                                    class="nav-link"
                                    href="<?= BASEURL ?>/mahasiswa/create">

                                    Tambah Mahasiswa

                                </a>

                            </li>

                        <?php endif; ?>


                        <li class="nav-item">

                            <span class="nav-link">

                                <?= $_SESSION['user']['username'] ?>
                                (<?= $_SESSION['user']['role'] ?>)

                            </span>

                        </li>


                        <li class="nav-item">

                            <a
                                class="nav-link"
                                href="<?= BASEURL ?>/auth/logout">

                                Logout

                            </a>

                        </li>

                    <?php else: ?>

                        <li class="nav-item">

                            <a
                                class="nav-link"
                                href="<?= BASEURL ?>/auth/login">

                                Login

                            </a>

                        </li>

                    <?php endif; ?>

                </ul>

            </div>

        </div>

    </nav>

    <div class="container mt-4">