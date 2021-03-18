<?php
include './elements/header.php';
?>

    <div id="home_welcome_message">
        <?php
            echo "Bienvenue " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "!";
        ?>
    </div>

<?php
include "./elements/footer.php";
?>
