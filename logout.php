<?php
if (isset($_COOKIE["loggedin"])) {
    setcookie('loggedin', FALSE, time()-300);
}

define('TITLE', 'Logout');
include('templates/header.html');

header("Location: http://localhost/index.php");

include('templates/footer.html');
?>