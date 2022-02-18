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
    <form action="n_update.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>NurseEdit</legend>
            <div>
                <input type="text" name="n_id" value="<?= $_SESSION["n_id"] ?>" readonly>
            </div>

            <div>
                <input type="text" name="name" value="<?= $_SESSION["name"] ?>" readonly>
            </div>
            <div>
                <select name="sex" value="<?= $_SESSION["sex"] ?>" readonly>
                    <option>Man</option>
                    <option>Woman</option>
                </select>
            </div>
            <div>
                <input type="date" name="birthday" value="<?= $_SESSION["birthday"] ?>" readonly>
            </div>
            <div>
                <input type="text" name="address" value="<?= $_SESSION["address"] ?>" readonly>
            </div>
            <div>
                <input type="text" name="tel" value="<?= $_SESSION["tel"] ?>" readonly>
            </div>
            <div>
                <input type="text" name="mail" value="<?= $_SESSION["mail"] ?>" readonly>
            </div>
            <div>
                <input type="text" name="pass" value="<?= $_SESSION["pass"] ?>" readonly>
            </div>
            <div>
                <input type="text" name="office_name" value="<?= $_SESSION["office_name"] ?>" readonly>
            </div>
            <div>
                <textarea rows="10" cols="50" name="appeal" readonly><?= $_SESSION["appeal"] ?></textarea>
            </div>
            <div>
                <input type="text" name="link" value="<?= $_SESSION["link"] ?>" readonly>
            </div>
            <div>
                <input type="text" name="nurse_number" value="<?= $_SESSION["nurse_number"] ?>" readonly>
            </div>
            <div>
                <input type="text" name="advance_license" value="<?= $_SESSION["advance_license"] ?>" readonly>
            </div>



            <div>
                <img src="<?= $_SESSION["id_f_img"] ?>" height=50px oncontextmenu='return false;'>
            </div>
            <div>
                <img src="<?= $_SESSION["id_b_img"] ?>" height=50px oncontextmenu='return false;'>
            </div>
            <div>
                <img src="<?= $_SESSION["face_img"] ?>" height=50px oncontextmenu='return false;'>
            </div>
            <div>
                <img src="<?= $_SESSION["license_img"] ?>" height=50px oncontextmenu='return false;'>
            </div>


            <!--
    <div>
    <button>Edit</button>
    </div>
    -->

        </fieldset>
        <p><a href="index.html">Entrance</a></p>
    </form>
</body>