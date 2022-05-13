<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <h1>genieNurse</h1>
    <a href="needs_search.php">絞り込み検索</a>
    <?php
    session_start();
    include("functions.php");
    check_session_id();

    $n_id = $_SESSION['n_id'];

    $pdo = connect_to_db();

    // var_dump($_SESSION);
    // exit();

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sql = 'SELECT handlename, u_id, sex, need_title, comment, reward, deadline, needs_category, mail, n_id, patient_needs.needs_id AS needs_id,COUNT(appo_table.id) AS appo_count FROM patient_needs LEFT OUTER JOIN appo_table ON patient_needs.needs_id = appo_table.needs_id GROUP BY patient_needs.needs_id';

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
<tr class='tag_box'>
<div class='label'>
    <div class='needs_comment'>
     <form action='needs_comment.php' method='POST'>
      <input type='hidden' name='needs_id' value='{$record["needs_id"]}' readonly>
      <button class='need_title'>
         <p>{$record["handlename"]}[{$record["sex"]}]</p>
         <h4>{$record["need_title"]}</h4>
            <div class='reward'>
            <h6>最高報酬<br></h6><p>～￥{$record["reward"]}</p>
            </div>
            <div class='deadline'>
            <h6>日時<br></h6><p>{$record["deadline"]}</p>
            </div>
        <div class='category'>
            <h6>カテゴリー<br></h6><p>{$record["needs_category"]}</p>
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
</div>
</tr> 

  ";
    }
    ?>
    <div class="input_form">
        <fieldset>
            <legend>genieNurse[UsersNeeds]</legend>

            <table>
                <!-- <tr class="">
                    <th></th>
                </tr> -->
                <?= $output ?>
            </table>
        </fieldset>
    </div>
    <a href="service_input.php">サービス入力</a><br>
    <a href="p_logout.php">ログアウト</a>
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

    /* .p_prof {
        margin: 0 0 0 10px;
    } */

    .need_title {
        width: 300px;
        /* min-width: 250px;
        max-width: 600px; */
        padding: 10px;
        box-sizing: border-box;
        background-color: whitesmoke;

    }

    .needs_comment {
        /* width: 50%; */
        height: 10%;
        margin: 10px;

    }

    .appo {
        margin: 210px 10px 0 0;
    }

    .lamp {
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