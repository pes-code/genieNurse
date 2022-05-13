<!--サービス閲覧画面-->
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
    include("n_functions.php");
    check_session_id();

    $u_id = $_SESSION['u_id'];

    $pdo = connect_to_db();

    // var_dump($_SESSION);
    // exit();

    $sql = 'SELECT * FROM nurse_service WHERE is_deleted=0  ';

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
    <button class='service_title'>
  
  <div class='office_box'>
   <div class='face_box'>
      <img class='face' src='{$record["face_img"]}' height='50px' oncontextmenu='return false;'>    
   </div>
   <div class='office_name'>
      <p>{$record["office_name"]}</p>
   </div>
  </div>

    {$record["title"]}
     <div class='reward'>
       <h6>最低報酬<br></h6><p>￥{$record["reward"]}～</p>
     </div>

    <div class='category'>
        <h6>カテゴリー<br></h6><p>{$record["service_category"]}</p>
    </div>
    </button>
   </form>
  </div>

   <div class='appo'>
     <form action='n_prof.php' method='POST'>
       <button><img class='lamp' src='img/lamp-icon.jpg'></button>
      <input type='hidden' name='n_id' value='{$record["n_id"]}' readonly> 
     </form>
   </div>

</div>
</tr>
  
  ";
    }
    //↑活動日はカレンダー表示で複数マーク表示できるようにする
    ?>

    <fieldset>
        <legend>genieNurse[NursingService]</legend>
        <table>
            <thead>
            </thead>
            <tbody>
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>
    <a href="needs_input.php">ニーズ入力</a>
    <a href="n_logout.php">ログアウト</a>
</body>

<!--css-->
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
        border: solid 5px black;
        border-radius: 5px;
    }

    .label {
        background-color: white;
        margin: 5px;
        display: flex;
        align-items: center;
        border-radius: 5px;
        /* width: 500px; */
    }

    button {
        cursor: pointer;
        border-radius: 5px;
    }


    .service_title {
        width: 300px;
        /* min-width: 250px;
        max-width: 600px; */
        padding: 10px;
        box-sizing: border-box;
        background-color: whitesmoke;

    }

    .service_comment {
        /* width: 50%; */
        height: 10%;
        margin: 10px;

    }

    .office_box {
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .face {
        width: 30px;
        height: 30px;
        border-radius: 5px;
        margin: 0 10px 0 0;
    }

    .tag_box {
        background-color: white;
        margin: 5px;
        display: flex;
        align-items: center;
    }


    button {
        cursor: pointer;
        border: none;
        background-color: transparent;
    }


    /* .appo {
        margin: 210px 10px 0 0;
    } */

    .lamp {
        width: 30px;
        margin: 170px 10px 10px 0;
        background-color: white;
        border: 0px;
    }



    /* .lamp {
        width: 30px;
        background-color: white;
        margin: 200px 10px 0 0 0;
    } */
</style>
<!--css-->


</html>