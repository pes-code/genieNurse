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
                <div class="office_box">
                    <img src="<?= $_SESSION["face_img"] ?>" height=50px oncontextmenu='return false;'>
                    <a href='n_edit_login.php'><?= $_SESSION['office_name'] ?></a>
                </div>
            </legend>

            <!--css-->
            <style>
                .office_box {
                    display: flex;
                    align-items: center;
                }

                img {
                    margin: 5px 5px 0 5px;
                    width: 40px;
                    height: 40px;
                    border-radius: 5px
                }

                .office_box a {
                    margin: 10px;
                    text-decoration: none;
                    color: #000;
                    font-size: 10px;
                }
            </style>
            <!--css-->
            <dl>
                <div>
                    <dt><label>タイトル</label></dt>
                    <dd><input type="text" name="title" placeholder="「～ます」といった表現でシンプルに入力してください。"></dd>
                </div>
                <div>
                    <dt><label>最低報酬</label></dt>
                    <dd><input type="text" name="reward" placeholder="最低欲しい報酬をご入力ください。"></dd>
                </div>
                <div>
                    <dt><label>詳細内容</label></dt>
                    <dd><textarea rows="30" cols="30" name="comment" placeholder="補足情報を自由に記載してください。"></textarea></dd>
                </div>
            </dl>

            <div>
                <input type="hidden" name="n_id" value="<?= $_SESSION["n_id"] ?>" readonly>
                <input type="hidden" name="office_name" value="<?= $_SESSION["office_name"] ?>">
                <input type="hidden" name="link" value="<?= $_SESSION["link"] ?>" readonly>
                <input type="hidden" name="tel" value="<?= $_SESSION["tel"] ?>" readonly>
                <input type="hidden" name="mail" value="<?= $_SESSION["mail"] ?>" readonly>
            </div>

            <div class="login_button">
                <button>投稿</button>
            </div>
        </fieldset>
        <a href="service_read.php">投稿内容確認</a><br>
        <a href="needs_browsing.php">ニーズ投稿一覧</a><br>
        <a href="n_logout.php">ログアウト</a>
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



    form dl dt {
        width: 70px;
        padding: 20px 0;
        margin-left: 20px;
        float: left;
        clear: both;
    }

    form dl dd {
        padding: 10px 0 5px 5px;
    }


    fieldset {
        width: 350px;
        /* height: 600px; */
        border: solid black 5px;
        border-radius: 5px;
    }


    label {
        font-size: 10px;
    }

    input {
        font-size: 0.3rem;
        font-weight: 700;
        line-height: 0.3;
        position: relative;
        padding: 7px 10px;
        cursor: pointer;
        /* text-align: center; */
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
        /* text-align: center; */
        letter-spacing: 0.5em;
        color: #212529;
        border-radius: 0.5rem;
        margin: 5px;
        border: 2px solid;
        border-color: black;
        width: 200px;
    }

    .login_button {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 33px;
    }
</style>
<!--css-->

</html>