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
                <a href='n_edit_login.php'><?= $_SESSION['office_name'] ?></a>
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

            <div><label>[title]</label>
                <input type="text" name="title" placeholder="「～ます」といった表現でシンプルに入力してください。">
            </div>
            <div><label>[reward]</label>
                <input type="text" name="reward" placeholder="最低賃金をご入力ください。">
            </div>
            <div><label>[comment]</label><br>
                <textarea rows="5" cols="30" name="comment" placeholder="補足情報を自由に記載してください。"></textarea>
            </div>

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
        background-color: #FFCC99;
        background-repeat: no-repeat;

        display: flex;
        align-items: center;
        flex-direction: column;
    }

    fieldset {
        padding: 20px;
        border: 4px solid;
        border-color: black;
        border-radius: 1.3rem;
    }

    input {
        font-size: 0.3rem;
        font-weight: 700;
        line-height: 0.3;
        position: relative;
        padding: 1rem 4rem;
        cursor: pointer;
        text-align: center;
        letter-spacing: 0.5em;
        color: #212529;
        border-radius: 0.5rem;
        margin: 5px;
        border: 2px solid;
        border-color: black;
        width: 200px;
    }


    textarea {
        font-size: 0.3rem;
        font-weight: 700;
        position: relative;
        padding: 1rem 4rem;
        cursor: pointer;
        text-align: center;
        letter-spacing: 0.5em;
        color: #212529;
        border-radius: 0.5rem;
        margin: 5px;
        border: 2px solid;
        border-color: black;
        width: 200px;
    }
</style>
<!--css-->

</html>