<?php
session_start();
include("n_functions.php");
check_session_id();

// var_dump($_SESSION);
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
    <form action="admin_research_act.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>NurseResearch</legend>
            <div>
                <input type="text" name="office_name" placeholder="office_name">
            </div>
            <div>
                <button>Research</button>
            </div>
        </fieldset>
        <p><a href="index.html">TOP</a></p>

    </form>

</body>
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

</html>