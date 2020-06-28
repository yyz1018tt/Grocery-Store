<?php session_start() ?>
<?php include "header.php" ?>

<?php
if (isset($_REQUEST['purchase'])) {
    $name = $_REQUEST['name'];
    $address = $_REQUEST['address'];
    $suburb = $_REQUEST['suburb'];
    $state = $_REQUEST['state'];
    $country = $_REQUEST['country'];
    $email = $_REQUEST['email'];


    $to = $email;

    $subject = "You have purchased new items from online grocery store";

    $message = "<html><head><title>HTML email</title></head><body><p>Your contact details are:</p><table><tr><td>Name:</td><td>$name </td></tr><tr><td>Address:</td><td>$address</td></tr><tr><td>Suburb:</td><td>$suburb</td></tr><tr><td>State:</td><td>$state</td></tr><tr><td>Country:</td><td>$country</td></tr><tr><td>Email:</td><td>$email</td></tr></table></body></html>";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset-UTF-8" . "\r\n";

    $headers .= 'From: Yuze.Yang@student.uts.edu.au' . "\r\n" .
        'Reply-To: Yuze.Yang@student.uts.edu.au' . "\r\n";

    mail($to, $subject, $message, $headers);
}
?>

<h3>Thank you for shopping, please check your email about the shopping details</h3>

<?php include "footer.php" ?>