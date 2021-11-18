<?php
session_start();
unset($_SESSION["pelanggan"]);
unset($_SESSION["admin"]);
header('Location:index.php');
