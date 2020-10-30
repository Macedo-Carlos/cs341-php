function searchCustomer(){
    let customerName = document.getElementById('customerName').value;
    console.log(customerName);
    fetch('customer_search.php', {
        method: 'POST',
        body: new URLSearchParams('customerName=' + customerName)
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