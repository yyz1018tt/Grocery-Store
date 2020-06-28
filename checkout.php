<?php include "header.php" ?>
<?php session_start() ?>

<h2 style="text-align: center; margin-top: 2%">Check Out</h2>

<div class="container">
    <form action="mail.php">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Full Name</label>
                <input type="text" class="form-control" name="name" placeholder="Full Name">
            </div>
            <div class="form-group col-md-6">
                <label>Address</label>
                <input type="text" class="form-control" name="address" placeholder="Address">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Suburb</label>
                <input type="text" class="form-control" name="suburb" placeholder="Suburb">
            </div>
            <div class="form-group col-md-6">
                <label>State</label>
                <input type="text" class="form-control" name="state" placeholder="State">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Country</label>
                <input type="text" class="form-control" name="country" placeholder="Country">
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
        </div>

        <button type="submit" name="purchase" class="btn btn-primary">Purchase</button>
    </form>
</div>

<?php session_destroy() ?>

<?php include "footer.php" ?>