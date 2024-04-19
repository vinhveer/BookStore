<?php
session_start();

if (isset($_SESSION['user_id']))
    header('Location: customer/index.php');
else
    header('Location: login/sign_in.php');
