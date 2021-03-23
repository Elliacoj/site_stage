<?php
    include './elements/header.php';
    if(isset($_SESSION['id'], $_SESSION['mail'])) {
        header("location: ./home.php");
    }

if (isset($_GET['error'])){
    if ($_GET['error'] === '1'){
        echo "<div id='error_problem'>Cette adresse mail n'existe pas!</div>";
    }
    else if ($_GET['error'] === '2'){
        echo '<div id="error_problem">Mot de passe incorrect!</div>';
    }
}
?>
<link href="./styles/index_style.css" rel="stylesheet">
<link href="./styles/admin_page.css" rel="stylesheet">

    <form id="index_login" method="POST" action="../login.php?error=0">
        Identification
        <label>
            E-mail<br>
            <input type="email" name="e-mail" placeholder="E-mail" required maxlength="100">
            Password<br>
            <input type="password" name="password" placeholder="Password" required maxlength="100">
        </label>
        <button type="submit">Login</button>
    </form>

<?php
    include './elements/footer.php';
?>