function searchCustomer(){
    let customerName = document.getElementById('customerName').value;
    fetch('customer.php', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify({
            customerName: customerName
        })
    })
    .then(res => {
        return res.text();
    })
    .then(data => console.log(data))
    .catch(err => console.log('Network Error'));
}