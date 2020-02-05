$(document).ready(function () {
    const Withdrawal = document.getElementById('output');
    const deposit = document.getElementById('output2');
    const submit = document.getElementById('submit');
    const recipientName = document.querySelector("#chooseRecipient");

    if ((Withdrawal && deposit) !== null) {
        getTransaction();
        getDepositTransaction();

    }
    if (recipientName !== null) {
        getrecipientlist();
    }
    if (submit !== null) {
        submit.addEventListener('click', addTransfer);
    }
    function addTransfer(e) {
        e.preventDefault();
        let account_reciever_id = recipientName.options[recipientName.selectedIndex].value;
        let balance = document.getElementById('balance').value;
        let sender_id = $(".transaction").attr("id");

        fetch('http://localhost/WEBB_BANK/api/transfer.php', {
            method: 'POST',
            headers: {
                'Accept': 'application/json,text/plain',
                'Content-type': 'application/json'
            },
            body: JSON.stringify({ from_amount: balance, account_id: sender_id, from_currency: "SEK", to_amount: balance, to_account: account_reciever_id, to_currency: "SEK", currency_rate: 1.000, date: "2020-02-01 00:35:07" })
        })
            .then((res) => res.json())
            .then((data) => $('#info').html('<div class="alert alert-info fade show alert-dismissible">' + data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'))
    }


    function getTransaction() {
        fetch("http://localhost/WEBB_BANK/api/transaction.php")
            .then((res) => res.json())
            .then((data) => {
                let output = '';
                data.result.forEach(function (transaction) {
                    output += `
                    <tr>
                      <td>${transaction.date}</td>
                      <td>${transaction.amount}</td>
                      <td>${transaction.from}</td>
                      <td>${transaction.to}</td>
                    </tr>                
                   `
                });
                Withdrawal.innerHTML = output;
            })
    }

    function getDepositTransaction() {
        fetch("http://localhost/WEBB_BANK/api/deposit.php")
            .then((res) => res.json())
            .then((data) => {
                let output = '';
                data.result.forEach(function (deposit) {
                    output += `
                    <tr>
                      <td>${deposit.date}</td>
                      <td>${deposit.amount}</td>
                      <td>${deposit.from}</td>
                      <td>${deposit.to}</td>
                    </tr>                
                   `
                });
                deposit.innerHTML = output;
            })
    }

    function getrecipientlist() {
        fetch("http://localhost/WEBB_BANK/api/recipientlist.php")
            .then((res) => res.json())
            .then((data) => {
                data.result.forEach(function (recipient) {

                    recipientName.options.add(
                        new Option(recipient.firstname + " " + recipient.lastname, recipient.id)

                    );
                });

            })
    }

});