<?php

include '../config/User.php';
require '../include/header.php';

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
       
        $user = new User();
        $isValidated = $user->login($data);

        if ($isValidated) {
            $_SESSION['username'] = $isValidated->username;
            // echo "<h1>".$_SESSION['username']."</h1>";
            header('Location: /WEBB_BANK/index.php');
        } else {
            header('Location: /index.php?msg_err=Det gick inte att logga in');
        }

    }
}
?>

<div class="row pt-4 pb-4">
    <div class="col-md-10 mx-auto">
        <div class="card card-body bg-light mt-5">

            <h2>Login</h2>
            <p>Please fill in your credentials to log in</p>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username: <sup>*</sup></label>
                    <input type="username" name="username" class="form-control form-control-lg
            <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg
            <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>

                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" name="submit" value="Login" class="btn btn-success btn-block">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


<?php require '../include/footer.php';?>