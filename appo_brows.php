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
    <div class="input_form">
        <fieldset>
            <legend>NursingService</legend>
            <div class='appo_office'>
                <table>
                    <thead>
                    <tbody>

                        <?= $output ?>

                    </tbody>
                    </thead>
                </table>
            </div>
        </fieldset>
    </div>
    <a href="needs_input.php">依頼入力</a>
    <a href="n_logout.php">ログアウト</a>
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

    fieldset {
        padding: 20px;
        border: 4px solid;
        border-color: black;
        border-radius: 1.3rem;
    }

    .appo_office {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    /* input,
    select {
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
        width: 100%;

    }
 */


    /* .name {
        background-image: url(img/name.jpg);
    } */
</style>
<!--css-->

</html>