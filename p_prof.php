<!--appoNurse閲覧画面-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse[UsersProf]</title>
</head>

<body>
    <h1>genieNurse</h1>
    <?php
    session_start();
    include("functions.php");
    check_session_id();

    $u_id = $_POST['u_id'];

    $pdo = connect_to_db();

    // var_dump($_POST);
    // exit();

    $sql = 'SELECT * FROM patient_table WHERE u_id=:u_id';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);

    try {
        $status = $stmt->execute();
    } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $output = "";
    foreach ($result as $record) {
        //         $output .= "
        //             <tr class=''>
        //             <td class=''></td> 
        //             </tr> 
        //   ";
    }

    //年齢を計算する関数//////////////////////////////////
    $birthday = $record["birthday"];
    $today = date('Ymd');
    $age = floor(($today - $birthday) / 10000) . '歳';
    /////////////////////////////////////////////////////
    ?>

    <fieldset>
        <legend><?= $record["handlename"] ?></legend>
        <div class="label">
            <div class="age_box">
                <h6>年齢:</h6>
                <p><?= $age ?></p>
            </div>

            <div class="sex_box">
                <h6>性別:</h6>
                <p><?= $record["sex"] ?></p>
            </div>

            <div class="adl_box">
                <h6>ADL:</h6>
                <p><?= $record["adl"] ?></p>
            </div>

            <div class="mail_box">
                <h6>Mail</h6>
                <p><?= "<a href='mailto:{$record["mail"]}'><img src='img/mail.jpg'></a>" ?></p>
            </div>
        </div>
    </fieldset>
    <FORM>
        <INPUT type="button" value="戻る" onClick="history.back()">
    </FORM> <a href="n_logout.php">ログアウト</a>
</body>

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
        width: 350px;
        /* height: 600px; */
        border: solid black 5px;
        border-radius: 5px;
    }

    .label {
        background-color: white;
        margin: 5px;
        border-radius: 5px;
    }

    .age_box,
    .sex_box,
    .adl_box,
    .mail_box {
        display: flex;
        align-items: center;
        /* justify-content: center; */
    }


    .age_box h6,
    .sex_box h6,
    .adl_box h6,
    .mail_box h6 {
        font-size: 15px;
        margin: 10px;
        padding-left: 20px;
    }


    .age_box p,
    .sex_box p,
    .adl_box p,
    .mail_box p {
        font-size: 20px;
        margin: 10px;
    }

    img {
        width: 30px;
        height: 30px;
        margin: 5px;
    }
</style>
<!--css-->

</html>