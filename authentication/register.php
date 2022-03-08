<?php
require_once ('includes/config.php');
include('includes/classes/Constants.php');
include('includes/classes/Account.php');
$account = new Account($db_connection);
include('includes/handlers/register-handler.php');

function getPreviousValue($inputName)
{
    if (isset($_POST[$inputName])) {
        echo $_POST[$inputName];
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <title>Register new account to Bee Music!</title>
</head>
<body>

<div id="registerContainer">
    <form id="registerForm" action="register.php" method=POST>
        <h2>Let's create new account!</h2>
        <p>
            <?php $account->getErrors(Constants::$userNameLimit); ?>
            <label for="registerUserName">Username</label>
            <input id="registerUserName" name="registerUserName" type="text"
                   value="<?php getPreviousValue('registerUserName') ?>" placeholder="e.g. vgiabao2000" required>
        </p>
        <p>
            <?php $account->getErrors(Constants::$fullNameLimit); ?>
            <label for="userFullName">User Full Name</label>
            <input id="userFullName" value="<?php getPreviousValue('userFullName') ?>" name="userFullName" type="text"
                   placeholder="Vo Gia Bao" required>
        </p>
        <p>
            <label for="phone">Phone Number</label>
            <input id="phone" name="phone" value="<?php getPreviousValue('phone') ?>" type="text"
                   placeholder="0707738111">
        </p>
        <p>
            <?php $account->getErrors(Constants::$emailInvalid); ?>

            <label for="email">Email Address</label>
            <input id="email" name="email" value="<?php getPreviousValue('email') ?>" type="email"
                   placeholder="example@email.com" required>
        </p>

        <p>
            <?php $account->getErrors(Constants::$passwordLimit); ?>
            <label for="registerPassword">Password</label>
            <input id="registerPassword" value="<?php getPreviousValue('registerPassword') ?>" name="registerPassword"
                   type="password" required>
        </p>
        <p>
            <?php $account->getErrors(Constants::$passwordsDoNotMatch) ?>
            <label for="confirmPassword">Password Confirmation</label>
            <input id="confirmPassword" value="<?php getPreviousValue('confirmPassword') ?>" name="confirmPassword"
                   type="password" required>
        </p>

        <button type="submit" id="registerBtn" name="registerBtn">Register</button>
    </form>
</div>

</body>
</html>