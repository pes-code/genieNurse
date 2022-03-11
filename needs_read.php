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
<tr>
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
     <form action='appo_brows.php' method='POST'><button class='lamp'> <img src='img/lamp-icon.jpg'></button>
      <input type='hidden' name='needs_id' value='{$record["needs_id"]}' readonly> 
     </form> 
    </div>
    
    <div class='delete'>
     <button class='dustbox'><a href='needs_delete.php?needs_id={$record["needs_id"]}'><img src='img/dustbox.jpg'></a></button>
    </div>
</div>
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
        margin: 0 10px 0 0;
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
</style>

<!--<td>付きバージョン
     <tr class='tag'>
    <div class=''>

        <td>
            <form action='p_prof.php' method='POST'>
        <td class=''>
            <button>{$record["handlename"]}</button>
            <input type='hidden' name='u_id' value='{$record["u_id"]}' readonly>
        </td>
        </form>
        </td>
        <td class=''>
            <h6>sex<br></h6>{$record["sex"]}
        </td>

        <td class=''>
            <form action='needs_comment.php' method='POST'>
                <input type='hidden' name='needs_id' value='{$record["needs_id"]}' readonly>
                <h6>title<br></h6><button>{$record["need_title"]}</button>
            </form>
        </td>

        <td class=''>
            <h6>reward<br></h6>{$record["reward"]}
        </td>
        <td class=''>
            <h6>deadline<br></h6>{$record["deadline"]}
        </td>
        </td>

        <td>
            <form action='appo_brows.php' method='POST'><button>appoNurse</button>
        <td class=''>
            <input type='hidden' name='needs_id' value='{$record["needs_id"]}' readonly>
        </td>
        </form>
        </td>

    </div>
    <td>
        <a href='needs_delete.php?needs_id={$record["needs_id"]}'>delete</a>
    </td>
</tr> -->

</html>