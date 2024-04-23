<?php
    // Include database connection
    include '../import/connect.php';

    // Variable to store messages
    $message = '';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the form
        $product_price = $_POST["product_price"];
        $product_quantity = $_POST["product_quantity"];
        $category_id = $_POST["category_id"];

        // Fetch product name based on category
        $sql_product_name = "SELECT 
                                p.product_id,
                                CASE
                                    WHEN b.book_name IS NOT NULL THEN b.book_name
                                    WHEN op.others_product_name IS NOT NULL THEN op.others_product_name
                                    ELSE 'Unknown'
                                END AS product_name
                            FROM products p
                            LEFT JOIN books b ON p.product_id = b.product_id
                            LEFT JOIN others_products op ON p.product_id = op.product_id
                            WHERE p.category_id = ?";
        
        // Execute the query to fetch product name
        $params = array($category_id);
        $stmt_product_name = sqlsrv_query($conn, $sql_product_name, $params);

        // Check query execution
        if ($stmt_product_name === false) {
            $message = "Error fetching product name: " . print_r(sqlsrv_errors(), true);
        } else {
            // Fetch product name from the query result
            $row_product_name = sqlsrv_fetch_array($stmt_product_name, SQLSRV_FETCH_ASSOC);
            $product_name = $row_product_name['product_name'];

            // Prepare SQL query to insert product
            $sql_insert_product = "INSERT INTO products (product_name, product_price, product_quantity, category_id) 
                                    VALUES (?, ?, ?, ?)";
            
            // Prepare and execute the query
            $params_insert = array($product_name, $product_price, $product_quantity, $category_id);
            $stmt_insert_product = sqlsrv_query($conn, $sql_insert_product, $params_insert);

            // Check query execution
            if ($stmt_insert_product === false) {
                // If error, display error message
                $message = "Error adding product: " . print_r(sqlsrv_errors(), true);
            } else {
                // If success, display success message
                $message = "Product added successfully.";
            }
        }
    }

    // Close the connection
    sqlsrv_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h2>Add New Product</h2>
    <!-- Display message -->
    <?php if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    
    <!-- Form to add product -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <!-- Product Price -->
        <label for="product_price">Product Price:</label>
        <input type="number" name="product_price" id="product_price" min="0" step="0.01" required><br><br>
        
        <!-- Product Quantity -->
        <label for="product_quantity">Product Quantity:</label>
        <input type="number" name="product_quantity" id="product_quantity" min="0" required><br><br>
        
        <!-- Category -->
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" required>
            <!-- Fetch and display category options -->
            <?php
            $sql_categories = "SELECT category_id, category_name FROM product_categories";
            $stmt_categories = sqlsrv_query($conn, $sql_categories);

            if ($stmt_categories === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($row = sqlsrv_fetch_array($stmt_categories, SQLSRV_FETCH_ASSOC)) {
                echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
            }

            sqlsrv_close($conn);
            ?>
        </select><br><br>
        
        <!-- Add Product button -->
        <button type="submit">Add Product</button>
    </form>

    <!-- Table to display product names -->
    <h2>Product Names</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Reconnect to the database
            include '../import/connect.php';

            // Fetch product_id and product_name
            $sql_product_names = "SELECT 
                                    p.product_id,
                                    CASE
                                        WHEN b.book_name IS NOT NULL THEN b.book_name
                                        WHEN op.others_product_name IS NOT NULL THEN op.others_product_name
                                        ELSE 'Unknown'
                                    END AS product_name
                                FROM products p
                                LEFT JOIN books b ON p.product_id = b.product_id
                                LEFT JOIN others_products op ON p.product_id = op.product_id";
            $stmt_product_names = sqlsrv_query($conn, $sql_product_names);

            if ($stmt_product_names === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            // Display product_id and product_name in the table
            while ($row = sqlsrv_fetch_array($stmt_product_names, SQLSRV_FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "</tr>";
            }

            sqlsrv_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>
