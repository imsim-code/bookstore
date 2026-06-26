<?php
include 'db.php';

if(isset($_POST['submit']))
{
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];

    $image = $_FILES['product_image']['name'];
    $tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($tmp,"uploads/".$image);

    mysqli_query($conn,"INSERT INTO products(product_name,product_price,product_image)
    VALUES('$name','$price','$image')");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Product</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="sidebar">
    <h3>TechCoder Software Pvt Ltd</h3>
</div>

<div class="main">

<div class="header">
    <h4>Add Product</h4>
</div>

<div class="container mt-5">

<div class="card p-4">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
    <label>Product Name</label>
    <input type="text" name="product_name" class="form-control" required>
</div>

<div class="mb-3">
    <label>Product Price</label>
    <input type="text" name="product_price" class="form-control" required>
</div>

<div class="mb-3">
    <label>Product Image</label>
    <input type="file" name="product_image" class="form-control" required>
</div>

<button type="submit" name="submit" class="btn btn-primary">
    Save Product
</button>

</form>

</div>

</div>

</div>

</body>
</html>