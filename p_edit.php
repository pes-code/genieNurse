<?php
session_start();
include("functions.php");
check_session_id();

//var_dump($_SESSION);
//exit();

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
    <form action="p_update.php" method="POST">
        <fieldset>
            <legend>UsersEntry</legend>
            <div>
                <input type="text" name="name" value="<?= $_SESSION["name"] ?>">
            </div>
            <div>
                <select name="sex" value="<?= $_SESSION["sex"] ?>">
                    <option>男</option>
                    <option>女</option>
                </select>
            </div>
            <div>
                <input type="text" name="birthday" value="<?= $_SESSION["birthday"] ?>">
            </div>
            <div>
                <input type="text" name="address" value="<?= $_SESSION["address"] ?>">
            </div>
            <div>
                <input type="text" name="tel" value="<?= $_SESSION["tel"] ?>">
            </div>
            <div>
                <input type="text" name="mail" value="<?= $_SESSION["mail"] ?>">
            </div>
            <div>
                <input type="text" name="pass" value="<?= $_SESSION["pass"] ?>" placeholder="半角英数字6文字以上">
            </div>
            <div>
                <input type="text" name="handlename" value="<?= $_SESSION["handlename"] ?>" placeholder="アラジン">
            </div>
            <div><label>日常生活自立度</label>
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
                <input type="hidden" name="u_id" value="<?= $_SESSION["u_id"] ?>" readonly>
            </div>
            <div>
                <button>Edit</button>
            </div>
        </fieldset>
        <p><a href="index.html">TOP</a></p>
    </form>
</body>

<!--css-->
<style>
    body {
        background: -moz-linear-gradient(top, #FFC778, #FFF);
        background: -webkit-linear-gradient(top, #FFC778, #FFF);
        background: linear-gradient(to bottom, #FFC778, #FFF);
        background-repeat: no-repeat;

        display: flex;
        align-items: center;
        flex-direction: column;
    }


    /* body {
        background: -moz-linear-gradient(top, #FFF, #FFC778);
        background: -webkit-linear-gradient(top, #FFF, #FFC778);
        background: linear-gradient(to bottom, #FFF, #FFC778);
        background-repeat: no-repeat;
    } */
</style>
<!--css-->

</html>