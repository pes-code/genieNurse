<?php
session_start();
include("functions.php");
check_session_id();
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <form action="review_act.php" method="POST">
        <fieldset>
            <legend>UsersLogin</legend>
            <div>
                <input type="text" name="name" placeholder="name">
            </div>
            <div>
                <input type="text" name="mail" placeholder="mail">
            </div>
            <div>
                <input type="text" name="pass" placeholder="pass">
            </div>
            <div>
                <button>Login</button>
            </div>
        </fieldset>
        <p><a href="review.php">Review</a></p>
        <p><a href="review_input.php">Review Input</a></p>
        <p><a href="n_login.php">NurseLogin</a></p>
    </form>

</body>

</html>