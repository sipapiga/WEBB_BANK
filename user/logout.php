<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['user_id']);
session_destroy();
header('Location: /WEBB_BANK/');
