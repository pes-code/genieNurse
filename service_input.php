<?php
session_start();
include("n_functions.php");
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
    <form action="n_create_file.php" method="POST" enctype="multipart/form-data">

        <fieldset>
            <legend>[Nurse]Service Input </legend>
            <div><label>[office]</label>
                <input type="text" name="office_name" value="<?= $_SESSION["office_name"] ?>" readonly>
            </div>
            <!--<div><label>[advance]</label>
                <input type="text" name="advance_license" value="<?= $_SESSION["advance_license"] ?>" readonly>
            </div>-->
            <div><label>[comment]</label><br>
                <textarea rows="5" cols="30" name="comment" placeholder="例】病院に付き添います"></textarea>
            </div>
            <!--<div>
                item: <textarea rows="10" cols="50" name="item" placeholder="例】・吸引機 ・車いす ・介護用タクシー"></textarea>
                /////checkboxで選択できる、その他free欄も設置/////
            </div>-->

            <!--<div>
                time: <input type="date" name="time">
                /////複数の活動日を入力する/////
            </div>-->

            <div>
                <input type="hidden" name="n_id" value="<?= $_SESSION["n_id"] ?>" readonly>
                <input type="hidden" name="link" value="<?= $_SESSION["link"] ?>" readonly>
                <input type="hidden" name="tel" value="<?= $_SESSION["tel"] ?>" readonly>
                <input type="hidden" name="mail" value="<?= $_SESSION["mail"] ?>" readonly>
            </div>

            <!--<div>
                <input type="file" name="upfile" accept="video/*" capture="camera" />
            </div>-->

            <div>
                <button>submit</button>
            </div>
        </fieldset>
        <a href="service_read.php">ServiceRead</a><br>
        <a href="needs_browsing.php">UserNeeds</a><br>
        <a href="n_logout.php">Logout</a>

    </form>

</body>

</html>