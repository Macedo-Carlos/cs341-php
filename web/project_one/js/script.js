function searchCustomer(){
    let customerName = document.getElementById('customerName').value;
    const url = "customer_search.php?customerName=" + customerName;
    fetch(url)
    .then(response => response.text())
    .then(data => {
        document.getElementById('customersListContainer').innerHTML = data
    })
    .catch(err => console.log(err));
}