<?php

include '../config/Database.php';
require '../include/header.php';
include '../models/User.php';

//session_start();
if (isset($_POST['submit'])) {
    // Init data
    $data = [
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
    ];

// Validate Email
    if (empty($data['username'])) {
        $data['username_err'] = 'Please enter username';
    }

// Validate Password
    if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
    }

    if (empty($data['username_err']) && empty($data['password_err'])) {
        $db = new Database();
        $user = new User($db);
        $isValidated = $user->login($data);
        echo var_dump($isValidated);

        if ($isValidated) {
            $_SESSION['user_name'] = $isValidated->firstName;
            $_SESSION['user_account_id'] = $isValidated->account_id;
           
            header('Location: ../pages/dashboard.php');
        } else {
            header('Location: /WEBB_BANK/index.php?msg_err=Something went wrong');
        }

    }
}
?>

