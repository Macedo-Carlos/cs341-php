function searchCustomer(){
    let customerName = document.getElementById('customerName').value;
    console.log(customerName);
    console.log(new URLSearchParams('action=searchCustomer&customerName=' + customerName));
    fetch('index.php', {
        method: 'POST',
        body: new URLSearchParams('action=searchCustomer&customerName=' + customerName)
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