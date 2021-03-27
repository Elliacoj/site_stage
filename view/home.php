<?php
include './elements/header.php';
?>

    <div id="home_welcome_message">
        <?php
            echo "<h2> Bienvenue " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "!</h2>";
        ?>
    </div>
    <div id="home_day_message">
        <div>
            Message blabla.
        </div>
    </div>

<?php
include "./elements/footer.php";
?>
