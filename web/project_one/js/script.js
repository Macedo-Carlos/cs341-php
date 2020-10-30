document.getElementById('customerSearch').addEventListener('submit', searchCustomer());

function searchCustomer(e){
    e.preventDefault();
    let customerName = document.getElementById('customerSearchBox').value;
    fetch('customer_search.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-type': 'application/json'
        },
        body: JSON.stringify({'action':'searchCustomer','customerName':customerName})
    })
    .then(response => {
        document.getElementById('customersListContainer').innerHTML = response;
    })
    .catch(error => console.log(error));
}