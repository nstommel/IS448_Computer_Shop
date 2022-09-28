<?php
session_start();
unset($_SESSION["shoppingCart"]);
echo "Successfully cleared shopping cart!";