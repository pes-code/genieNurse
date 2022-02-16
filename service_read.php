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
    include("n_functions.php");
    check_session_id();

    $user_id = $_SESSION['n_id']; ///////////////////ここはなぜn_idじゃないといけないの？あとで確認

    $pdo = connect_to_db();

    $nid = $_SESSION["n_id"];

    $sql = 'SELECT * FROM nurse_service WHERE n_id=' . $nid . ' AND is_deleted=0 '; //ORDER BY date ASC

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
    <td class=''><h6>comment<br></h6><img src='{$record["face_img"]}' height='50px' oncontextmenu='return false;'></td>
     <td class=''><h6>office<br></h6><a href='n_prof.php'>{$record["office_name"]}</a></td> 
     <td class=''><h6>comment<br></h6>{$record["comment"]}</td>
     <td class=''><h6>contact<br></h6>
     <a href='{$record["link"]}'>🖥️</a>
     <a href=tel:'{$record["tel"]}'>📞</a>
     <a href='mailto:{$record["mail"]}'>📧</a>
     </td>
     </div>
      <td>
       <a href='service_delete.php?id={$record["id"]}'>delete</a>
      </td> 
  </tr>
  
  ";
    }
    ?>

    <!--css-->
    <style>
    </style>
    <!--css-->

    <fieldset>
        <legend>NursingService</legend>
        <table>
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>
    <a href="service_input.php">NursingService Input</a><br>
    <a href="n_logout.php">Logout</a>
</body>

</html>