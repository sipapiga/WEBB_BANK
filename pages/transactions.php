<?php require_once '../include/header.php';?>
<div id="card-transfer">
    <h2>Transaction History</h2>
    <table class='table table-bordered table-hover pt-5'>
        <tr>
            <th class='w-25-pct'>Date</th>
            <th class='w-10-pct'>Amount(SEK)</th>
            <th class='w-15-pct'>From</th>
            <th class='w-25-pct'>To Accout</th>
        </tr>
        <tbody id="output"></tbody>
    </table>
</div>
<?php require '../include/footer.php';?>