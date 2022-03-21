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
        <form action="p_entry_act.php" method="POST">
            <fieldset>
                <legend>利用者登録</legend>
                <dl>
                    <div class="entrysheet">
                        <div class="name_box" title="アナタのお名前を全角，フルネームでご記入ください。
    ※サイト内で表示される事はありませんので、他者に漏洩する心配はありません。">
                            <dt><label>名前</label></dt>
                            <dd><input class="name" type="text" name="name" placeholder="安良 仁"></dd>
                            <!-- <span class="word">全角，フルネームでお書きください</span> -->
                        </div>
                        <div title="クリックして、アナタの性別をお選びください。">
                            <dt><label>性別</label></dt>
                            <dd><select name="sex">
                                    <option>男</option>
                                    <option>女</option>
                                </select></dd>
                        </div>
                        <div title="アナタの生年月日を西暦，半角数字でご記入ください。
    【注】スペースや「/(ｽﾗｯｼｭ)」は不要です。
    【例】1955年1月15日生まれ→19550115">
                            <dt><label>生年月日</label></dt>
                            <dd><input type="text" name="birthday" placeholder="20220101"></dd>
                        </div>
                        <div title="アナタの住所をご記入ください。
    ※サイト内で表示される事はありませんので、他者に漏洩する心配はありません。">
                            <dt><label>住所</label></dt>
                            <dd><input type="text" name="address" placeholder="○○県□□市△△町×丁目××番地"></dd>
                        </div>
                        <div title="アナタの電話番号を半角数字でご記入ください。
    【注】スペースや「-(ﾊｲﾌﾝ)」は不要です。">
                            <dt><label>電話</label></dt>
                            <dd><input type="tel" name="tel" placeholder="09012345678"></dd>
                        </div>
                        <div title="アナタのメールアドレスを半角英数字でご記入ください。">
                            <dt><label>メール</label></dt>
                            <dd><input type="text" name="mail" placeholder="goshigoshi@gmail.com"></dd>
                        </div>
                        <div title="サイト内で使用するお好きな名前を設定してください。
    【注】サイト内ではこのアラジンネームが表示されます。">
                            <dt><label>アラジンネーム</label></dt>
                            <dd><input type="text" name="handlename" placeholder="アラジン"></dd>
                        </div>
                        <div title="お好きなパスワードを設定してください。
    【注】お忘れないようにご注意ください。">
                            <dt><label>パスワード</label></dt>
                            <dd><input type="text" name="pass" placeholder="半角英数字6文字以上"></dd>
                        </div>
                        <div class="adl">
                            <div title="［日常生活自立度］を参考にアナタの健康状態を選択してください。
    ※［日常生活自立度］をクリックしてください。">
                                <dt><label>生活自立度</label></dt>
                                <dd><select name="adl">
                                        <option>OO</option>
                                        <option>J1</option>
                                        <option>J2</option>
                                        <option>A1</option>
                                        <option>A2</option>
                                        <option>B1</option>
                                        <option>B2</option>
                                        <option>C1</option>
                                        <option>C2</option>
                                    </select></dd>
                            </div>
                            <div title="クリックすると日常生活自立度の詳細内容を確認できます。">
                                <a href="img/2022-03-05.png">［日常生活自立度］</a>
                            </div>
                        </div>
                </dl>
                <div class="login_button">
                    <button>登録</button>
                </div>
    </div>
    </fieldset>
    <p><a href="p_login.php">ログイン画面</a></p>
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
        height: 600px;
        border: solid black 5px;
        border-radius: 5px;
    }

    label {
        font-size: 10px;
    }

    input,
    select {
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

    .adl {
        padding-bottom: 10px;
    }

    .adl a {
        background-color: whitesmoke;
        text-decoration: none;
        color: black;
    }
</style>
<!--css-->

</html>