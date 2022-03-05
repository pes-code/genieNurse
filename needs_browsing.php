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
    $sql = 'SELECT handlename, u_id, sex, comment, reward, deadline, mail, n_id, patient_needs.needs_id AS needs_id,COUNT(appo_table.id) AS appo_count FROM patient_needs LEFT OUTER JOIN appo_table ON patient_needs.needs_id = appo_table.needs_id GROUP BY patient_needs.needs_id';

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

    <td><form action='p_prof.php' method='POST'>
        <td class=''>
        <button>{$record["handlename"]}</button>
        <input type='hidden' name='u_id' value='{$record["u_id"]}' readonly> 
        </td> 
        </form></td> 
       
     <td class=''><h6>sex<br></h6>{$record["sex"]}</td>
     <td class=''><h6>comment<br></h6>{$record["comment"]}</td>
     <td class=''><h6>reward<br></h6>{$record["reward"]}</td>
     <td class=''><h6>deadline<br></h6>{$record["deadline"]}</td>
 
        <td><form action='appo_create.php' method='POST'>
        <td class=''>
        <h6>appointment<br></h6><button>appo{$record["appo_count"]}</button>
        <input type='hidden' name='needs_id' value='{$record["needs_id"]}' readonly> 
        <input type='hidden' name='n_id' value='{$_SESSION["n_id"]}' readonly> 
        </td> 
        </form></td> 

    </div>
  </tr>
  ";
    }
    ?>

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