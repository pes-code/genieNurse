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

    // $user_id = $_SESSION['u_id']; ////////////////なぜココはu_idじゃないとダメか確認する。
    $u_id = $_SESSION["u_id"];

    $pdo = connect_to_db();


    $sql = 'SELECT * FROM patient_needs WHERE u_id=' . $u_id . ' AND is_deleted=0  '; //ORDER BY date ASC

    $stmt = $pdo->prepare($sql);

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
<tr class='tag_box'>
<div class='label'>
    <div class='needs_comment'>
     <form action='needs_comment.php' method='POST'>
      <input type='hidden' name='needs_id' value='{$record["needs_id"]}' readonly>
      <button class='need_title'>
         <p>{$record["handlename"]}[{$record["sex"]}]</p>
         <h4>{$record["need_title"]}</h4>
            <div class='reward'>
            <h6>最高報酬<br></h6><p>～￥{$record["reward"]}</p>
            </div>
            <div class='deadline'>
            <h6>日時<br></h6><p>{$record["deadline"]}</p>
            </div>
    <div class='category'>
        <h6>カテゴリー<br></h6><p>{$record["needs_category"]}</p>
    </div>
      </button>
     </form>
    </div>    

 <div class='button_box'>
    <div class='delete'>
     <button class='dustbox'><a href='needs_delete.php?needs_id={$record["needs_id"]}'><img src='img/dustbox.jpg'></a></button>
    </div>   

    <div class='appo'>
     <form action='appo_brows.php' method='POST'>
      <button class='lamp'><img src='img/lamp-icon.jpg'></button>
      <input type='hidden' name='needs_id' value='{$record["needs_id"]}' readonly> 
     </form> 
    </div>
 </div>

 </div>
</tr>
  ";
    }
    ?>
    <fieldset>
        <legend>投稿内容</legend>

        <table>
            <thead>
                <tr class="">
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>
    <a href="needs_input.php">ニーズ入力</a><br>
    <a href="p_logout.php">ログアウト</a>
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
        display: flex;
        align-items: center;
        border-radius: 5px;
    }

    button {
        cursor: pointer;
        border-radius: 5px;
    }

    .need_title {
        width: 300px;
        padding: 10px;
        box-sizing: border-box;
        background-color: whitesmoke;
    }

    .needs_comment {
        height: 10%;
        margin: 10px;
    }

    .button_box {
        display: flex;
        flex-direction: column;
    }

    .appo {
        margin: 210px 10px 0 0;
    }

    .lamp {
        background-color: white;
        border: 0px;
    }

    .delete {
        margin: 0 10px 0px 0;
    }

    .dustbox {
        background-color: white;
        border: 0px;
    }

    img {
        width: 30px;
    }
</style>


</html>