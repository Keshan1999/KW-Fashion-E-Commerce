<?php
// Step 1: Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kwfashion";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Fetch data from the database
$sql = "SELECT product_id, proname, procategory, proprice, proquantity FROM product"; // Adjust the table and column names as per your database
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link rel="stylesheet" href="admin/css/product.css">
</head>
<body class="body">
  <header>
    <nav>
      <ul>
        <li>
          <a href="dashboard.html" class="logo">
            <div class="Mp">
              <a class="logo" href="index.html"><img width="100" src="images/Kw.png" alt="#" /></a>
            </div>
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <br><br>
  <main>
    <!-- Table -->
    <div class="table-responsive datatable-custom">
      <h1 class="product">Products</h1>
      <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
        <thead class="thead-light">
          <tr>
            <th scope="col" class="table-column-pe-0">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                <label class="form-check-label"></label>
              </div>
            </th>
            <th class="table-column-ps-0">Product</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="productTableBody">
          <?php
          // Step 3 and 4: Loop through fetched data and generate HTML table rows
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td><div class='form-check'><input class='form-check-input' type='checkbox' value=''><label class='form-check-label'></label></div></td>";
                  echo "<td>" . $row["proname"] . "</td>";
                  echo "<td>" . $row["procategory"] . "</td>";
                  echo "<td>" . $row["proprice"] . "</td>";
                  echo "<td>" . $row["proquantity"] . "</td>";
                  echo "<td>
                            <a href='edit_product.php?product_id=" . $row["product_id"] . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_product.php?product_id=" . $row["product_id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a>
                        </td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='6'>No products found</td></tr>";
          }
          $conn->close();
          ?>
        </tbody>
      </table>
    </div>
    <!-- End Table -->
  </main>
  <script src="admin/js/adminproduct.js"></script>
</body>
</html>
