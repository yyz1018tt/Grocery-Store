<?php include "header.php" ?>
<?php include "db.php" ?>
<div class="row no-gutters">
    <div class="col-lg-6 leftside">
        <nav class="navbar navbar-expand-lg navbar-light pt-3 justify-content-center" style="background: transparent">
            <h1>Grocery Store</h1>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div>
                    <ul class="nav justify-content-center">
                        <?php include "frozen_food.php" ?>

                        <?php include "fresh_food.php" ?>

                        <?php include "beverages.php" ?>

                        <?php include "home_health.php" ?>

                        <?php include "pet_food.php" ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<?php mysqli_close($connection) ?>

<?php include "footer.php" ?>