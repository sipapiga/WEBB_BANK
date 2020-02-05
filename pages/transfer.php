<?php require '../include/header.php';?>
<div class="row">
    <div class="col-md-10" id="card-transfer">
 
        <div id="info"></div>

    <div class="card card-md">
        <div><br>

            <strong style="padding-left:10px;">QUICK MONEY TRANSFER</strong>
        </div>
        <div>
            <form action="#" method="POST" name="transfer" id="transfer">

                <table class="table" style="margin-bottom:0px;">

                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" style="margin-bottom:0px; margin-top:0px; "
                                        name="reciever_id" id="reciever_id" placeholder="Account Number" required="">
                                </div>
                            </td>

                            <td style="margin-bottom:0px;" width="22%">
                                <input type="text" class="form-control" style="margin-bottom:0px;" name="balance"
                                    id="balance" placeholder="Balance" >
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="waves-input-wrapper waves-effect waves-light text-right mr-4" ><input name="submit" type="submit"
                        value="Transfer" class="btn btn-primary" id="submit"></div>


            </form>
        </div>
    </div>
    </div>
</div>
<?php require '../include/footer.php';?>