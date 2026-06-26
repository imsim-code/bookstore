<?php

include 'db.php';

$id = $_GET['id'];

$data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM products WHERE id='$id'"));

if(isset($_POST['update']))
{
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];

    if($_FILES['product_image']['name'] != '')
    {
        $image = $_FILES['product_image']['name'];
        $tmp = $_FILES['product_image']['tmp_name'];

        move_uploaded_file($tmp,"uploads/".$image);

        mysqli_query($conn,"UPDATE products SET
        product_name='$name',
        product_price='$price',
        product_image='$image'
        WHERE id='$id'");
    }
    else
    {
        mysqli_query($conn,"UPDATE products SET
        product_name='$name',
        product_price='$price'
        WHERE id='$id'");
    }

    header("location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Product</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="sidebar">
    <h3>TechCoder Software Pvt Ltd</h3>
</div>

<div class="main">

<div class="header">
    <h4>Edit Product</h4>
</div>

<div class="container mt-5">

<div class="card p-4">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Product Name</label>

<input type="text" name="product_name"
value="<?php echo $data['product_name']; ?>"
class="form-control">
</div>

<div class="mb-3">
<label>Product Price</label>

<input type="text" name="product_price"
value="<?php echo $data['product_price']; ?>"
class="form-control">
</div>

<div class="mb-3">

<label>Old Image</label><br>

<img src="uploads/<?php echo $data['product_image']; ?>" width="100">

</div>

<div class="mb-3">
<label>New Image</label>

<input type="file" name="product_image" class="form-control">
</div>

<button type="submit" name="update" class="btn btn-success">
Update Product
</button>

</form>

</div>

</div>

</div>

</body>
</html>