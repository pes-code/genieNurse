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

    $n_id = $_SESSION['n_id'];

    $pdo = connect_to_db();

    // var_dump($_SESSION);
    // exit();

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sql = 'SELECT handlename, u_id, sex, need_title, comment, reward, deadline, mail, n_id, patient_needs.needs_id AS needs_id,COUNT(appo_table.id) AS appo_count FROM patient_needs LEFT OUTER JOIN appo_table ON patient_needs.needs_id = appo_table.needs_id GROUP BY patient_needs.needs_id';

    //$sql = 'SELECT * FROM patient_needs LEFT OUTER JOIN (SELECT needs_id, COUNT(id) AS appo_count FROM appo_table GROUP BY needs_id) AS appo_count_table ON patient_needs.needs_id = appo_count_table.needs_id';

    // $sql = 'SELECT * FROM patient_needs WHERE is_deleted=0';

    //$sql = 'SELECT *,COUNT(appo_table.id) FROM patient_needs LEFT OUTER JOIN appo_table ON patient_needs.needs_id = appo_table.needs_id GROUP BY patient_needs.needs_id';

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
<div class='tag'>
    <div class='p_prof'>
        <form action='p_prof.php' method='POST'>
        <button class='handlename'>{$record["handlename"]} [{$record["sex"]}]</button>
        <input type='hidden' name='u_id' value='{$record["u_id"]}' readonly> 
        </form>
    </div>

    <div class='needs_comment'>
     <form action='needs_comment.php' method='POST'>
      <input type='hidden' name='needs_id' value='{$record["needs_id"]}' readonly>
      <button class='need_title'>{$record["need_title"]}
    <div class='reward'>
     <h6>reward<br>{$record["reward"]}</h6>
    </div>
    <div class='deadline'>
     <h6>deadline<br>{$record["deadline"]}</h6>
    </div>
      </button>
      </form>
    </div>

    <div class='appo'>
     <form action='appo_create.php' method='POST'>
      <button class='lamp'><img src='img/genie1.jpg'></button>{$record["appo_count"]}
      <input type='hidden' name='needs_id' value='{$record["needs_id"]}' readonly>
      <input type='hidden' name='n_id' value='{$_SESSION["n_id"]}' readonly>
     </form>
    </div>
</tr> 

  ";
    }
    ?>
    <div class="input_form">
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
    </div>
    <a href="service_input.php">ServiceInput</a><br>
    <a href="p_logout.php">Logout</a>
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

    .input_form {
        width: 30%;
    }


    .handlename {
        border-radius: 30px;
    }

    .tag {
        background-color: white;
        margin: 5px;
        display: flex;
        align-items: center;
    }

    button {
        cursor: pointer;
    }

    .p_prof {
        margin: 0 0 0 10px;
    }

    .need_title {
        width: 50%;
        min-width: 250px;
        max-width: 600px;
        padding: 10px;
        box-sizing: border-box;
        background-color: whitesmoke;

    }

    .needs_comment {
        width: 50%;
        margin: 10px;

    }

    .appo {
        margin: 0 10px 0 40px;
    }

    .lamp {
        background-color: white;
        border: 0px;
    }

    .delete {
        margin: 0 10px 0 0;
    }

    .dustbox {
        background-color: white;
        border: 0px;

    }

    img {
        width: 30px;
    }


    /* <?php
        if ($record["sex"] == "男") { ?>.handlename {
        background-color: #6495ED;
    }

    <?php } ?> */
</style>
<!--css-->




</html>