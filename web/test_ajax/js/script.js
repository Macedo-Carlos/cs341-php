function searchCustomer(){
    let customerName = document.getElementById('customerName').value;
    let url = window.location.hostname + '/customer.php';
    fetch(url, {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-type': 'application/json'
        },
        body: JSON.stringify({'customerName':customerName})
    })
    .then(response => {
        console.log(response);
        document.getElementById('outputDiv').innerHTML = response;
    })
    .catch(error => console.log(error));
}