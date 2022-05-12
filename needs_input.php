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

            <dl>
                <div>
                    <dt><label>タイトル</label></dt>
                    <dd><input type="text" name="need_title" placeholder="例】入浴介助をして下さい">
                    </dd>
                </div>
                <div>
                    <dt><label>最大報酬</label></dt>
                    <dd><input type="text" name="reward" placeholder="例】5000円">
                    </dd>
                </div>
                <div>
                    <dt><label>詳細内容</label></dt>
                    <dd><textarea rows="30" cols="30" name="comment" placeholder="例】今週の火曜日に入浴介助してくださる方を探しています。女性の方でお願いします。"></textarea>
                    </dd>
                </div>
                <div>
                    <dt><label>日時</label></dt>
                    <dd><input type="date" name="deadline"></dd>
                </div>
                <div>
                    <dt><label>カテゴリー</label></dt>
                    <dd> <select name="category">
                            <option>---</option>
                            <option>日常生活介助</option>
                            <option>外泊支援</option>
                            <option>外出支援</option>
                            <option>入院支援</option>
                            <option>受診支援</option>
                            <option>リハビリ</option>
                            <option>服薬管理</option>
                            <option>見守り支援</option>
                            <option>健康相談</option>
                            <option>その他</option>
                        </select></dd>
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

                <div class="login_button">
                    <button>投稿</button>
                </div>
        </fieldset>
        <a href="needs_read.php">投稿内容確認</a><br>
        <a href="service_browsing.php">サービス投稿一覧</a><br>
        <a href="p_logout.php">ログアウト</a><br>
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