<?php
session_start();
include("functions.php");
check_session_id();

//var_dump($_SESSION);
//exit();

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <form action="p_update.php" method="POST">
        <fieldset>
            <legend>UsersEntry</legend>
            <div>
                <input type="text" name="name" value="<?= $_SESSION["name"] ?>" placeholder="安良 仁">
            </div>
            <div>
                <select name="sex" value="<?= $_SESSION["sex"] ?>" placeholder="sex">
                    <option>Man</option>
                    <option>Woman</option>
                </select>
            </div>
            <div>
                <input type="date" name="birthday" value="<?= $_SESSION["birthday"] ?>">
            </div>
            <div>
                <input type="text" name="address" value="<?= $_SESSION["address"] ?>" placeholder="address">
            </div>
            <div>
                <input type="text" name="tel" value="<?= $_SESSION["tel"] ?>" placeholder="tel">
            </div>
            <div>
                <input type="text" name="mail" value="<?= $_SESSION["mail"] ?>" placeholder="lampgoshigoshi@gmail.com">
            </div>
            <div>
                <input type="text" name="pass" value="<?= $_SESSION["pass"] ?>" placeholder="半角英数字6文字以上">
            </div>
            <div>
                <input type="text" name="handlename" value="<?= $_SESSION["handlename"] ?>" placeholder="アラジン">
            </div>
            <div>
                <input type="hidden" name="u_id" value="<?= $_SESSION["u_id"] ?>" readonly>
            </div>
            <div>
                <button>Edit</button>
            </div>
        </fieldset>
        <p><a href="index.html">Cancel</a></p>
    </form>
</body>