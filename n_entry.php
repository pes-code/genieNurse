<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genieNurse</title>
</head>

<body>
    <h1>genieNurse</h1>
    <form action="n_entry_act.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>NurseEntry</legend>
            <div>
                <input type="text" name="name" placeholder="name">
            </div>
            <div>
                <select name="sex" placeholder="sex">
                    <option>男</option>
                    <option>女</option>
                </select>
            </div>
            <div>
                <input type="text" name="birthday" placeholder="birthday">
            </div>
            <div>
                <input type="text" name="address" placeholder="address">
            </div>
            <div>
                <input type="text" name="tel" placeholder="tel">
            </div>
            <div>
                <input type="text" name="mail" placeholder="mail">
            </div>
            <div>
                <input type="text" name="pass" placeholder="pass">
            </div>

            <!--身分証明------------------------------------------------------------------>
            <div>
                <h6>身分証明写し(表面)<br>
                    <input type="file" name="id_f_img" accept="image/*" capture="camera" />
                </h6>
                <h6>身分証明写し(裏面)<br>
                    <input type="file" name="id_b_img" accept="image/*" capture="camera" />
                </h6>
            </div>

        </fieldset>

        <fieldset>
            <legend>OfficeEntry</legend>
            <!---顔写真------------------------------------------------------------------->
            <div>
                <h6>顔写真<br>
                    <input type="file" name="face_img" accept="image/*" capture="camera" />
                </h6>
            </div>

            <div>
                <input type="text" name="office_name" placeholder="office_name">
            </div>


            <!--<div>
                <div><label>[skil]</label><br>
                    <label><input type="checkbox" name="skil1" value="入浴介助">入浴介助</label>
                    <label><input type="checkbox" name="skil2" value="食事介助">食事介助</label>
                    <label><input type="checkbox" name="skil3" value="排泄介助">排泄介助</label>
                    <label><input type="checkbox" name="skil4" value="環境整備">環境整備</label>
                </div>          
                <div>
                    <label><input type="checkbox" name="skil5" value="外泊同伴">外泊同伴</label>
                    <label><input type="checkbox" name="skil6" value="通院同伴">通院同伴</label>
                    <label><input type="checkbox" name="skil7" value="入院同伴">入院同伴</label>
                    <label><input type="checkbox" name="skil8" value="健康相談">健康相談</label>
                </div>
                <div><label>[medical practice]</label><br>
                    <label><input type="checkbox" name="np1" value="気切チューブ交換">気切チューブ交換</label>
                    <label><input type="checkbox" name="np2" value="人工呼吸器設定">人工呼吸器設定</label>
                    <label><input type="checkbox" name="np3" value="胃婁ボタン交換">胃婁ボタン交換</label>
                    <label><input type="checkbox" name="np4" value="輸液">輸液</label>
                </div>
                <div>
                    <label><input type="checkbox" name="np5" value="栄養剤調整">栄養剤調整</label>
                    <label><input type="checkbox" name="np6" value="褥瘡処置">褥瘡処置</label>
                    <label><input type="checkbox" name="np7" value="動脈穿刺">動脈穿刺</label>
                    <label><input type="checkbox" name="np8" value="Picc留置">Picc留置</label>
                </div>
            </div>-->

            <!--   <div><label>[item]</label><br>
                    <div>
                        <label><input type="checkbox" name="item[]" value="AED">AED</label>
                        <label><input type="checkbox" name="item[]" value="吸引機">吸引機</label>
                        <label><input type="checkbox" name="item[]" value="リクライニング車椅子">リクライニング車いす</label>
                        <label><input type="checkbox" name="item[]" value="介護用自動車">介護用自動車</label>
                    </div>-->

            <!--<div>
                        <label><input type="text" name="item_other" placeholder="other_item"></label>
                    </div>
                </div>
                <div>
                    <label>[staff]</label><br>
                    <select name="staff">
                        <?php
                        //for ($staff = 0; $staff <= 100; $staff++) {
                        //    echo "<option value='{$staff}'>{$staff}</option>";
                        //}
                        ?>
                    </select>
                </div>-->

            <div>
                <input type="text" name="link" placeholder="HP_URL">
            </div>

            <div>
                <textarea rows="10" cols="50" name="appeal" placeholder="appeal"></textarea>
            </div>

            <div>
                <input type="text" name="nurse_number" placeholder="license_number">
            </div>

            <!--看護師免許---------------------------------------------------------------->
            <div>
                <h6>看護師免許写し<br>
                    <input type="file" name="license_img" accept="image/*" capture="camera" />
                </h6>
            </div>

            <div>
                <input type="text" name="advance_license" placeholder="advance_license">
            </div>

            <div>
                <button>Entry</button>
            </div>
        </fieldset>

        <!-- <p><a href="p_entry.php">UsersEntry</a></p> -->
        <p><a href="n_login.php">NurseLogin</a></p>
    </form>
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

    input,
    textarea {
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
        width: 200px;
    }

    /* .name {
        background-image: url(img/name.jpg);
    } */
</style>
<!--css-->

</html>