<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <form action="p_entry_act.php" method="POST">
        <fieldset>
            <legend>UsersEntry</legend>
            <div>
                <input type="text" name="name" placeholder="安良 仁">
            </div>
            <div>
                <select name="sex" placeholder="sex">
                    <option>Man</option>
                    <option>Woman</option>
                </select>
            </div>
            <div>
                <input type="date" name="birthday">
            </div>
            <div>
                <input type="text" name="address" placeholder="address">
            </div>
            <div>
                <input type="text" name="tel" placeholder="tel">
            </div>
            <div>
                <input type="text" name="mail" placeholder="lampgoshigoshi@gmail.com">
            </div>
            <div>
                <input type="text" name="pass" placeholder="半角英数字6文字">
            </div>
            <div>
                <input type="text" name="handlename" placeholder="アラジン">
            </div>

            <div>
                <button>Entry</button>
            </div>
        </fieldset>
        <p><a href="p_login.php">UsersLogin</a></p>
        <p><a href="n_entry.php">NurseEntry</a></p>
    </form>
</body>

</html>