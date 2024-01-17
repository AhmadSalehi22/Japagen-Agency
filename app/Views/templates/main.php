<!doctype html>
<html class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Japagen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        main>.container {
            padding: 60px 15px 0;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('pages/view'); ?>">Japagen</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="btn btn-dark" href="<?= base_url('pages/view'); ?> ">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Packages
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="<?= base_url('packs/list'); ?>">List</a></li>
                                    <?php if (session('logged_in')): ?>
                                        <?php if (session('user')->role == 2): ?>
                                            <li><a class="dropdown-item" href="<?= base_url('packs/manage'); ?>">Manage</a></li>
                                            <li><a class="dropdown-item" href="<?= base_url('packs/add'); ?>">Add</a></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php if (session('logged_in')): ?>
                                <?php if (session('user')->role == 2): ?>
                                    <li class="nav-item">
                                        <a class="btn btn-dark" href="<?= base_url('user/list'); ?> ">Users</a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="btn btn-dark" href="<?= base_url('about'); ?> ">About</a>
                            </li>
                        </ul>
                    </ul>
                    <form class="d-flex">
                        <!-- <button class="btn btn-outline-success" type="submit">Sign In</button> -->
                        <?php if (session('logged_in')): ?>
                            <a href="<?= base_url('user/profile') ?>" class="btn btn-outline-primary me-1">Profile</button>
                                <a href="<?= base_url('user/logout') ?>" class="btn btn-outline-danger ms-1">Log Out</a>
                            <?php else: ?>
                                <a href="<?= base_url('user/register') ?>" class="btn btn-outline-danger ms-1">Register</a>
                                <a href="<?= base_url('user/login') ?>" class="btn btn-outline-success ms-1">Sign In</a>
                            <?php endif; ?>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-shrink-0">
        <div class="container">
            <!-- Begin page content -->
            <?= $content ?>
            <!-- End page content -->
        </div>
    </main>
    <!-- End page content -->
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">&copy; Jaen Package Agency 2023</span>
        </div>
    </footer>
    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>