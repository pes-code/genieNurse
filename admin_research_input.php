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
        <p><a href="index.html">Entrance</a></p>

    </form>

</body>

</html>