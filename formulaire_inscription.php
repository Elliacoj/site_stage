<?php
require_once "require.php";
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="./create.php?table=user&error=0" method="POST">
        <div>
            <label for="firstname">Prénom: </label>
            <input type="text" name="firstname" id="firstname" required>
        </div>
        <div>
            <label for="lastname">Nom: </label>
            <input type="text" name="lastname" id="lastname" required>
        </div>
        <div>
            <label for="password">Mot de passe: </label>
            <input type="text" name="password" id="password" required>
        </div>
        <div>
            <label for="mail">Adresse email: </label>
            <input type="email" name="mail" id="mail" required>
        </div>
        <div>
            <label for="role">Role: </label>
            <select name="role" id="role" required>
                <?php
                $role = new RoleController();
                $roles = $role->getRole();
                foreach ($roles as $item) {
                    echo "<option value='" . $item->getId() . "'>" . $item->getName() . "</option>";
                }
                ?>
            </select>
        </div>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>