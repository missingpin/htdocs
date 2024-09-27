<head>
    <link rel="stylesheet" href="header.css">
    <script src="header.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar">
        <h1>
            <a class="title" href="dashboard.php">PROJECT</a>
        </h1>
        <h2>
            <a class="inventory" href="table.php">Inventory</a>
        </h2>
        <h3 class="alerts" onclick="toggleAlerts()">Alerts</h3>
        <div class="menu-toggle" id="menu-toggle">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul class="nav-list" id="nav-list">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="login.php">Log Out</a></li>
        </ul>
    </nav>
    <div id="alert-container" class="alert-container">
    <div id="low-stock-alerts" class="low-stock-alerts"></div>
    <a href="alerts.php" class="go-to-alerts">Go to Alerts</a>
</div>

        </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetchLowStockProducts();
        });

        function fetchLowStockProducts() {
            fetch('alertcheck.php')
                .then(response => response.json())
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
    } else {
        const limitedProducts = products.slice(0, 5);
        
        limitedProducts.forEach(product => {
            const alertItem = document.createElement('div');
            alertItem.className = 'alert alert-warning sentence';

            const productName = document.createElement('span');
            productName.textContent = `Low-stock for: ${product.productname}`;

            const quantityLeft = document.createElement('div');
            quantityLeft.textContent = `${product.quantity} Left!`;
            quantityLeft.style.marginTop = '5px';

            alertItem.appendChild(productName);
            alertItem.appendChild(quantityLeft);
            alertContainer.appendChild(alertItem);
        });
    }
}
    </script>
</body>