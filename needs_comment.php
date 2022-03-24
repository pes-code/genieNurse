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
    session_start();
    include("functions.php");
    check_session_id();

    $needs_id = $_POST["needs_id"];

    $pdo = connect_to_db();

    // var_dump($_POST);
    // exit();


    $sql = 'SELECT * FROM patient_needs WHERE needs_id=:needs_id AND is_deleted=0';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':needs_id', $needs_id, PDO::PARAM_INT);



    try {
        $status = $stmt->execute();
    } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
    }


    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $output = "";
    foreach ($result as $record) {
        $output .= "
      ";
    }

    ?>

    <fieldset>
        <legend>
            <?= "
          <div class='p_prof'>           
           <form action='p_prof.php' method='POST'>
             <button class='handlename'>{$record["handlename"]}</button>
             <input type='hidden' name='u_id' value='{$record["u_id"]}' readonly>
            </form>
            </div>
            " ?>
        </legend>


        <table>
            <?= "
          <tr class='tag_box'>
           <div class='label'>
             
             <div class='need_title'>
              <h4>{$record['need_title']}</h4>
             </div>

             <div class='needs_comment'>
              <p>{$record['comment']}</p>
             </div>
             
             
             <div class='reward'>
              <h6>最高報酬<br></h6><p>～￥{$record['reward']}</p>
             </div>
             
             <div class='deadline'>
              <h6>日時<br></h6><p>{$record['deadline']}</p>
             </div>
                         
           </div>
          </tr>
        " ?>
        </table>
    </fieldset>
    <FORM>
        <INPUT type="button" value="戻る" onClick="history.back()">
    </FORM> <a href="p_logout.php">ログアウト</a>
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
        padding: 10px;
        border-radius: 5px;
        flex-direction: column;
    }

    .handlename {
        border-radius: 5px;
    }

    button {
        cursor: pointer;
    }
</style>


</html>