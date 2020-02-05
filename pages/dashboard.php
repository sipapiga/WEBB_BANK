<?php require_once '../include/header.php';

include_once '../config/Database.php';
include_once '../models/User.php';

$db = new Database();
$user = new user($db);

$result = $user->getUsers($_SESSION['user_account_id']);

?>
<div class="row">
    <div class="col-md-10" id="card-transfer">
        <div class="card card-md">
            <div><br>

                <h3> <strong style="padding-left:10px;" class="user" id="<?php echo $result->account_id ?>">Account</strong></h3>
            </div>
            <div class="row pl-4">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Name: </strong>
                        </div>
                        <div class="col-md-8">
                            <?php echo $result->firstName ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Lastname: </strong>
                        </div>
                        <div class="col-md-8">
                            <?php echo $result->lastName ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Telephone number: </strong>
                        </div>
                        <div class="col-md-8">
                            <?php echo $result->mobilephone ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Balance: </strong>
                        </div>
                        <div class="col-md-8 mb-4">
                            <?php echo $result->balance ?>
                        </div>
                    </div>
                   
                </div>

            </div >
        </div>
    </div>
</div>


<?php require '../include/footer.php';?>