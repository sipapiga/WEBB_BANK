$(document).ready(function () {

    getTransaction();

    function getTransaction() {
        fetch("http://localhost/WEBB_BANK/api/transaction.php")
            .then((res) => res.json())
            .then((data) => {
                console.log(data.result);
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
                document.getElementById('output').innerHTML = output;
            })
    }
});