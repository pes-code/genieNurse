<?php
session_start();
include("n_functions.php");
check_session_id();

// var_dump($_SESSION);
// exit();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <h1>genieNurse</h1>
    <form action="n_update.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>NurseEdit</legend>
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
                <input type="text" name="office_name" value="<?= $_SESSION["office_name"] ?>" placeholder="アラジン">
            </div>
            <div>
                <img src="<?= $_SESSION["face_img"] ?>" height=50px oncontextmenu='return false;'>
                <input type="file" name="face_img">
            </div>
            <div>
                <input type="text" name="link" value="<?= $_SESSION["link"] ?>" placeholder="URL">
            </div>
            <div>
                <input type="text" name="advance_license" value="<?= $_SESSION["advance_license"] ?>" placeholder="advance_license">
            </div>
            <div>
                <textarea rows="10" cols="50" name="appeal" placeholder="appeal"><?= $_SESSION["appeal"] ?></textarea>
            </div>
            <div>
                <input type="hidden" name="n_id" value="<?= $_SESSION["n_id"] ?>" readonly>
            </div>
            <div>
                <button>Edit</button>
            </div>
        </fieldset>
        <p><a href="index.html">Cancel</a></p>
    </form>
</body>
<!--css-->
<style>
    *,
    *:before,
    *:after {
        -webkit-box-sizing: inherit;
        box-sizing: inherit;
    }

    html {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        font-size: 50%;
    }


    body {
        background: -moz-linear-gradient(top, #FFC778, #FFF);
        background: -webkit-linear-gradient(top, #FFC778, #FFF);
        background: linear-gradient(to bottom, #FFC778, #FFF);
        background-repeat: no-repeat;

        display: flex;
        align-items: center;
        flex-direction: column;
    }
</style>
<!--css-->

</html>