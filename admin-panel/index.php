<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="sidebar">
    <h3>TechCoder Software Pvt Ltd</h3>

    <ul>
        <li><a href="index.php">Dashboard</a></li>
    </ul>
</div>

<div class="main">

    <div class="header">
        <h4>Admin Dashboard</h4>
    </div>

    <div class="container mt-4">

        <div class="card p-4">

            <div class="d-flex justify-content-between mb-3">
                <h4>Product List</h4>

                <a href="add-product.php" class="btn btn-primary">
                    Add Product
                </a>
            </div>

            <table class="table table-bordered table-hover">

                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

                <?php

                $query = mysqli_query($conn,"SELECT * FROM products ORDER BY id DESC");

                while($row = mysqli_fetch_array($query))
                {
                ?>

                <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td>
                        <img src="uploads/<?php echo $row['product_image']; ?>" width="70">
                    </td>

                    <td><?php echo $row['product_name']; ?></td>

                    <td>₹<?php echo $row['product_price']; ?></td>

                    <td>

                        <a href="edit-product.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">
                            Edit
                        </a>

                        <a href="delete-product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">
                            Delete
                        </a>

                    </td>

                </tr>

                <?php } ?>

            </table>

        </div>

    </div>

    <div class="footer">
        © 2026 TechCoder Software Pvt Ltd
    </div>

</div>

</body>
</html>