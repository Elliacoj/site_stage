<?php
    include './elements/header.php';
?>
<link href="./styles/index_style.css" rel="stylesheet">

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