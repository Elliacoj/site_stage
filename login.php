<?php
require_once "require.php";

if(isset($_GET['error'], $_POST['e-mail'], $_POST['password']) && $_GET['error'] === "0") {
    $mail = strip_tags(trim($_POST['e-mail']));
    $password = strip_tags(trim($_POST['password']));

    /**
     * Check if information of login is correct and creat a session for the user
     * @param string $mail
     * @param string $password
     */
    function checkPassword(string $mail, string $password) {
        $user = new UserController();

        if($user->logUser($mail)) {
            if(password_verify($password, $user->logUser($mail)->getPassword())) {
                $_SESSION['id'] = $user->logUser($mail)->getId();
                $_SESSION['firstname'] = $user->logUser($mail)->getFirstname();
                $_SESSION['lastname'] = $user->logUser($mail)->getLastname();
                $_SESSION['mail'] = $user->logUser($mail)->getMail();
                $_SESSION['role'] = $user->logUser($mail)->getRole();
                header("location: ./view/home.php");
            }
            else {
                header('location: ./view/index.php?error=2');
            }
        }
        else {
            header('location: ./view/index.php?error=1');
        }
    }

    checkPassword($mail, $password);
}