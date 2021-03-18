<div id="navigation_bar">
    <header>
        <h1>App</h1>
    </header>

    <div id="navigation_open"><i class="fas fa-bars"></i></div>

<?php
    if (isset($_SESSION['role'])) {
?>
    <div id="nav_welcome_message">Bonjour Nom prénom!</div>
<?php
    }
?>
    <nav id="nav_mobile">
        <div id="nav_theme_switch">
            <i class="fas fa-adjust"></i> Mode <span id="theme_app_text">sombre</span>
        </div>
<?php
    if (isset($_SESSION['role'])) {
?>
        <div id="nav_home_button">
            <a href="./home.php"><i class="fas fa-house-user"></i> Home</a>
        </div>
        <div id="nav_course_button">
            <a href="./course.php"><i class="fas fa-file-alt"></i> Cours</a>
        </div>
        <div id="nav_exercices_button">
            <a href="./exercices.php"><i class="fas fa-laptop-code"></i> Exercices</a>
        </div>
        <div id="nav_projects_button">
            <a href="./projects.php"><i class="fas fa-laptop-code"></i> Projects</a>
        </div>
        <div id="nav_evaluations_button">
            <a href="./evaluations.php"><i class="fas fa-laptop-code"></i> Evaluations</a>
        </div>
<?php
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'administrateur') {
?>
        <div id="nav_administration_button">
            <a href="./administration.php"><i class="fas fa-laptop-code"></i> Administration</a>
        </div>
<?php
        }
    }
?>
    </nav>
    <div id="nav_logout_section">
<?php
    if (isset($_SESSION['role'])) {
?>
        <a href="<?= $rootHtml ?>/logout.php"><button id='nav_logout_button'>Logout</button></a>
<?php
    }
?>
    </div>
</div>
<div id="page_container">