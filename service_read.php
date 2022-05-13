<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse [NursingService read]</title>
</head>

<body>
    <h1>genieNurse</h1>
    <?php
    session_start();
    include("n_functions.php");
    check_session_id();

    // $user_id = $_SESSION['n_id']; ///////////////////ここはなぜn_idじゃないといけないの？あとで確認
    $n_id = $_SESSION["n_id"];

    $pdo = connect_to_db();


    $sql = 'SELECT * FROM nurse_service WHERE n_id=' . $n_id . ' AND is_deleted=0 '; //ORDER BY date ASC

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
   
   <div class='service_comment'>
     <form action='service_comment.php' method='POST'>
      <input type='hidden' name='id' value='{$record["id"]}' readonly>
      <button class='service_title'><h4>{$record["title"]}</h4>
      <div class='reward'>
       <h6>最低報酬<br></h6><p>￥{$record["reward"]}～</p>
      </div>
    <div class='category'>
        <h6>カテゴリー<br></h6><p>{$record["service_category"]}</p>
    </div>
      </button>
     </form>
   </div>

   <div class='button_box'>
    <div class='delete'>
     <button class='dustbox'><a href='service_delete.php?id={$record["id"]}'><img src='img/dustbox.jpg'></a></button>
    </div>
   </div>
  
  </div>
</tr>
  ";
    }
    ?>
    <div class="input_form">
        <fieldset>
            <legend>
                <div class="office_box">
                    <div class="">
                        <img class="face" src="<?= $_SESSION["face_img"] ?>" height=50px oncontextmenu='return false;'>
                    </div>
                    <div class="n_prof">
                        <form action='n_prof.php' method='POST'>
                            <button><?= $_SESSION['office_name'] ?></button>
                            <input type='hidden' name='n_id' value=<?= $record["n_id"] ?> readonly>
                        </form>
                    </div>
                </div>
            </legend>
            <table>
                <?= $output ?>
            </table>
        </fieldset>
    </div>
    <a href="service_input.php">サービス入力</a><br>
    <a href="n_logout.php">ログアウト</a>
</body>

<!--css-->
<style>
    .office_box {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .face {
        width: 40px;
        height: 40px;
        border-radius: 3px;
        margin: 0 10px;
    }

    .n_prof button {
        border: none;
        background: transparent;
    }

    .tag_box {
        background-color: white;
        margin: 5px;
        display: flex;
        align-items: center;
    }

    img {
        width: 30px;
    }

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
        font-size: 10px;
    }

    .service_title {
        width: 300px;
        padding: 10px;
        box-sizing: border-box;
        background-color: whitesmoke;
    }

    .service_comment {
        height: 10%;
        margin: 10px;
    }

    .button_box {
        display: flex;
        flex-direction: column;
    }

    .delete {
        margin: 0 10px 0px 0;
    }

    .dustbox {
        background-color: white;
        border: 0px;
    }
</style>
<!--css-->

</html>