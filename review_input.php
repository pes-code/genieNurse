<?php
session_start();
include("functions.php");
check_session_id();

// var_dump($_POST);
// exit();

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <h1>genieNurse</h1>
    <form action="review_act.php" method="POST">
        <fieldset>
            <legend>Review Input</legend>
            <div><label>review</label>
                <!--後程ランプにする-->
                <select name="lamp">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <!-- <div><label>comment</label>
                <textarea rows="10" cols="50" name="appeal" placeholder="appeal"></textarea>
            </div> -->
            <!--hiddenへ変更-->
            <input type="text" name="u_id" value="<?= $_SESSION["u_id"] ?>" readonly>
            <input type="text" name="n_id" value="<?= $_POST["n_id"] ?>" readonly>

            <div>
                <button>Input</button>
            </div>
        </fieldset>
        <p><a href="review.php">Review</a></p>
    </form>

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