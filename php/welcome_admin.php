<?php
session_start();
echo 'Welcome '.$_SESSION['username'];
echo '<br><a href="admin.php?action=logout">Logga ut</a>';
?>