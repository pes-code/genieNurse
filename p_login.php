<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <h1>genieNurse</h1>
    <form action="p_login_act.php" method="POST">
        <fieldset>
            <legend>UsersLogin</legend>
            <div>
                <input type="text" name="name" placeholder="name">
            </div>
            <div>
                <input type="text" name="mail" placeholder="mail">
            </div>
            <div>
                <input type="text" name="pass" placeholder="pass">
            </div>
            <div>
                <button>Login</button>
            </div>
        </fieldset>
        <p><a href="p_entry.php">UsersEntry</a></p>
        <p><a href="p_edit_login.php">UsersEdit</a></p>
        <!-- <p><a href="n_login.php">NurseLogin</a></p> -->
        <p><a href="index.html">Top</a></p>

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