<?php
require __DIR__.'/include/header.php';

?>

<div class="row" id="login-div">
    <div class="col-md-10 mx-auto">
      <div class="card card-body bg-light mt-5 pb-5">

        <h2>Login</h2>
        <p>Please fill in your credentials to log in</p>
        <form action="<?php echo URLROOT; ?>/user/login.php" method="post">
          <div class="form-group">
          <label for="username">Username: <sup>*</sup></label>
                    <input type="username" name="username" class="form-control form-control-lg
             <?php echo (!empty($_GET['msg_err'])) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $_GET['msg_err']; ?></span>

          </div>
          <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg
             <?php echo (!empty($_GET['msg_err'])) ? 'is-invalid' : ''; ?>" >
            <span class="invalid-feedback"><?php echo $_GET['msg_err']; ?></span>

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

<?php require 'include/footer.php';?>
