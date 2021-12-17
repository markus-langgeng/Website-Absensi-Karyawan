<?php
session_start();

if(!isset($_SESSION['username']) || !isset($_SESSION['level'])) {
   header('Location: index.php');
}

?>