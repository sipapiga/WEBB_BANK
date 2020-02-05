<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top mb-3">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/"><?php echo SITENAME  ; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
    <?php if(isset($_SESSION['user_name'])) : ?>
      <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/dashboard.php">Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/transfer.php">Transfer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link transaction" id="<?php echo $_SESSION['user_account_id']; ?>" href="<?php echo URLROOT; ?>/pages/transactions.php?id=<?php echo $_SESSION['user_account_id']; ?>">Transactions</a>
          </li>
          <?php endif; ?>
        </ul>
        <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['user_name'])) : ?>
            <li class="nav-item">
              <a class="nav-link"><?php echo $_SESSION['user_name']; ?></a>
            </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/user/logout.php">Logout</a>
            </li>
          <?php else : ?>
                     <li class="navbar-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>">Login</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>