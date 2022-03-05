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
    <title>genieNurse[Nurse Service Input]</title>
</head>

<body>
    <h1>genieNurse</h1>
    <form action="n_create_file.php" method="POST" enctype="multipart/form-data">

        <fieldset>
            <legend>
                <img src="<?= $_SESSION["face_img"] ?>" height=50px oncontextmenu='return false;'>
                <a href='n_prof.php'><?= $_SESSION['office_name'] ?></a>
            </legend>

            <!--css-->
            <style>
                img {
                    width: 50px;
                    height: 50px;
                    border-radius: 50%
                }
            </style>
            <!--css-->

            <!--<div><label>[advance]</label>
                <input type="text" name="advance_license" value="<?= $_SESSION["advance_license"] ?>" readonly>
            </div>-->
            <div><label>[comment]</label><br>
                <textarea rows="5" cols="30" name="comment" placeholder="例】病院に付き添います"></textarea>
            </div>
            <!--<div>
                item: <textarea rows="10" cols="50" name="item" placeholder="例】・吸引機 ・車いす ・介護用タクシー"></textarea>
                /////checkboxで選択できる、その他free欄も設置/////
            </div>-->

            <!--<div>
                time: <input type="date" name="time">
                /////複数の活動日を入力する/////
            </div>-->

            <div>
                <input type="hidden" name="n_id" value="<?= $_SESSION["n_id"] ?>" readonly>
                <input type="hidden" name="office_name" value="<?= $_SESSION["office_name"] ?>">
                <input type="hidden" name="link" value="<?= $_SESSION["link"] ?>" readonly>
                <input type="hidden" name="tel" value="<?= $_SESSION["tel"] ?>" readonly>
                <input type="hidden" name="mail" value="<?= $_SESSION["mail"] ?>" readonly>
            </div>

            <div>
                <button>submit</button>
            </div>
        </fieldset>
        <a href="service_read.php">ServiceRead</a><br>
        <a href="needs_browsing.php">UserNeeds</a><br>
        <a href="n_logout.php">Logout</a>

    </form>

</body>

<!--css-->
<style>
    body {
        background: -moz-linear-gradient(top, #FFC778, #FFF);
        background: -webkit-linear-gradient(top, #FFC778, #FFF);
        background: linear-gradient(to bottom, #FFC778, #FFF);
        background-repeat: no-repeat;

        display: flex;
        align-items: center;
        flex-direction: column;
    }


    /* body {
        background: -moz-linear-gradient(top, #FFF, #FFC778);
        background: -webkit-linear-gradient(top, #FFF, #FFC778);
        background: linear-gradient(to bottom, #FFF, #FFC778);
        background-repeat: no-repeat;
    } */
</style>
<!--css-->

</html>