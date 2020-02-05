<?php require_once '../include/header.php';?>
<div id="card-transfer">
    <h2>Withdrawal History</h2>
    <table class='table table-bordered table-hover pt-5'>
        <tr>
            <th class='w-25-pct'>Date</th>
            <th class='w-10-pct'>Amount(SEK)</th>
            <th class='w-15-pct'>From</th>
            <th class='w-25-pct'>To Account</th>
        </tr>
        <tbody id="output"></tbody>
    </table>
</div>

<div id="card-transfer" class="pb-5 pt-5">
    <h2>Deposit History</h2>
    <table class='table table-bordered table-hover pt-5'>
        <tr>
            <th class='w-25-pct'>Date</th>
            <th class='w-10-pct'>Amount(SEK)</th>
            <th class='w-15-pct'>From Account</th>
            <th class='w-25-pct'>To</th>
        </tr>
        <tbody id="output2"></tbody>
    </table>
</div>
<?php require '../include/footer.php';?>