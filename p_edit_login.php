<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <h1>genieNurse</h1>
    <form action="p_edit_login_act.php" method="POST">
        <fieldset>
            <legend>UsersEdit</legend>
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
                <button>edit</button>
            </div>
        </fieldset>
        <p><a href="p_login.php">UsersLogin</a></p>
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

    fieldset {
        padding: 20px;
        border: 4px solid;
        border-color: black;
        border-radius: 1.3rem;
    }

    input {
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
        width: 200px;
    }
</style>
<!--css-->

</html>