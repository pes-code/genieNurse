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

    $id = $_POST["id"];

    $pdo = connect_to_db();

    // var_dump($_POST);
    // exit();


    $sql = 'SELECT * FROM nurse_service WHERE id=:id AND is_deleted=0';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);



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
          <div class='n_prof'>           
           <form action='n_prof.php' method='POST'>
             <button class='office_name'>{$record["office_name"]}</button>
             <input type='hidden' name='n_id' value='{$record["n_id"]}' readonly>
            </form>
            </div>
            " ?>
        </legend>


        <table>
            <thead>
                <tr class="">
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?= "
          <tr class=''>
           <div class=''>
            <div class='tag'>
             <div class='title'>
              <h6>{$record['title']}</h6>
             </div>

             <div class='service_comment'>
              <p>{$record['comment']}</p>
             </div>
             
             <div class='reward'>
              <h6>最低報酬<br></h6><p>￥{$record['reward']}～</p>
             </div>
             
            </div>
           </div>
          </tr>
        " ?>
            </tbody>
        </table>

    </fieldset>
    <FORM>
        <INPUT type="button" value="戻る" onClick="history.back()">
    </FORM>
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

    .handlename {
        border-radius: 30px;
    }

    .tag {
        min-width: 250px;
        max-width: 600px;
        padding: 10px;
        box-sizing: border-box;
        background-color: whitesmoke;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    button {
        cursor: pointer;
    }
</style>


</html>