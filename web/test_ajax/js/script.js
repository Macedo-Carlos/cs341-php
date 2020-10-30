function searchCustomer(){
    let customerName = document.getElementById('customerName').value;
    fetch('customer.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-type': 'application/json'
        },
        body: JSON.stringify({'customerName':customerName})
    })
    .then(response => {
        return response.text();
    })
    .then(data =>{
        console.log(data);
        document.getElementById('outputDiv').innerHTML = data;
    })
    .catch(error => console.log(error));
}