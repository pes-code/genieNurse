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
        <form action="n_entry_act.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>看護師登録</legend>
                <dl>
                    <div title="アナタのお名前を全角，フルネームでご記入ください。">
                        <dt><label>名前</label></dt>
                        <dd><input type="text" name="name" placeholder="name"></dd>
                    </div>
                    <div title="クリックして、アナタの性別をお選びください。">
                        <dt><label>性別</label></dt>
                        <dd><select name="sex" placeholder="sex">
                                <option>男</option>
                                <option>女</option>
                            </select></dd>
                    </div>
                    <div title="生年月日を西暦，半角数字でご記入ください。
    【注】スペースや「/(ｽﾗｯｼｭ)」は不要です。
    【例】1955年1月15日生まれ→19550115">
                        <dt><label>生年月日</label></dt>
                        <dd><input type="text" name="birthday" placeholder="birthday"></dd>
                    </div>
                    <div title="アナタの住所をご記入ください。
    ※サイト内で表示される事はありませんので、他者に漏洩する心配はありません。">
                        <dt><label>住所</label></dt>
                        <dd><input type="text" name="address" placeholder="address"></dd>
                    </div>
                    <div title="アナタの電話番号を半角数字でご記入ください。
    【注】スペースや「-(ﾊｲﾌﾝ)」は不要です。">
                        <dt><label>電話</label></dt>
                        <dd><input type="text" name="tel" placeholder="tel"></dd>
                    </div>
                    <div title="アナタのメールアドレスを半角英数字でご記入ください。">
                        <dt><label>メール</label></dt>
                        <dd><input type="text" name="mail" placeholder="mail"></dd>
                    </div>
                    <div title="お好きなパスワードを設定してください。
    【注】お忘れないようにご注意ください。">
                        <dt><label>パスワード</label></dt>
                        <dd><input type="text" name="pass" placeholder="pass"></dd>
                    </div>

                    <!--身分証明------------------------------------------------------------------>
                    <div title="運転免許証やマイナンバーカードなどの身分がわかる証明書の写真を添付してください。
    【注】見切れや影などにご注意の上、免許証の内容が全て把握できる写真を添付してください。
    【注】必ず表と裏の両方を添付してください。">
                        <h6>身分証明写し(表面)<br>
                            <input type="file" name="id_f_img" accept="image/*" capture="camera" />
                        </h6>
                        <h6>身分証明写し(裏面)<br>
                            <input type="file" name="id_b_img" accept="image/*" capture="camera" />
                        </h6>
                    </div>

            </fieldset>

            <fieldset>
                <legend>OfficeEntry</legend>
                <!---顔写真------------------------------------------------------------------->
                <div title="アナタの顔写真を添付してください。
    ※サイト内で表示される写真となります。">
                    <h6>顔写真<br>
                        <input type="file" name="face_img" accept="image/*" capture="camera" />
                    </h6>
                </div>
                <dl>
                    <div title="サイト内で使用するお好きな名前を設定してください。
    【注】サイト内ではこのジーニーネームが表示されます。">
                        <dt><label>ジーニーネーム</label></dt>
                        <dd><input type="text" name="office_name" placeholder="office_name"></dd>
                    </div>

                    <div title="お持ちのWEBサイトなどがあればURLをご記入ください。">
                        <dt><label>リンク</label></dt>
                        <dd><input type="text" name="link" placeholder="HP_URL"></dd>
                    </div>

                    <div title="セールスコメントなど自由にご記入ください。">
                        <dt><label>フリーコメント</label></dt>
                        <dd><textarea rows="10" cols="50" name="appeal" placeholder="appeal"></textarea></dd>
                    </div>

                    <div title="看護師免許の登録番号をご記入ください。
    【注】お間違いのないようにお願いします。">
                        <dt><label>免許登録番号</label></dt>
                        <dd><input type="text" name="nurse_number" placeholder="license_number"></dd>
                    </div>

                    <!--看護師免許---------------------------------------------------------------->
                    <div title="看護師免許の全体写真を撮影して添付してください。
    【注】見切れや影などにご注意の上、免許証の内容が全て把握できる写真を添付してください。">
                        <h6>看護師免許写し<br>
                            <input type="file" name="license_img" accept="image/*" capture="camera" />
                        </h6>
                    </div>

                    <div title="看護師免許の他に関連する免許をお持ちの場合、自由にご記入ください。
    【例】認定看護師，専門看護師，学会認定士など">
                        <dt><label>その他保有資格</label></dt>
                        <dd><input type="text" name="advance_license" placeholder="advance_license"></dd>
                    </div>

                    <div class="login_button">
                        <button>登録</button>
                    </div>
            </fieldset>

            <!-- <p><a href="p_entry.php">UsersEntry</a></p> -->
            <p><a href="n_login.php">ログイン画面</a></p>
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
</style>
<!--css-->

</html>