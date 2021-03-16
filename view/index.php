<?php
    include './elements/header.php';
?>
<link href="./styles/index_style.css" rel="stylesheet">

    <form id="index_login" method="post">
        Identification
        <label>
            E-mail<br>
            <input type="email" placeholder="E-mail" required maxlength="100">
            Password<br>
            <input type="password" placeholder="Password" required maxlength="100">
        </label>
        <button type="submit">Login</button>
    </form>

<?php
    include './elements/footer.php';
?>