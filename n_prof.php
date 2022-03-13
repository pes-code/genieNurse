<!--appoNurse閲覧画面-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse[UsersProf]</title>
</head>

<body>
    <h1>genieNurse</h1>
    <?php
    session_start();
    include("n_functions.php");
    check_session_id();

    $n_id = $_POST['n_id'];

    $pdo = connect_to_db();

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
        // $output .= "
        //             <tr class=''>
        //             <td class=''></td> 
        //             </tr> 
        //   ";
    }

    //年齢を計算する関数//////////////////////////////////
    $birthday = $record["birthday"];
    $today = date('Ymd');
    $age = floor(($today - $birthday) / 10000) . '歳';
    /////////////////////////////////////////////////////
    ?>
    <div class="input_form">
        <fieldset>
            <legend><?= $record["office_name"] ?></legend>
            <table>
                <thead>
                </thead>
                <tbody>
                    <label>[age]</label>
                    <?= $age ?><br>
                    <label>[sex]</label>
                    <?= $record["sex"] ?><br>
                    <label>[Contact]</label><br>
                    <?= "<a href=tel:'{$record["tel"]}'><img src='img/tel.jpg'></a>" ?>
                    <?= "<a href='mailto:{$record["mail"]}'><img src='img/mail.jpg'></a>" ?>
                    <?= "<a href='{$record["link"]}'><img src='img/link.jpg'></a>" ?>
                </tbody>
            </table>
        </fieldset>
    </div>
    <a href="needs_input.php">UserNeeds Input</a>
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

    .input_form {
        width: 30%;
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
        width: 100%;

    }

    img {
        width: 25px;
        height: 25px;
        margin: 5px;
    }

    /* .name {
        background-image: url(img/name.jpg);
    } */
</style>
<!--css-->

</html>