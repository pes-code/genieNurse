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

    //Like機能
    //$sql = 'SELECT * FROM will_table LEFT OUTER JOIN (SELECT todo_id, COUNT(id) AS like_count FROM like_table GROUP BY todo_id) AS result_table ON todo_table.id = result_table.todo_id';
    //現在ログイン中のアカウントのデータのみを出力する&1アカウント1レコードしか入力できないようにする（editへジャンプするようにするか）///$sql = 'SELECT * FROM will_table WHERE id=///この部分に何を入れるか？///';

    $sql = 'SELECT * FROM nurse_service WHERE is_deleted=0  '; //ORDER BY date ASC

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
    <tr class=''>
    <div class=''>
    </div>
    <div class=''> 
     <td class=''><h6>comment<br></h6><img src='{$record["face_img"]}' height='50px' oncontextmenu='return false;'></td>
     <td class=''><h6>office<br></h6><a href='review.php'>{$record["office_name"]}</a></td> 
     <td class=''><h6>comment<br></h6>{$record["comment"]}</td>
     <td class=''><h6>contact<br></h6>
     <a href='{$record["link"]}'>🖥️</a>
     <a href=tel:'{$record["tel"]}'>📞</a>
     <a href='mailto:{$record["mail"]}'>📧</a>
     </td>
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
    <a href="needs_input.php">UserNeeds Input</a>
    <a href="n_logout.php">Logout</a>
</body>
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