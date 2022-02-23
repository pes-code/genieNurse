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

    $user_id = $_SESSION['u_id']; ////////////////なぜココはu_idじゃないとダメか確認する。

    $pdo = connect_to_db();

    $u_id = $_SESSION["u_id"];

    $sql = 'SELECT * FROM patient_needs WHERE u_id=' . $u_id . ' AND is_deleted=0  '; //ORDER BY date ASC

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
                                   
                                              <td class=''><h6>needsID<br></h6>{$record["needs_id"]}</td>

     </div>
      <td>
       <a href='needs_delete.php?needs_id={$record["needs_id"]}'>delete</a>
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
        <legend>UserNeeds</legend>

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
    <a href="needs_input.php">Needs Input</a><br>
    <a href="p_logout.php">Logout</a>
</body>

</html>