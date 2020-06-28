<?php session_start() ?>
<?php include "header.php" ?>
<?php include "db.php" ?>
<h2 style="text-align: center; margin-top: 2%;">Product Information</h2>

<?php
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $_SESSION['id'] = $id;
    $query = "select * from products where product_id = $id";
    $selected_products = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($selected_products)) {
        $prod_id = $row['product_id'];
        $prod_name = $row['product_name'];
        $prod_price = $row['unit_price'];
        $prod_quantity = $row['unit_quantity'];
        $prod_stock = $row['in_stock'];
?>
        <div class="pt-3" style="text-align: center">
            <div class="product-info">
                <h4>Product Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $prod_name ?></h4>
                <h4>Product Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $prod_price ?></h4>
                <h4>Product Quantity: &nbsp;&nbsp;<?php echo $prod_quantity ?></h4>
            </div>

        </div>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <form action="bottom_right_frame.php" method="POST" target="bottom_right_frame">
                    <div class="form-group pt-3">
                        <h4>Quantity</h4>
                        <input type="number" name="quantity" required class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add To Cart</button>
                </form>
            </div>
        </div>
<?php
    }
}
?>

<?php
mysqli_close($connection) ?>
<?php include "footer.php" ?>