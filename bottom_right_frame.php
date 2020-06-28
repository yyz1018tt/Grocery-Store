<?php session_start() ?>
<?php include "header.php" ?>
<?php include "db.php" ?>

<h2 style="text-align: center; margin-top: 2%;">Shopping Cart</h2>

<?php
function findId($a)
{
    return $a['id'];
}
?>

<?php
$id = $_SESSION['id'];
if (isset($_GET["action"])) {
    unset($_SESSION['shopping_cart']);
} else {

    $quantity = $_REQUEST['quantity'];

    $query = "select * from products where product_id = $id";

    $result = mysqli_query($connection, $query);



    while ($row = mysqli_fetch_assoc($result)) {
        $prod_name = $row['product_name'];
        $prod_price = $row['unit_price'];
        $prod_quantity = $row['unit_quantity'];
        $prod_stock = $row['in_stock'];
?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Stock</th>
                    <th scope="col">Required Quantity</th>
                    <th scope="col">Total Cost</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($_SESSION['shopping_cart'])) {
                    // $item_array_id = array_column($_SESSION['shopping_cart'], "id");
                    $item_array_id = array_map("findId", $_SESSION['shopping_cart']);

                    if (!in_array($id, $item_array_id)) {
                        $count = count($_SESSION['shopping_cart']);
                        $item_array = array(
                            'id'                   =>     $id,
                            'prod_name'            =>     $prod_name,
                            'prod_price'           =>     $prod_price,
                            'prod_quantity'        =>     $prod_quantity,
                            'prod_stock'           =>    $prod_stock,
                            'required_quantity'    => $quantity,
                            'total_cost'           => $prod_price * $quantity
                        );
                        $_SESSION['shopping_cart'][$count] = $item_array;
                    } else {
                        foreach ($_SESSION['shopping_cart'] as $keys => $values) {
                            if ($values['id'] == $id) {
                                $_SESSION['shopping_cart'][$keys]['required_quantity'] = $_SESSION['shopping_cart'][$keys]['required_quantity'] + $quantity;
                                $_SESSION['shopping_cart'][$keys]['prod_stock'] = $_SESSION['shopping_cart'][$keys]['prod_stock'] - $quantity;
                                $_SESSION['shopping_cart'][$keys]['total_cost'] = $_SESSION['shopping_cart'][$keys]['total_cost'] + $quantity * $prod_price;
                            }
                        }
                    }
                } else {
                    $item_array = array(
                        'id'                    =>     $id,
                        'prod_name'             =>     $prod_name,
                        'prod_price'            =>     $prod_price,
                        'prod_quantity'         =>     $prod_quantity,
                        'prod_stock'            =>    $prod_stock,
                        'required_quantity'     => $quantity,
                        'total_cost'            => $prod_price * $quantity
                    );
                    $_SESSION['shopping_cart'][0] = $item_array;
                }




                $cost_sum = 0;
                if (!empty($_SESSION['shopping_cart'])) {
                    foreach ($_SESSION['shopping_cart'] as $keys => $values) {
                ?>

                        <tr>
                            <td><?php echo $values['id'] ?></td>
                            <td><?php echo $values['prod_name'] ?></td>
                            <td><?php echo $values['prod_price'] ?></td>
                            <td><?php echo $values['prod_quantity'] ?></td>
                            <td><?php echo $values['prod_stock'] - $quantity ?></td>
                            <td><?php echo $values['required_quantity'] ?></td>
                            <td><?php echo $values['total_cost'] ?></td>
                        </tr>


                <?php

                        $cost_sum = $cost_sum + $values['total_cost'];
                    }
                }
                $_SESSION['total_cost'] = $cost_sum;

                $prod_num = 0;
                $prod_num = count($_SESSION['shopping_cart']);
                $_SESSION['prod_num'] = $prod_num;

                ?>
            </tbody>
        </table>




        <div class="row">
            <div style="margin: auto">
                <h4>Total Cost: <?php echo $cost_sum ?></h4>
                <h4>Product Number: <?php echo $prod_num ?></h4>
            </div>
        </div>

        <div style="text-align: center">
            <a href="bottom_right_frame.php?action=delete" class="btn btn-danger">Clear Cart</a>
            <!-- <a href="#" class="btn btn-info">Check Out</a> -->
            <?php if ($prod_num != 0) {
            ?>
                <form action="checkout.php" method="POST" style="display: inline-block">
                    <input type="submit" name="checkout" value="Check Out" class="btn btn-info">
                </form>
            <?php
            } ?>

        </div>

<?php
    }
}
?>

<?php
mysqli_close($connection);
?>
<?php include "footer.php" ?>