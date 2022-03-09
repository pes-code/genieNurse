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

    // $user_id = $_SESSION['u_id']; ////////////////なぜココはu_idじゃないとダメか確認する。
    $u_id = $_SESSION["u_id"];

    $pdo = connect_to_db();


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
    
    <td>
        <form action='p_prof.php' method='POST'>
        <td class=''>
        <button>{$record["handlename"]}</button>
        <input type='hidden' name='u_id' value='{$record["u_id"]}' readonly> 
        </td> 
        </form>
    </td> 

     <td class=''><h6>sex<br></h6>{$record["sex"]}</td>
     <td class=''><h6>comment<br></h6>{$record["comment"]}</td>
     <td class=''><h6>reward<br></h6>{$record["reward"]}</td>
     <td class=''><h6>deadline<br></h6>{$record["deadline"]}</td>
     </td>

        <td><form action='appo_brows.php' method='POST'><button>appoNurse</button>
        <td class=''>
        <input type='hidden' name='needs_id' value='{$record["needs_id"]}' readonly> 
        </td> 
        </form></td> 

     </div>
      <td>
       <a href='needs_delete.php?needs_id={$record["needs_id"]}'>delete</a>
      </td> 
  </tr>
  
  ";
    }
    ?>

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
        background: -moz-linear-gradient(top, #FFC778, #FFF);
        background: -webkit-linear-gradient(top, #FFC778, #FFF);
        background: linear-gradient(to bottom, #FFC778, #FFF);
        background-repeat: no-repeat;

        display: flex;
        align-items: center;
        flex-direction: column;
    }
</style>

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