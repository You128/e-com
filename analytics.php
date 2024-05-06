<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "ecommerce_website"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// orders
$sqlOrders = "SELECT COUNT(*) AS totalOrders FROM orders";
$resultOrders = mysqli_query($conn, $sqlOrders);
$rowOrders = mysqli_fetch_assoc($resultOrders);
$totalOrders = $rowOrders['totalOrders'];

// products
$sqlProducts = "SELECT COUNT(*) AS totalProducts FROM products";
$resultProducts = mysqli_query($conn, $sqlProducts);
$rowProducts = mysqli_fetch_assoc($resultProducts);
$totalProducts = $rowProducts['totalProducts'];

// customers
$sqlCustomers = "SELECT COUNT(*) AS totalCustomers FROM customers";
$resultCustomers = mysqli_query($conn, $sqlCustomers);
$rowCustomers = mysqli_fetch_assoc($resultCustomers);
$totalCustomers = $rowCustomers['totalCustomers'];

//revenue from sales
$sqlRevenue = "SELECT SUM(total_amount) AS totalRevenue FROM orders";
$resultRevenue = mysqli_query($conn, $sqlRevenue);
$rowRevenue = mysqli_fetch_assoc($resultRevenue);
$totalRevenue = $rowRevenue['totalRevenue'];

// total cost price of all
$sqlCostPrice = "SELECT SUM(price * stock_quantity) AS totalCostPrice FROM products";
$resultCostPrice = mysqli_query($conn, $sqlCostPrice);
$rowCostPrice = mysqli_fetch_assoc($resultCostPrice);
$totalCostPrice = $rowCostPrice['totalCostPrice'];


// shipped orders
$sqlShippedOrders = "SELECT COUNT(*) AS totalShippedOrders FROM orders WHERE status = 'Shipped'";
$resultShippedOrders = mysqli_query($conn, $sqlShippedOrders);
$rowShippedOrders = mysqli_fetch_assoc($resultShippedOrders);
$totalShippedOrders = $rowShippedOrders['totalShippedOrders'];

// delivered orders
$sqlDeliveredOrders = "SELECT COUNT(*) AS totalDeliveredOrders FROM orders WHERE status = 'Delivered'";
$resultDeliveredOrders = mysqli_query($conn, $sqlDeliveredOrders);
$rowDeliveredOrders = mysqli_fetch_assoc($resultDeliveredOrders);
$totalDeliveredOrders = $rowDeliveredOrders['totalDeliveredOrders'];

// orders in processing
$sqlProcessingOrders = "SELECT COUNT(*) AS totalProcessingOrders FROM orders WHERE status = 'Processing'";
$resultProcessingOrders = mysqli_query($conn, $sqlProcessingOrders);
$rowProcessingOrders = mysqli_fetch_assoc($resultProcessingOrders);
$totalProcessingOrders = $rowProcessingOrders['totalProcessingOrders'];

// Fetch top products ordered
$sqlTopProducts = "SELECT products.name AS productName, COUNT(order_items.product_id) AS orderCount 
                  FROM order_items 
                  INNER JOIN products ON order_items.product_id = products.product_id 
                  GROUP BY order_items.product_id 
                  ORDER BY orderCount DESC 
                  LIMIT 3";

$resultTopProducts = mysqli_query($conn, $sqlTopProducts);

$topProducts = array();

while ($row = mysqli_fetch_assoc($resultTopProducts)) {
    $productName = $row['productName'];
    $orderCount = $row['orderCount'];
    $topProducts[] = array('productName' => $productName, 'orderCount' => $orderCount);
}


mysqli_close($conn);
?>
