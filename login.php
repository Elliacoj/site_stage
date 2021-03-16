<?php
require_once "require.php";

if(isset($_POST['error'], $_POST['e-mail'], $_POST['password']) && $_POST['error'] === "0") {
    $mail = json_decode(base64_decode($_POST['e-mail']));
    $mail = strip_tags(trim($mail));
    $password = base64_decode(json_decode($_POST['password']));
    $password = strip_tags(trim($password));

    checkPassword($mail, $password);

    /**
     * Check if information of login is correct and creat a session for the user
     * @param string $mail
     * @param string $password
     */
    function checkPassword(string $mail, string $password) {
        $user = new UserController();

        if($user->logUser($mail)) {
            if(password_verify($password, $user->logUser($mail)->getPassord())) {
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
}