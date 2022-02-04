<?php
session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <form action="create_file.php" method="POST">
        <!--↑画像をUPする場合はenctype="multipart/form-data"を入れる-->
        <fieldset>
            <legend>[Users] Needs Input</legend>
            <div><label>[handlename]</label>
                <input type="text" name="handlename" value="<?= $_SESSION["handlename"] ?>" readonly>
                <input type="text" name="sex" value="<?= $_SESSION["sex"] ?>" readonly>
            </div>
            <div><label>[title]</label>
                <input type="text" name="need_title" placeholder="例】入浴介助をして下さい">
            </div>
            <div><label>[comment]</label><br>
                <textarea rows="10" cols="50" name="comment" placeholder="例】今週の火曜日に入浴介助してくださる方を探しています。女性の方でお願いします。"></textarea>
            </div>
            <div><label>[reward]</label>
                <input type="text" name="reward" placeholder="例】5000円">
            </div>
            <div><label>[deadline]</label>
                <input type="date" name="deadline">
            </div>


            <div class="hidden_box">
                <input type="hidden" name="mail" value="<?= $_SESSION["mail"] ?>" readonly>
                <!--【案】将来的にline実装-->
                <!--<input type="hidden" name="name" value="<?= $_SESSION["name"] ?>" readonly>-->
            </div>
            <!-- <div>
                <input type="file" name="upfile" accept="video/*" capture="camera" />
            </div> -->
            <div>
                <button>submit</button>
            </div>
        </fieldset>
        <a href="needs_read.php">UserNeeds</a><br>
        <a href="service_browsing.php">NursingService</a><br>
        <a href="p_logout.php">Logout</a><br>
    </form>

</body>

</html>