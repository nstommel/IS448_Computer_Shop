<?php
session_start();
if (isset($_SESSION["shoppingCart"])) {
    echo count($_SESSION["shoppingCart"]);
} else {
    echo 0;
}