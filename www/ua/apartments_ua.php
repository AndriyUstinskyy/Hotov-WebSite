<?php

require_once '../php/connection.php';
$s = $_GET['s'];
$f = $_GET['f'];
$c = $_GET['c'];
$cell_id = $s . $f;
$plan_array_query = mysqli_query($connection , "Select * from `apartments_db` where `sect` = $s AND `floor` = $f");
$plan_coords_array_query = mysqli_query($connection , "Select * from `coords_db` where `cell_id` = $cell_id");

$plan_array = mysqli_fetch_assoc($plan_array_query);
$apartment_number = 0;

$plan_src = $plan_array['src'];
$plan_width = $plan_array['width'];
$plan_height = $plan_array['height'];

//$apartment_number_array = [];

?>




<!doctype html>
<html>
<head>
    <title>Квартири - Новий Хотів</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/Call-icon.css" />
    <link rel="stylesheet" href="../css/Header.css" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/Content.css">
    <link rel="stylesheet" href="../css/styleforapartment.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=1.0, user-scalable=no">
</head>


<body>

<?php require "../php/header_ua.php" ?>

<main class="fon">



    <aside class="right-sidebar">

        <div class="map" >
            <a href=""><img class="map_img" width=<?php echo "$plan_width"?> height=<?php echo "$plan_height"?> usemap="#map" src=<?php echo"../img/plans/section$s/$plan_src"?>></a>
            <map class="map" name="map">
                <?php
                $i = 0;
                while ($plan_coords_array = mysqli_fetch_assoc($plan_coords_array_query)){
                    $apartment_number_array[$i] = $plan_coords_array['apartment_number'];

                    echo '<area shape="poly" class="area_item" alt="OKFR" title=""  coords="'.$plan_coords_array['coords'].'" href="apartments.php?s='.$s.'&f='.$f.'&c='.$plan_coords_array['coords'].'#popup1" target="" />';
                    $i = $i + 1;
                }

                ?>
                <area />
            </map>
        </div>
    </aside>

    <aside>
        <div class="compas" >
            <img src="../img/compas.png" width="250" height="280">
        </div>


        <aside class="left-sidebar">
            <hr>
            <div style="width: 100%;height: 100%;max-height: 200px;max-width: 40%">
                <div class="sectionChoseButtonBox">
                    <span class="sectionChoseButton__title">Секція:</span>
                    <a href="../php/apartments.php?s=1&f=1&c=abc" class="button27<?php if ($s == "1") echo ' active'; ?>">1</a>
                    <a href="../php/apartments.php?s=2&f=1&c=abc"  class="button27<?php if ($s == "2") echo ' active'; ?>">2</a>
                    <a href="../php/apartments.php?s=3&f=1&c=abc" class="button27<?php if ($s == "3") echo ' active'; ?>">3</a>
                    <a href="../php/apartments.php?s=4&f=1&c=abc"  class="button27<?php if ($s == "4") echo ' active'; ?>">4</a>
                    <a href="../php/apartments.php?s=5&f=1&c=abc"  class="button27<?php if ($s == "5") echo ' active'; ?>">5</a>
                </div>
            </div>
            <br>
            <div style="width: 100%;height: 100%;max-height: 200px;max-width: 40%">
                <div class="floorChoseButtonBox">
                    <span class="floorChoseButton__title">Поверх:</span>
                    <a href=<?php echo "../php/apartments.php?s=$s&f=1&c=abc" ?> class="button27<?php if ($f == "1") echo ' active'; ?>">1</a>
                    <a href=<?php echo "../php/apartments.php?s=$s&f=2&c=abc" ?> class="button27<?php if ($f == "2") echo ' active'; ?>">2</a>
                    <a href=<?php echo "../php/apartments.php?s=$s&f=3&c=abc" ?> class="button27<?php if ($f == "3") echo ' active'; ?>">3</a>
                    <a href=<?php echo "../php/apartments.php?s=$s&f=4&c=abc" ?> class="button27<?php if ($f == "4") echo ' active'; ?>">4</a>
                    <a href=<?php echo "../php/apartments.php?s=$s&f=5&c=abc" ?> class="button27<?php if ($f == "5") echo ' active'; ?>">5</a>
                    <a href=<?php echo "../php/apartments.php?s=$s&f=6&c=abc" ?> class="button27<?php if ($f == "6") echo ' active'; ?>">6</a>
                    <a href=<?php echo "../php/apartments.php?s=$s&f=7&c=abc" ?> class="button27<?php if ($f == "7") echo ' active'; ?>">7</a>
                </div>
            </div >
            <br>
            <br>
            <hr>
        </aside>
    </aside>

    <style>
        .button27:active{
            border-color:red ;
        }
    </style>

    <div id="popup1" class="overlay">
        <div class="popup">
            <?php
            $plan_coords_array_query2 = mysqli_query($connection , "Select * from `coords_db` where `cell_id` = $cell_id");

            while($plan_coords_array2 = mysqli_fetch_assoc($plan_coords_array_query2)){

                if($plan_coords_array2['coords'] == $c){
                    $number = $plan_coords_array2['apartment_number'];
                }

            }
            ?>
            <h2 class="head_img_apartments">Квартира №<?php
                echo $number?></h2>
            <a class="close" href="#">&times;</a>
            <div/>

            <img style="width:450px ; height: 500px; " src=<?php echo "../img/info/section$s/info$number.jpg" ?>>
        </div>

        <div/>
    </div>


    <style>
        .appDescr__countRoom { font-size: 1.5rem; font-size: 1.375rem; font-weight: 700; }

        .appDescr__totalArea, .appDescr__livingSpace { font-size: 1.25rem; font-weight: 700; }

        .appDescr__list { font-size: 1.25rem; }
        /*p {*/
        /*position: relative;*/
        /*left: 20%;*/
        /*top: -10%;*/
        /*font-size: 50px;*/
        /*color: #3c763d;*/
        /*opacity: 0.5;*/
        /*}*/

        .box {
            width: 100%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.2);
            padding: 35px;
            border: 2px solid #fff;
            border-radius: 20px/50px;
            background-clip: padding-box;
            text-align: center;
        }

        .button {
            font-size: 1em;
            padding: 10px;
            color: #fff;
            border: 2px solid #06D85F;
            border-radius: 20px/50px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease-out;
        }

        .button:hover {
            background: #06D85F;
        }

        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }
        .popup {
            margin: 70px auto;
            padding: 10px;
            background: #fff;
            border-radius: 20px;
            width: 40%;
            height: 80%;
            position: relative;
            transition: all 5s ease-in-out;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
            z-index: 1000;
        }

        .popup .close:hover {
            color: #06D85F;
        }

        .popup .content {
            max-height: 20%;
            overflow: auto;
        }

        @media screen and (max-width: 700px) {
            .box {
                width: 70%;
            }

            .popup {
                width: 70%;
            }
        }
        @media (max-width: 700px) {
            .box {
                width: 70%;
            }

            .popup {
                top:20%;
                width: 70%;
                height: 50%;
            }
            .overlay{
                zoom:55%;
            }
        }
    </style>
</main>




<div class="zero_module"></div>


<footer class="footer shadow" id="footer_contacts">

    <div class="contact">
        <div class="content">
            <ul class="socials">
                <li class="social">
                    <a href="contacts_ua.php#" target="_blank" class="email">
                        <i class="fas fa-map-marked-alt" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="social">
                    <a href="#" target="_blank" class="twitter">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="social">
                    <a href="#" target="_blank" class="linkedin">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="social">
                    <a href="javascript:window.location='tel:0991432327'">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
</footer>
<a class="scrollup" style="opacity: 0.379462;" href="#">Наверх</a>

<script type="text/javascript" src="../js/modernizr.custom.79639.js"></script>
<script src="//web-ptica.ru/VRV-files/jquery-2.1.3.min.js " type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });
        $('.scrollup').click(function () {
            $('html, body').animate({scrollTop: 0}, 600);
            return false;
        });
    });
</script>
<noscript>
    <link rel="stylesheet" type="text/css" href="../css/styleNoJS.css"/>
</noscript>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="../js/Slide.js"></script>
<script src="../js/main.js"></script>
<script type = "text/javascript">
    var button = document.getElementById("#button");
    button.onclick = function(){

        this.className = this.className == "" ? "hovered" : "";

    }

</script>


<script src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.maphilight.min.js"></script>
<script type="text/javascript">
    $(function () {
        jQuery('.map_img').maphilight({
            stroke : false,
            border: 0,
            fillColor: "5a5a5a",
            fillOpacity: 0.6,
            singleSelect: true
        });
    });
</script>
</div>
</body>
</html>
