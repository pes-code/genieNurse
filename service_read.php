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
    <tr class=''>
    <div class=''>
     <td class=''><h6>comment<br></h6>{$record["comment"]}</td>
     </div>
      <td>
       <a href='service_delete.php?id={$record["id"]}'>delete</a>
      </td> 
  </tr>
  ";
    }
    ?>

    <fieldset>
        <legend>
            <img src="<?= $_SESSION["face_img"] ?>" height=50px oncontextmenu='return false;'>
            <form action='n_prof.php' method='POST'>
                <button><?= $_SESSION['office_name'] ?></button>
                <input type='hidden' name='n_id' value=<?= $record["n_id"] ?> readonly>
            </form>
        </legend>
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

<!--css-->
<style>
    img {
        width: 50px;
        height: 50px;
        border-radius: 50%
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


    /* body {
        background: -moz-linear-gradient(top, #FFF, #FFC778);
        background: -webkit-linear-gradient(top, #FFF, #FFC778);
        background: linear-gradient(to bottom, #FFF, #FFC778);
        background-repeat: no-repeat;
    } */
</style>
<!--css-->

</html>