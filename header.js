document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menu-toggle');
    const navList = document.getElementById('nav-list');
    const alertContainer = document.getElementById('alert-container');

    menuToggle.addEventListener('click', () => {
        navList.style.display = navList.style.display === 'flex' ? 'none' : 'flex';
    });

    alertContainer.style.display = 'none';

    fetchLowStockProducts();
});

function toggleAlerts() {
    const alertContainer = document.getElementById('alert-container');
    alertContainer.style.display = alertContainer.style.display === 'block' ? 'none' : 'block';
}

function fetchLowStockProducts() {
    fetch('alertcheck.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            displayLowStockAlerts(data);
        })
        .catch(error => console.error('Error fetching low stock products:', error));
}

function displayLowStockAlerts(products) {
    const alertContainer = document.getElementById('low-stock-alerts');
    alertContainer.innerHTML = '';

    if (products.length === 0) {
        alertContainer.innerHTML = '<p>No low stock alerts.</p>';
        return;
    }

    const sortedProducts = products.sort((a, b) => new Date(b.last_updated) - new Date(a.last_updated));
    
    sortedProducts.forEach(product => {
        const alertItem = document.createElement('div');
        alertItem.className = 'alert alert-warning';
        alertItem.textContent = `Low-stock for ${product.productname}: ${product.quantity} left`;
        alertContainer.appendChild(alertItem);
    });
}