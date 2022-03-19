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
        <form action="n_edit_login_act.php" method="POST">
            <fieldset>
                <legend>NurseEdit</legend>
                <dl>
                    <div>
                        <dt><label>メールアドレス</label></dt>
                        <dd><input type="text" name="mail" placeholder="mail"></dd>
                    </div>
                    <div>
                        <dt><label>パスワード</label></dt>
                        <dd><input type="text" name="pass" placeholder="pass"></dd>
                    </div>
                    <div class="login_button">
                        <button>編集開始</button>
                    </div>
            </fieldset>
            <p><a href="n_entry.php">看護師登録</a></p>
            <p><a href="index.html">トップ</a></p>
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

    .login_button {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 33px;
    }

    /* .name {
        background-image: url(img/name.jpg);
    } */
</style>
<!--css-->


</html>