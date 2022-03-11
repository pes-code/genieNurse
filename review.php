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

    $n_id = $_POST['n_id'];

    $pdo = connect_to_db();
    // var_dump($_SESSION);
    // var_dump($_POST);
    // exit();

    $sql = 'SELECT * FROM nurse_table WHERE n_id=:n_id';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':n_id', $n_id, PDO::PARAM_INT);

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
            <input type='text' name='appeal' value='{$record["appeal"]}' readonly> 
            </td>
            </div>
            <td class=''><h6>contact<br></h6>
            <a href=tel:'{$record["tel"]}'>📞</a>
            <a href='mailto:{$record["mail"]}'>📧</a>
            <a href='{$record["link"]}'>🖥️</a>
            </tr>
  ";
    }
    ?>

    <fieldset>
        <legend><?= $record["office_name"] ?></legend>
        <table>
            <thead>
            </thead>
            <tbody>

                <?= $output ?>

            </tbody>
        </table>
    </fieldset>
    <form action="review_input.php" method="POST">
        <input type='hidden' name='n_id' value=<?= $record["n_id"] ?> readonly>
        <button>Review Input</button>
    </form>
    <!-- <a href="review_input.php">Review Input</a> -->
    <a href="n_logout.php">Logout</a>
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
</style>
<!--css-->

</html>