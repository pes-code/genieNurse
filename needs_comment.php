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
            <thead>
                <tr class="">
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?= "" ?>
                <?= "
          <tr class=''>
           <div class=''>
            <div class='tag'>
             <div class='need_title'>
              <h6>{$record['need_title']}</h6>
             </div>

             <div class='needs_comment'>
              <p>{$record['comment']}</p>
             </div>
             
             <div class='reward'>
              <h6>reward<br>{$record['reward']}</h6>
             </div>
             
             <div class='deadline'>
              <h6>deadline<br>{$record['deadline']}</h6>
             </div>
            </div>
           </div>
          </tr>
        " ?>
            </tbody>
        </table>
    </fieldset>
    <a href="needs_input.php">Needs Input</a><br>
    <a href="p_logout.php">Logout</a>
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