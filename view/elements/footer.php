
        </div>
    </div>

        <!-- JQuery js -->
        <script src="./scripts/jquery-3.6.0.min.js"></script>

        <!-- Fonctions scripts -->
        <script src="./scripts/dark_mode.js"></script>
        <script src="./scripts/nav_mobile_version.js"></script>

        <?php if(isset($_SESSION['role']) && $_SESSION['role'] !== "administrateur") {?>
            <script src="./scripts/display.js"></script>
        <?php } ?>
</body>

</html>