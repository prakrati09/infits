<?php include('navbar.php');
$sql = "SELECT * FROM `default_recipes` WHERE drecipe_category LIKE 'sn%';";
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: "NATS", sans-serif !important;
        letter-spacing: 1px;
        font-weight: 400;
        position: relative;
    }

    .header {
        display: flex;
        flex-direction: row !important;
        margin: 10px;
        margin-left: 20px;
        justify-content: space-between;
        letter-spacing: 0em;
    }

    .searchbox {
        width: auto;
        width: 360px;
        height: 45px;
        background: #ffffff;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        padding: 10px;
    }

    .card {
        background: #FFFFFF;
        border-radius: 15.8334px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        margin: 20px;
    }

    .card-upper-text {
        font-size: 20px;
        font-weight: bold;
        padding: 5px 10px;
        background-color: #FEA945;
        box-shadow: 0px 0px 25px rgba(255, 255, 255, 0.75);
        border-radius: 8px;
        color: white;
        font-weight: 500;
        font-size: 12px;
        line-height: 18px;
    }

    .card-food {
        font-size: 23px;
        font-weight: 500;
        line-height: 27px;
        letter-spacing: -0.11428570002317429px;
        text-align: left;
        margin-top: -10px;

    }

    .card-calorie {
        font-size: 18px;
        font-weight: 400;
        line-height: 12px;
        letter-spacing: 0em;
        text-align: left;
        align-items: center;
        display: flex;
        color: #A3A1A1;
    }

    .card-num-circle {
        background: #9C74F5;
        border-radius: 50px;
        color: white;
        padding: 5px
    }

    .card-num {
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 18px;
        color: #9C74F5;
    }

    .recipe-container {
        display: flex;
        flex-wrap: wrap;
        gap: 35px;
        padding-left: 70px;
        padding-top: 25px;
    }

    @media screen and (min-width:720px) and (max-width:1500px) {
        .heading {
            justify-content: flex-start !important;
        }

        .header {
            display: flex;
            flex-direction: column !important;
            align-items: flex-start !important;
        }

        .header h4 {
            margin-top: 39px;
        }

        .searchbox {
            margin-left: 50px !important;
            margin-top: 10px;
            width: 350px;
            margin-bottom: 20px;
        }

        .card {
            margin: 20px auto !important;
        }

        .but {
            position: absolute !important;
        }
    }

    @media screen and (min-width:720px) and (max-width:920px) {
        .header {
            display: flex;
            flex-direction: column !important;
            align-items: flex-start !important;
        }

        .searchbox {
            margin-left: 40px;
        }
    }

    @media screen and (min-width:0px) and (max-width:720px) {
        .header {
            display: flex;
            flex-direction: column !important;
            align-items: flex-start !important;

        }

        .flex.row {
            margin: auto;
            margin-left: auto !important;
        }

        .card {
            margin: 10px auto !important;
        }

        .searchbox {
            margin-left: 14px !important;
        }

        .but {
            position: absolute !important;
        }

        .title {
            margin-left: 13px !important;
        }

        small {
            margin-left: 0rem !important;
        }

    }

    @media screen and (min-width:0px) and (max-width:420px) {
        .searchbox {
            width: 300px;
        }

    }
    </style>
</head>

<body>
    <div class="header" style="align-items:center;">
        <div class="title"
            style="font-size:40px;margin-left:2.8rem;margin-top:1.2rem;font-family:'NATS'; font-weight:400;">Recipes
            <small style="color: #787885; font-size:20px; margin-left:1rem;">All Snacks Recipes</small></div>
        <div style="margin-right:2rem;display:flex;gap:1.5rem">
            <div class="searchbox">
                <button style="background-color:white;border:none;" id="seabtn" name="seabtn"><img
                        src="<?=$DEFAULT_PATH?>assets/images/search_recipe.svg" alt=""></button>
                <input type="search" name="sinput" placeholder="Search"
                    style="border:none;font-size:20px;margin-left:1rem">
            </div>
        </div>
    </div>

    <div class="flex row">
        <?php while ($d = mysqli_fetch_assoc($res)) {
            $drecipe_recipe = explode(',', $d['drecipe_recipe']);
            $steps = count($drecipe_recipe);
            $drecipe_nutritional = $d['drecipe_nutritional information'];

            $drecipe_nutritional = trim($drecipe_nutritional, '{}');
            $pairs = explode(', ', $drecipe_nutritional);
            $nutritional = array();
            foreach ($pairs as $pair) {
                list($key, $value) = explode(': ', $pair);
                $key = trim($key, "'");
                $value = trim($value, "'");
                $nutritional[$key] = $value;
            }
        ?>
        <div class="card d-flex" style="padding:15px; width:325px; border-radius:16px;height:204px;margin:25px 40px;">
            <div class="card-upper d-flex justify-content-between">
                <p id="bu" class="card-upper-text"> Medium </p>
                <p id="bu" class="card-upper-text"><i class="fa-solid fa-clock"></i> 20:00 </p>
            </div>
            <div class="img-dis" style="width:100%; text-align:center;margin-top:-40px;">
                <img src="<?=$DEFAULT_PATH?>assets/images/snacks.svg" style="margin-top:-30px;height:144px; width:144px;  object-fit:cover;" />
            </div>
            <div class="d-flex justify-content-between">
                <p class="card-food"><?php echo $d['drecipe_name'] ?></p>
                <div class="header">
                    <div class="dropdown ">
                        <div id="myDropdownIcon" class="dropbtn" onclick="showDropdown(event)">
                            <img class="" src="<?=$DEFAULT_PATH?>assets/images/vertical-three-dots.svg" alt="" style="margin-top:-35px;">
                        </div>

                        <div id="myDropdownContent" class="dropdown-content dropdown-card " style="display:none;">
                            <a style="color: white;" class="edit-button" href="#">Edit</a>
                            <a style="color: white;" class="delete-button" href="#">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between" style="align-items:center;margin-top:-20px;">
                <p class="card-calorie"> <img src="<?=$DEFAULT_PATH?>assets/images/Calorie.svg" alt=""> <?php echo $nutritional['Calories'] ?>
                    kcal</p>
                <div class="d-flex align-items-center card-num">
                    <div class="card-num-circle"><?= $steps ?> </div> &nbsp;
                    <div class="">steps</div>
                </div>
            </div>
        </div>
        <?php } ?>
        <a class="butt" href="_create_recipe.php"
            style="border-radius:50%;background-color:#9C74F5;width:85px;height:85px;filter: drop-shadow(0px 0px 68px rgba(0, 0, 0, 0.3));color:white;font-size:60px;border:none;position:absolute;right:50px;bottom:60px;display:flex;justify-content:center;align-items:center;">+</a>
    </div>

    <?php require('constant/scripts.php'); ?>
    <script>
    function showDropdown(event) {
        var dropdown = event.currentTarget.parentNode.querySelector(".dropdown-content");
        dropdown.classList.toggle("show");
        setTimeout(removeDropDown, 5000);
    }

    function removeDropDown() {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            dropdowns[i].classList.remove('show');
        }
    }

    function removeDropdown(event) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show") && !openDropdown.contains(event.target)) {
                openDropdown.classList.remove("show");
            }
        }
    }
    </script>

</body>

</html>