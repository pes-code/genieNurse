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
         <td class=''><h6>title<br></h6>{$record["title"]}</td>
         <td class=''><h6>reward</h6>{$record["reward"]}</td>
     <td class=''><h6>comment<br></h6>{$record["comment"]}</td>
     </div>
      <td>
       <a href='service_delete.php?id={$record["id"]}'><img src='img/dustbox.jpg'></a>
      </td> 
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
    </div>
    <a href="service_input.php">NursingService Input</a><br>
    <a href="n_logout.php">Logout</a>
</body>

<!--css-->
<style>
    .office_box {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* .n_prof {
        display: flex;
        text-align: center;
        justify-content: center;
    } */

    .face {
        width: 50px;
        height: 50px;
        border-radius: 50%
    }

    img {
        width: 30px;
    }

    button {
        /* border: 3px solid; */
        /* border-color: black; */
        border: none;
        background: none;
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
        padding: 20px;
        border: 4px solid;
        border-color: black;
        border-radius: 1.3rem;
    }

    input {
        font-size: 0.3rem;
        font-weight: 700;
        line-height: 0.3;
        position: relative;
        padding: 1rem 4rem;
        cursor: pointer;
        text-align: center;
        letter-spacing: 0.5em;
        color: #212529;
        border-radius: 0.5rem;
        margin: 5px;
        border: 2px solid;
        border-color: black;
        width: 200px;
    }
</style>
<!--css-->

</html>