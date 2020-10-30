function searchCustomer(){
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
        console.log(response);
        document.getElementById('customersListContainer').innerHTML = response.text();
    })
    .catch(error => console.log(error));
}