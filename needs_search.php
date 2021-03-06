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

    $n_id = $_SESSION['n_id'];

    ?>


    <h1>genieNurse</h1>
    <!------------------------------------------------------------------------------------->
    <fieldset>
        <legend>カテゴリー検索</legend>
        <!-- <div>
            <input type="text" id="search">
        </div> -->
        <!-- <div>
            <input type="button" value="その他" id="search">
        </div> -->
        <div class="button" id="search">
            <div>
                <input type="button" value="日常生活介助">
            </div>
            <div>
                <input type="button" value="外泊支援">
            </div>
            <div>
                <input type="button" value="外出支援">
            </div>
            <div>
                <input type="button" value="入院支援">
            </div>
            <div>
                <input type="button" value="受診支援">
            </div>
            <div>
                <input type="button" value="リハビリ">
            </div>
            <div>
                <input type="button" value="服薬管理">
            </div>
            <div>
                <input type="button" value="見守り支援">
            </div>
            <div>
                <input type="button" value="健康相談">
            </div>
            <div>
                <input type="button" value="その他">
            </div>
        </div>

    </fieldset>
    <fieldset>
        <legend>検索結果</legend>
        <table>
            <tbody id="result">
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
            </tbody>
        </table>
    </fieldset>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // $("#search").on("keyup", function(e) {
        $("#search").on("click", function(e) {
            console.log(e.target.value);
            const searchWord = e.target.value;
            const requestUrl = "ajax_get.php";

            // ここからhttp通信を行うコード
            axios.get(`${requestUrl}?searchword=${searchWord}`)
                .then(function(response) {
                    console.log(response.data);
                    const array = [];
                    response.data.forEach(function(x) {
                        // array.push(`<tr><td>${x.need_title}</td><td>${x.reward}</td><tr>`);
                        array.push(`<tr class='tag_box'><td>
<div class='label'>
    <div class='needs_comment'>
     <form action='needs_comment.php' method='POST'>
      <input type='hidden' name='id' value='${x.id}' readonly>
      <button class='need_title'>
         <p>${x.handlename}${x.sex}</p>
         <h4>${x.need_title}</h4>
            <div class='reward'>
            <h6>最高報酬<br></h6><p>～￥${x.reward}</p>
            </div>
            <div class='deadline'>
            <h6>日時<br></h6><p>${x.deadline}</p>
            </div>
        <div class='category'>
            <h6>カテゴリー<br></h6><p>${x.needs_category}</p>
        </div>
      </button>
     </form>
    </div>    

    <div class='appo'>
     <form action='appo_create.php' method='POST'>
      <button class='lamp'><img src='img/genie1.jpg'></button>${x.appo_count}
      <input type='hidden' name='id' value='${x.id}' readonly>

      <input type='hidden' name='n_id' value='<?php echo $n_id ?>' readonly>
           

      </form>
    </div>
</div>
</td></tr> `);

                    });

                    console.log(array);

                    $("#result").html(array);
                })
                .catch(function(error) {
                    console.log(error);
                })
        });
    </script>
    <!------------------------------------------------------------------------------------------->
    <a href="needs_browsing.php">ニーズ投稿一覧</a><br>
    <a href="service_input.php">サービス入力</a><br>
    <a href="p_logout.php">ログアウト</a>
</body>
<!-- array.push(``)の中身 -->
<!-- <tr class='tag_box'>
    <td>
        <div class='label'>
            <div class='needs_comment'>
                <form action='needs_comment.php' method='POST'>
                    <input type='hidden' name='needs_id' value='${x.needs_id}' readonly>
                    <button class='need_title'>
                        <p>${x.handlename}${x.sex}</p>
                        <h4>${x.need_title}</h4>
                        <div class='reward'>
                            <h6>最高報酬<br></h6>
                            <p>～￥${x.reward}</p>
                        </div>
                        <div class='deadline'>
                            <h6>日時<br></h6>
                            <p>${x.deadline}</p>
                        </div>
                        <div class='category'>
                            <h6>カテゴリー<br></h6>
                            <p>${x.needs_category}</p>
                        </div>
                    </button>
                </form>
            </div>

            <div class='appo'>
                <form action='appo_create.php' method='POST'>
                    <button class='lamp'><img src='img/genie1.jpg'></button>${x.appo_count}
                    <input type='hidden' name='needs_id' value='${x.needs_id}' readonly>


                    <input type='hidden' name='n_id' value='<?php echo $n_id ?>' readonly>


                </form>
            </div>
        </div>
    </td>
</tr> -->


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
        border: solid 5px black;
        border-radius: 5px;
    }

    .label {
        background-color: white;
        margin: 5px;
        display: flex;
        align-items: center;
        border-radius: 5px;
        /* width: 500px; */
    }

    button {
        cursor: pointer;
        border-radius: 5px;
    }

    /* .p_prof {
        margin: 0 0 0 10px;
    } */

    .need_title {
        width: 300px;
        /* min-width: 250px;
        max-width: 600px; */
        padding: 10px;
        box-sizing: border-box;
        background-color: whitesmoke;

    }

    .needs_comment {
        /* width: 50%; */
        height: 10%;
        margin: 10px;

    }

    .appo {
        margin: 210px 10px 0 0;
    }

    .lamp {
        background-color: white;
        border: 0px;
    }

    img {
        width: 30px;
    }


    /* <?php
        if ($record["sex"] == "男") { ?>.handlename {
        background-color: #6495ED;
    }

    <?php } ?> */
</style>
<!--css-->



</html>