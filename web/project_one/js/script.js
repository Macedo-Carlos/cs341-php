function searchCustomer(){
    let customerName = document.getElementById('customerName').value;
    let queryBody = "action=searchCustomer&customerName=" + customerName;
    fetch('index.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: queryBody
        })
    .then(res => {
        return res.text();
    })
    .then(data => {
        console.log(data);
        document.getElementById('customersListContainer').innerHTML = data;
    })
    .catch(err => console.log('Network Error'));
}