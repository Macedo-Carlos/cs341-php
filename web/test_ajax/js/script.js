function searchCustomer(){
    let customerName = document.getElementById('customerName').value;
    console.log(customerName);
    fetch('customer.php', {
        method: 'POST',
        body: new URLSearchParams('customerName=' + customerName)
        })
    .then(res => {
        return res.text();
    })
    .then(data => {
        console.log(data);
        document.getElementById('outputDiv').innerHTML = data;
    })
    .catch(err => console.log('Network Error'));
}