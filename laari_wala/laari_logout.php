<?php
session_start();

unset($_SESSION["laari_owner_id"]);
session_destroy();
header("Location:laari_login.php");
?>