<!--appoNurse閲覧画面-->
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

    $u_id = $_SESSION['u_id'];
    $needs_id = $_POST["needs_id"];
    // var_dump($_POST);
    // var_dump($_SESSION);
    // exit();

    $pdo = connect_to_db();

    $sql = 'SELECT * FROM appo_table LEFT OUTER JOIN nurse_table ON appo_table.n_id=nurse_table.n_id WHERE needs_id=:needs_id';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':needs_id', $needs_id, PDO::PARAM_STR);

    try {
        $status = $stmt->execute();
    } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $output = "";
    foreach ($result as $record) { ////////n_idの識別ができていない↓////////////////
        $output .= "
    <tr class=''>
    <div class=''> 
     <td class=''>
     <form action='n_prof.php' method='POST'>
     <button>{$record["office_name"]}</button>
     <input type='hidden' name='n_id' value='{$record["n_id"]}' readonly>
     </form></td> 
     </div>
  </tr>  
  ";
    }
    ?>

    <fieldset>
        <legend>NursingService</legend>
        <table>
            <thead>
            <tbody>
                <?= $output ?>
            </tbody>
            </thead>
        </table>
    </fieldset>
    <a href="needs_input.php">UserNeeds Input</a>
    <a href="n_logout.php">Logout</a>
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