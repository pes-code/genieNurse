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

    $n_id = $_SESSION['n_id'];

    $pdo = connect_to_db();

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //$sql = 'SELECT * FROM patient_needs LEFT OUTER JOIN (SELECT needs_id, COUNT(id) AS appo_count FROM appo_table GROUP BY needs_id) AS appo_count_table ON patient_needs.needs_id = appo_count_table.needs_id';

    $sql = 'SELECT * FROM patient_needs WHERE is_deleted=0';

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
    <td class=''><h6>handlename<br></h6><a href='p_prof.php'>{$record["handlename"]}</a></td> 
     <td class=''><h6>sex<br></h6>{$record["sex"]}</td>
     <td class=''><h6>comment<br></h6>{$record["comment"]}</td>
     <td class=''><h6>reward<br></h6>{$record["reward"]}</td>
     <td class=''><h6>deadline<br></h6>{$record["deadline"]}</td>
     <td class=''><h6>contact<br></h6>
     <a href='mailto:{$record["mail"]}'>📧</a>

 

        <td><form action='appo_create.php' method='POST'>
        <td class=''>
        <h6>appointment<br></h6><button>appo{$record["appo_count"]}</button>
        <input type='text' name='needs_id' value='{$record["needs_id"]}' readonly> 
        <input type='hidden' name='n_id' value='{$_SESSION["n_id"]}' readonly> 
        </td> 
        </form></td> 


    
    </div>
  </tr>
 
  ";
    }



    ?>
    <!--   
     <td><a href='appo_create.php?n_id={$n_id}&needs_id={$record["id"]}'>appo{$record["appo_count"]}</a></td>
     <td><a href='appo_create.php?n_id={$n_id}&needs_id={$record["needs_id"]}'>appo</a></td>
    -->
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