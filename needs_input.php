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
    <title>genieNurse [Users Needs Input]</title>
</head>

<body>
    <h1>genieNurse</h1>
    <form action="create_file.php" method="POST">
        <!--↑画像をUPする場合はenctype="multipart/form-data"を入れる-->
        <fieldset>
            <legend><a href="p_edit_login.php"><?= $_SESSION["handlename"] ?></a></legend>

            <div><label>[title]</label><br>
                <input type="text" name="need_title" placeholder="例】入浴介助をして下さい">
            </div>

            <div><label>[comment]</label><br>
                <textarea rows="10" cols="50" name="comment" placeholder="例】今週の火曜日に入浴介助してくださる方を探しています。女性の方でお願いします。"></textarea>
            </div>
            <div><label>[reward]</label><br>
                <input type="text" name="reward" placeholder="例】5000円">
            </div>
            <div><label>[deadline]</label><br>
                <input type="date" name="deadline">
            </div>


            <div class="hidden_box">
                <input type="hidden" name="u_id" value="<?= $_SESSION["u_id"] ?>" readonly>
                <input type="hidden" name="name" value="<?= $_SESSION["name"] ?>" readonly>
                <input type="hidden" name="handlename" value="<?= $_SESSION["handlename"] ?>" readonly>
                <input type="hidden" name="sex" value="<?= $_SESSION["sex"] ?>" readonly>
                <input type="hidden" name="mail" value="<?= $_SESSION["mail"] ?>" readonly>
                <input type="hidden" name="birthday" value="<?= $_SESSION["birthday"] ?>" readonly>
                <!--【案】将来的にline実装-->
            </div>

            <div>
                <button>submit</button>
            </div>
        </fieldset>
        <a href="needs_read.php">UserNeeds</a><br>
        <a href="service_browsing.php">NursingService</a><br>
        <a href="p_logout.php">Logout</a><br>
    </form>

</body>


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