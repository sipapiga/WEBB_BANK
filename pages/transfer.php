<?php require '../include/header.php';?>
<div class="row">
    <div class="col-md-10" id="card-transfer">
        <div id="info"></div>
        <div class="card card-md">
            <div><br>
                <strong style="padding-left:10px;">QUICK MONEY TRANSFER</strong>
            </div>
            <div>
                <div class="container-fluid">
                    <div class="row pl-4">
                        <div class="col-md-10">
                            <form action="#" method="POST" name="transfer" id="transfer">
                                <div class="form-group pt-5" style="margin-bottom:0px;" width="22%">
                                    <label for="txtrecipient">Choose recipient</label>
                                    <select class="form-control" id="chooseRecipient">
                                    </select>
                                </div>
                                <div class="form-group pt-5" style="margin-bottom:0px;" width="22%">
                                    <input type="text" class="form-control" style="margin-bottom:0px;" name="balance"
                                        id="balance" placeholder="Balance">
                                </div>
                                <div class="waves-input-wrapper waves-effect waves-light text-right mr-4 pt-5"><input
                                        name="submit" type="submit" value="Transfer" class="btn btn-primary"
                                        id="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require '../include/footer.php';?>