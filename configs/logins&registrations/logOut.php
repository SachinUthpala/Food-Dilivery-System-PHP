<?php

session_start();

session_decode($_SESSION["userName"]);


header("Location: http://localhost/Food-Dilivery-System");

?>