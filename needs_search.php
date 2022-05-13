<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
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
                        array.push(`<tr><td>${x.need_title}</td><td>${x.reward}</td><tr>`);
                        // array.push(``);

                    });

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