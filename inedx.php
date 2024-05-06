<?php
        include 'analytics.php';
      ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce Analytics</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa; 
    }
    .card {
      background-color: #fff; 
      border-radius: 10px; 
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
      transition: box-shadow 0.3s ease; 
    }
    .card:hover {
      box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); 
    }
    .card-title {
      color: #333;
      font-size: 1.25rem; 
    }
    .card-text {
      color: #666; 
    }
    .table th, .table td {
      border-top: none; 
    }
    .table th {
      color: #333;
      font-weight: bold;
    }
    .table td {
      color: #666; 
    }
    /* Custom status colors */
    .status-shipped {
      background-color: #d4edda; 
    }
    .status-delivered {
      background-color: #cce5ff; 
    }
    .status-processing {
      background-color: #fff3cd; 
    }
  </style>
</head>
<body>

  <div class="container mt-5">
    <h1 class="mb-4 text-center text-primary">E-commerce Analytics</h1>
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-info">Total Orders</h5>
            <p class="card-text">Number of orders: <?php echo $totalOrders; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-success">Total Products</h5>
            <p class="card-text">Number of products: <?php echo $totalProducts; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-warning">Total Customers</h5>
            <p class="card-text">Number of customers: <?php echo $totalCustomers; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-danger">Total Revenue</h5>
            <p class="card-text">Total revenue: $<?php echo number_format($totalRevenue, 2); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title text-primary">Top Products Ordered</h5>
      <ul class="list-group">
        <?php foreach ($topProducts as $product) : ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo $product['productName']; ?>
            <span class="badge badge-primary badge-pill"><?php echo $product['orderCount']; ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

  <div class="container mt-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Order Status Summary</h5>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Status</th>
                <th>Number of Orders</th>
              </tr>
            </thead>
            <tbody>
              <tr class="status-shipped">
                <td>Shipped</td>
                <td><?php echo $totalShippedOrders; ?></td>
              </tr>
              <tr class="status-delivered">
                <td>Delivered</td>
                <td><?php echo $totalDeliveredOrders; ?></td>
              </tr>
              <tr class="status-processing">
                <td>Processing</td>
                <td><?php echo $totalProcessingOrders; ?></td>
              </tr>
              <!-- Add more rows for other statuses if needed -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
