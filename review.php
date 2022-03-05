<!--appoNurse閲覧画面-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <h1>genieNurse</h1>
    <?php

    //ハンドルネーム
    //性別
    //ADL：清潔、食事、排泄、移動・移乗


    session_start();
    include("functions.php");
    check_session_id();

    $u_id = $_POST['u_id'];

    $pdo = connect_to_db();

    // var_dump($_POST);
    // exit();



    $sql = 'SELECT * FROM patient_table WHERE u_id=:u_id';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':u_id', $u_id, PDO::PARAM_STR);

    try {
        $status = $stmt->execute();
    } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
    }


    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    //ADL情報///

    $output = "";
    foreach ($result as $record) {
        $output .= "
            <tr class=''>
            <div class=''>
            </div>
            <div class=''> 
            <td class=''><h6>handlename<br></h6>{$record["handlename"]}</td> 
            <td class=''><h6>sex<br></h6>{$record["sex"]}</td> 
                </div>
                
    <h6>ADL</h6>
            </tr>
        
  ";
    }

    //年齢を計算する関数//////////////////////////////////
    $birthday = $record["birthday"];
    $today = date('Ymd');
    $age = floor(($today - $birthday) / 10000) . '歳';
    /////////////////////////////////////////////////////


    ?>


    <fieldset>
        <legend>genieNurse[UsersProf]</legend>
        <table>
            <thead>
            </thead>
            <tbody>

                <?= $output ?>
                <?= $age ?>


            </tbody>
        </table>
    </fieldset>
    <a href="review_input.php">Review Input</a>
    <a href="n_logout.php">Logout</a>
</body>

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