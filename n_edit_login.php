<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <form action="n_edit_login_act.php" method="POST">
        <fieldset>
            <legend>NurseEdit</legend>
            <div>
                <input type="text" name="office_name" placeholder="office_name">
            </div>
            <div>
                <input type="text" name="mail" placeholder="mail">
            </div>
            <div>
                <input type="text" name="pass" placeholder="pass">
            </div>
            <div>
                <button>Edit</button>
            </div>
        </fieldset>
        <p><a href="p_login.php">UserLogin</a></p>
        <p><a href="n_entry.php">NurseEntry</a></p>

    </form>

</body>

</html>