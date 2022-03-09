<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <h1>genieNurse</h1>
    <form action="p_entry_act.php" method="POST">
        <fieldset>
            <legend>UsersEntry</legend>
            <div>
                <input type="text" name="name" placeholder="安良 仁">
            </div>
            <div>
                <select name="sex">
                    <option>男</option>
                    <option>女</option>
                </select>
            </div>
            <div>
                <input type="text" name="birthday" placeholder="20220101">
            </div>
            <div>
                <input type="text" name="address" placeholder="○○県□□市△△町×丁目××番地">
            </div>
            <div>
                <input type="tel" name="tel" placeholder="09012345678">
            </div>
            <div>
                <input type="text" name="mail" placeholder="lampgoshigoshi@gmail.com">
            </div>
            <div>
                <input type="text" name="pass" placeholder="半角英数字6文字以上">
            </div>
            <div>
                <input type="text" name="handlename" placeholder="アラジン">
            </div>
            <div>
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
                <a href="img/2022-03-05.png">日常生活自立度</a>
            </div>
            <div>
                <button>Entry</button>
            </div>
        </fieldset>
        <p><a href="p_login.php">UsersLogin</a></p>
        <!-- <p><a href="n_entry.php">NurseEntry</a></p> -->
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
        background: -moz-linear-gradient(top, #FFC778, #FFF);
        background: -webkit-linear-gradient(top, #FFC778, #FFF);
        background: linear-gradient(to bottom, #FFC778, #FFF);
        background-repeat: no-repeat;

        display: flex;
        align-items: center;
        flex-direction: column;
    }
</style>
<!--css-->

</html>