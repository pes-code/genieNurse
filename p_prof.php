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
        <table>
            <thead>
            </thead>
            <tbody>
                <label>年齢</label>
                <?= $age ?><br>
                <label>性別</label>
                <?= $record["sex"] ?><br>
                <label>ADL</label>
                <?= $record["adl"] ?><br>
                <label>Mail</label>
                <?= "<a href='mailto:{$record["mail"]}'>📧</a>" ?>
            </tbody>
        </table>
    </fieldset>
    <a href="needs_input.php">UserNeeds Input</a>
    <a href="n_logout.php">Logout</a>
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