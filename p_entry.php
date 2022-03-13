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
                <legend>UsersEntry</legend>
                <div class="entrysheet">
                    <div class="name_box" title="アナタのお名前を全角，フルネームでご記入ください。
    ※サイト内で表示される事はありませんので、他者に漏洩する心配はありません。">
                        <input class="name" type="text" name="name" placeholder="安良 仁">
                        <!-- <span class="word">全角，フルネームでお書きください</span> -->
                    </div>
                    <div title="クリックして、アナタの性別をお選びください。">
                        <select name="sex">
                            <option>男</option>
                            <option>女</option>
                        </select>
                    </div>
                    <div title="アナタの生年月日を西暦，半角数字でご記入ください。
    【注】スペースや「/(ｽﾗｯｼｭ)」は不要です。
    【例】1955年1月15日生まれ→19550115">
                        <input type="text" name="birthday" placeholder="20220101">
                    </div>
                    <div title="アナタの住所をご記入ください。
    ※サイト内で表示される事はありませんので、他者に漏洩する心配はありません。">
                        <input type="text" name="address" placeholder="○○県□□市△△町×丁目××番地">
                    </div>
                    <div title="アナタの電話番号を半角数字でご記入ください。
    【注】スペースや「-(ﾊｲﾌﾝ)」は不要です。">
                        <input type="tel" name="tel" placeholder="09012345678">
                    </div>
                    <div title="アナタのメールアドレスを半角英数字でご記入ください。">
                        <input type="text" name="mail" placeholder="goshigoshi@gmail.com">
                    </div>
                    <div title="お好きなハンドルネームを設定してください。
    【注】サイト内ではこのハンドルネームが表示されます。">
                        <input type="text" name="handlename" placeholder="アラジン">
                    </div>
                    <div title="お好きなパスワードを設定してください。
    【注】お忘れないようにご注意ください。">
                        <input type="text" name="pass" placeholder="半角英数字6文字以上">
                    </div>
                    <div>
                        <div title="［日常生活自立度］を参考にアナタの健康状態を選択してください。
    ※［日常生活自立度］をクリックしてください。">
                            <select name="adl">
                                <option>OO</option>
                                <option>J1</option>
                                <option>J2</option>
                                <option>A1</option>
                                <option>A2</option>
                                <option>B1</option>
                                <option>B2</option>
                                <option>C1</option>
                                <option>C2</option>
                            </select>
                        </div>
                        <div title="クリックすると日常生活自立度の詳細内容を確認できます。">
                            <a href="img/2022-03-05.png">［日常生活自立度］</a>
                        </div>
                    </div>
                    <div>
                        <button>Entry</button>
                    </div>
                </div>
            </fieldset>
            <p><a href="p_login.php">UsersLogin</a></p>
            <!-- <p><a href="n_entry.php">NurseEntry</a></p> -->
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

    .input_form {
        width: 30%;
    }

    fieldset {
        padding: 20px;
        border: 4px solid;
        border-color: black;
        border-radius: 1.3rem;
    }

    input,
    select {
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
        width: 100%;

    }



    /* .name {
        background-image: url(img/name.jpg);
    } */
</style>
<!--css-->

</html>