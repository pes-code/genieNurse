<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>

    <?php
    session_start();
    include("functions.php");
    check_session_id();

    $user_id = $_SESSION['n_id'];

    $pdo = connect_to_db();

    //Like機能
    //$sql = 'SELECT * FROM will_table LEFT OUTER JOIN (SELECT todo_id, COUNT(id) AS like_count FROM like_table GROUP BY todo_id) AS result_table ON todo_table.id = result_table.todo_id';
    //現在ログイン中のアカウントのデータのみを出力する&1アカウント1レコードしか入力できないようにする（editへジャンプするようにするか）///$sql = 'SELECT * FROM will_table WHERE id=///この部分に何を入れるか？///';

    $sql = 'SELECT * FROM patient_needs WHERE is_deleted=0  '; //ORDER BY date ASC

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
    <td class=''><h6>handlename<br></h6><a href='p_prof.php'>{$record["handlename"]}</a></td> 
     <td class=''><h6>sex<br></h6>{$record["sex"]}</td>
     <td class=''><h6>comment<br></h6>{$record["comment"]}</td>
     <td class=''><h6>reward<br></h6>{$record["reward"]}</td>
     <td class=''><h6>deadline<br></h6>{$record["deadline"]}</td>
     <td class=''><h6>contact<br></h6>
     <a href='mailto:{$record["mail"]}'>📧</a>
     </td>
    </div>
  </tr>
  
  ";
    }
    ?>

    <!--css-->
    <style>
    </style>
    <!--css-->

    <fieldset>
        <legend>genieNurse[UsersNeeds]</legend>

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
    <a href="service_input.php">ServiceInput</a><br>
    <a href="p_logout.php">Logout</a>
</body>

</html>