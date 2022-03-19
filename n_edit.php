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
    <div class="input_form">
        <form action="n_update.php" method="POST" enctype="multipart/form-data">

            <fieldset>
                <legend>NurseEntry</legend>
                <dl>
                    <div title="アナタのお名前を全角，フルネームでご記入ください。">
                        <dt><label>名前</label></dt>
                        <dd><input type="text" name="name" value="<?= $_SESSION["name"] ?>"></dd>
                    </div>
                    <div title="クリックして、アナタの性別をお選びください。">
                        <dt><label>性別</label></dt>
                        <dd><select name="sex" value="<?= $_SESSION["sex"] ?>">
                                <option>男</option>
                                <option>女</option>
                            </select></dd>
                    </div>
                    <div title="生年月日を西暦，半角数字でご記入ください。
    【注】スペースや「/(ｽﾗｯｼｭ)」は不要です。
    【例】1955年1月15日生まれ→19550115">
                        <dt><label>生年月日</label></dt>
                        <dd><input type="text" name="birthday" value="<?= $_SESSION["birthday"] ?>"></dd>
                    </div>
                    <div title="アナタの住所をご記入ください。
    ※サイト内で表示される事はありませんので、他者に漏洩する心配はありません。">
                        <dt><label>住所</label></dt>
                        <dd><input type="text" name="address" value="<?= $_SESSION["address"] ?>"></dd>
                    </div>
                    <div title="アナタの電話番号を半角数字でご記入ください。
    【注】スペースや「-(ﾊｲﾌﾝ)」は不要です。">
                        <dt><label>電話</label></dt>
                        <dd><input type="text" name="tel" value="<?= $_SESSION["tel"] ?>"></dd>
                    </div>
                    <div title="アナタのメールアドレスを半角英数字でご記入ください。">
                        <dt><label>メール</label></dt>
                        <dd><input type="text" name="mail" value="<?= $_SESSION["mail"] ?>"></dd>
                    </div>
                    <div title="お好きなパスワードを設定してください。
    【注】お忘れないようにご注意ください。">
                        <dt><label>パスワード</label></dt>
                        <dd><input type="text" name="pass" value="<?= $_SESSION["pass"] ?>"></dd>
                    </div>
                    <h6>身分証明書･看護師免許証の変更について</h6>
                    <p>原則身分証明書及び看護師免許証の変更はできません。万が一、重大な事情があって左記の変更が必要な場合は当社に直接お問い合わせください。</p>
                    <p>【genieNurse】</p>
                    <a href="tel:09082488255">090-0248-8255</a>
                    <p>(対応時間:9：00～17：00)</p>
            </fieldset>

            <fieldset>
                <legend>OfficeEntry</legend>
                <!---顔写真------------------------------------------------------------------->
                <fieldset class="office_img">
                    <legend>顔写真</legend>
                    <div class="face_img_box" title="アナタの顔写真を添付してください。
    ※サイト内で表示される写真となります。">

                        <dt>
                            <div class="office_box">
                                <img src="<?= $_SESSION["face_img"] ?>" height=50px oncontextmenu='return false;'>
                            </div>
                        </dt>
                        <dd><input type="file" name="face_img" accept="image/*" capture="camera" />
                        </dd>

                    </div>
                </fieldset>
                <dl>
                    <div title="サイト内で使用するお好きな名前を設定してください。
    【注】サイト内ではこのジーニーネームが表示されます。">
                        <dt><label>ジーニーネーム</label></dt>
                        <dd><input type="text" name="office_name" value="<?= $_SESSION["office_name"] ?>"></dd>
                    </div>

                    <div title="お持ちのWEBサイトなどがあればURLをご記入ください。">
                        <dt><label>リンク</label></dt>
                        <dd><input type="text" name="link" value="<?= $_SESSION["link"] ?>"></dd>
                    </div>

                    <div title="セールスコメントなど自由にご記入ください。">
                        <dt><label>フリーコメント</label></dt>
                        <dd><textarea rows="10" cols="50" name="appeal" value="<?= $_SESSION["appeal"] ?>"></textarea></dd>
                    </div>


                    <div title="看護師免許の他に関連する免許をお持ちの場合、自由にご記入ください。
    【例】認定看護師，専門看護師，学会認定士など">
                        <dt><label>その他保有資格</label></dt>
                        <dd><input type="text" name="advance_license" value="<?= $_SESSION["advance_license"] ?>"></dd>
                    </div>

                    <div class="login_button">
                        <button>編集</button>
                    </div>
            </fieldset>
            <p><a href="n_edit_login.php">キャンセル</a></p>
        </form>
    </div>
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

    /* .input_form {
        width: 30%;
    } */

    fieldset {
        width: 350px;
        /* height: 600px; */
        border: solid black 5px;
        border-radius: 5px;
    }

    input,
    select,
    textarea {
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

    .login_button {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 33px;
    }

    .office_img {
        width: 310px;
    }

    .face_img_box {
        display: flex;
    }

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

    /* .name {
        background-image: url(img/name.jpg);
    } */
</style>
<!--css-->

</html>