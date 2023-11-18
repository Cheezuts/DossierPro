<div class="container-fluid sticky-top ">
    <div class="container">
        <nav class="navbar navbar-expand-lg  p-0">
            <a href="/TestMVC/index.php" class="navbar-brand">
                <h1 class="text-white">DossierProLOCAL<span class="">.</span>AE</h1>
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link active">Code de la Route</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Permis</a>
                        <ul class="dropdown-menu mt-2">
                            <li><a href="feature.html" class="dropdown-item">Voiture</a></li>
                            <li><a href="team.html" class="dropdown-item">Moto</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="service.html" class="nav-link">Points de RDV</a>
                    </li>
                    <li class="nav-item">
                        <a href="service.html" class="nav-link">Pièces administratives</a>
                    </li>
                    <li class="nav-item">
                        <a href="project.html" class="nav-link">Financements</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.html" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a href="Vue/car/car-list.php" class="nav-link">VoituresMVC</a> -->
                        <a href="?action=list" class="nav-link">VoituresMVC</a>
                    </li>
                    <li class="nav-link">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-link">
                        <a href="?action=create" class="nav-link">Create</a>
                    </li>

                    <!-- Lien Admin -->
                    <li class="nav-link">
                        <?php
                        // Vérifier si la session est active
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }

                        // Si l'administrateur est connecté, rediriger vers le dashboard
                        if (isset($_SESSION['admin_email'])) {
                            echo '<a href="?action=adminPage" class="nav-link">Admin</a>';
                        } else {
                            echo '<a href="?action=admin" class="nav-link">Admin</a>';
                        }
                        ?>
                    </li>

                    <?php if (isset($_GET['action']) && $_GET['action'] === 'adminPage') : ?>
                        <!-- Lien de déconnexion uniquement dans la page AdminDashboard -->
                        <li class="nav-link">
                            <a href="?action=logout" class="nav-link">Déconnexion</a>
                        </li>
                    <?php endif; ?>

                </ul>
                <button type="button" class="btn text-white p-0 d-none d-lg-block" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
            </div>
        </nav>
    </div>
</div>

<div class="container">