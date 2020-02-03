<?php require_once '../include/header.php';

include_once '../config/Database.php';
include_once '../models/User.php';

$db = new Database();
$user = new user($db);

$result = $user->getUsers($_SESSION['user_id']);

?>
<div class="row">
    <div class="col-md-10" id="card-transfer">
        <div class="card card-md">
            <div><br>

                <h3> <strong style="padding-left:10px;">Account</strong></h3>
            </div>
            <div class="pl-4">
                <p> <strong>Name: </strong> <?php echo $result->firstName ?> <strong>Lastname: </strong>
                    <?php echo $result->lastName ?></p>
                <p> <strong>Telephone number: </strong> <?php echo $result->mobilephone ?></p>
                <p> <strong>Balance: </strong><?php echo $result->balance ?> SEK</p>

            </div>
        </div>
    </div>
</div>


<?php require '../include/footer.php';?>