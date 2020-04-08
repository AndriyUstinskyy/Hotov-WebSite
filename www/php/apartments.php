<?php

require 'connection.php';
$s = $_GET['s'];
$f = $_GET['f'];
$c = $_GET['c'];
$cell_id = $s . $f;
$plan_array_query = mysqli_query($connection , "Select * from `apartments_db` where `sect` = $s AND `floor` = $f");
$plan_coords_array_query = mysqli_query($connection , "Select * from `coords_db` where `cell_id` = $cell_id");

$plan_array = mysqli_fetch_assoc($plan_array_query);
$apartment_number = 0;

$number = 0;

$plan_src = $plan_array['src'];
$plan_width = $plan_array['width'];
$plan_height = $plan_array['height'];

//$apartment_number_array = [];

$info = array("Хол" , "Хол(2)" , "Гардероб" , "Гардероб(2)" , "Гардероб(3)" , "Вітальня" , "Кухня" ,  "Санвузол" , "Санвузол(2)" , "Спальня" ,"Спальня(2)","Спальня(3)","Спальня(4)" , "Кладова","Коридор","Ванна","Тераса","Лоджія" , "Лоджія(2)" , "Лоджія(3)",  "Загальна площа" );
$info_eng = array("Hall" , "Hall(2)" , "Wardrobe" , "Wardrobe(2)" , "Wardrobe(3)" , "Living_room" , "Kitchen" ,  "Lavatory" , "Lavatory(2)" , "Bedroom" ,"Bedroom(2)","Bedroom(3)","Bedroom(4)" ,"Pantry","Passage","Bath","Terrace","Loggia" , "Loggia(2)" , "Loggia(3)",  "Total area" );

?>



<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Квартиры - Новый Хотов</title>
    <link rel="stylesheet" href="../css/Call-icon.css" />
    <link rel="stylesheet" href="../css/Header.css" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/Content.css">
    <link rel="stylesheet" href="../css/styleforapartment.css">								    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=1.0, user-scalable=no">
</head>


<body>

<header>
    <div class="container-1">
        <div class="logo"><a href="../ru/index_ru.html"><img src="../img/logo-black1.png"></a></div>
        <nav class="site-nav">
            <ul>
                <li><a href="../ru/about.php"><i class="fa fa-info site-nav--icon"></i>О нас</a></li>
                <li><a href="../php/apartments.php?s=1&f=1&c=abc"><i class="fa fa-usd site-nav--icon"></i>Квартиры</a></li>
                <li><a href="../ru/contacts.html"><i class="fa fa-envelope site-nav--icon"></i>Контакты</a></li>
            </ul>
        </nav>
        <ul class="lang-switcher lang-switcher--rounded-pill">
            <li><a href="../ru/index_ru.html" >RU</a></li>
            <li><a href="../index.html" >UA</a></li>
        </ul>

        <div class="menu-toggle">
            <div class="hamburger"></div>
        </div>

    </div>
</header>


<main class="fon">



    <aside class="right-sidebar">
        <h2><?php echo "Секція $s"?></h2>
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
            <a href="" ><img class="map_img" style="background-repeat: no-repeat" style=border-radius:10px;" src="../img/img-hotov-min_2.png" usemap="#map1" width="520" height="320" ></a>
            <map class="map1" name="map1">
                <area shape="poly" class="area_item<?php if ($s == "1") echo ' active'; ?>"  alt="OKFR" title=""  href="apartments.php?s=1&f=1&c=abc" coords="212,178,232,177,232,185,233,185,233,193,232,193,232,203,234,204,234,211,211,211,211,205,212,205,212,191,211,192,211,187,212,187"/>
                <area shape="poly" class="area_item<?php if ($s == "2") echo ' active'; ?>" alt="OKFR" title=""  href="apartments.php?s=2&f=1&c=abc" coords="213,211,232,211,232,226,233,226,233,245,234,245,234,256,233,256,233,267,234,267,234,275,232,275,233,281,211,281,211,275,213,275,213,262,212,262,212,226,210,226,210,218,213,218"/>
                <area shape="poly" class="area_item<?php if ($s == "3") echo ' active'; ?>" alt="OKFR" title="" href="apartments.php?s=3&f=1&c=abc" coords="211,283,231,283,232,297,236,297,236,310,221,311,221,317,190,317,190,316,183,316,183,293,190,293,190,294,211,294"/>
                <area shape="poly" class="area_item<?php if ($s == "4") echo ' active'; ?>" alt="OKFR" title="" href="apartments.php?s=4&f=1&c=abc" coords="119,293,126,293,126,296,175,296,175,294,181,294,182,316,176,316,176,317,168,317,167,316,157,316,157,317,144,317,144,316,134,316,134,317,126,317,126,316,119,316"/>
                <area shape="poly" class="area_item<?php if ($s == "5") echo ' active'; ?>" alt="OKFR" title="" href="apartments.php?s=5&f=1&c=abc" coords="86,150,93,150,93,148,100,148,100,149,111,149,111,147,123,147,123,149,135,149,135,147,140,147,140,150,148,150,148,171,142,171,142,168,93,168,93,171,86,171"/>
            </map>
        </div>
    </aside>
    <aside class = "phoneslider">
        <div class="slider" id="main-slider"><!-- outermost container element -->
            <div class="slider-wrapper"><!-- innermost wrapper element -->
                <!--                    <img src="../img/Hotovs1.png" alt="First" class="slide" />-->
                <img class="slide map_img"  src="../img/Hotovs2.png"  usemap="#map2" width="236" height="159" alt="First" >
                <!--                    <img src="../img/Hotovs2.png" alt="Second" class="slide" />-->
                <!--                    <img src="../img/Hotovs3.png" alt="Third" class="slide" />-->
                <!--                    <img src="../img/Hotovs4.png" alt="Fourth" class="slide" />-->
            </div>

            <!--                <div class="slider-nav">-->
            <!--                    <button class="slider-previous">Previous</button>-->
            <!--                    <button class="slider-next">Next</button>-->
            <!--                </div>-->
            <map class="map2" name="map2">
                <area shape="poly" class="area_item<?php if ($s == "1") echo ' active'; ?>"  alt="OKFR" title=""  href="apartments.php?s=1&f=1&c=abc" coords="212,18,231,18,231,50,212,50,210,50,210,45,212,44,212,32,210,32,210,27,212,27,233,25,233,33,231,34,231,44,233,44,233,50,230,50">
                <area shape="poly" class="area_item<?php if ($s == "2") echo ' active'; ?>" alt="OKFR" title=""  href="apartments.php?s=2&f=1&c=abc" coords="213,52,231,52,232,122,212,122,210,115,212,115,213,102,212,102,212,67,209,65,209,59,212,58,233,67,234,73,232,74,232,85,233,86,234,95,232,96,232,108,233,108,234,114,231,115"/>
                <area shape="poly" class="area_item<?php if ($s == "3") echo ' active'; ?>" alt="OKFR" title="" href="apartments.php?s=3&f=1&c=abc" coords="212,124,230,124,230,138,235,138,235,149,221,151,219,156,191,157,190,155,183,155,183,135,185,132,189,133,190,134,211,134"/>
                <area shape="poly" class="area_item<?php if ($s == "4") echo ' active'; ?>" alt="OKFR" title="" href="apartments.php?s=4&f=1&c=abc" coords="118,134,125,134,118,137,125,137,174,137,174,133,181,134,181,136,181,155,175,155,175,156,168,156,167,155,157,155,156,157,145,157,145,155,134,155,133,157,126,157,125,155,119,156"/>
                <area shape="poly" class="area_item<?php if ($s == "5") echo ' active'; ?>" alt="OKFR" title="" href="apartments.php?s=5&f=1&c=abc" coords="147,20,147,40,142,41,141,38,129,38,128,40,105,40,105,38,93,37,92,41,85,41,86,20,92,20,93,19,99,18,99,20,111,20,111,18,121,18,121,19,134,20,134,17,139,18,140,20,146,21"/>
            </map>
        </div>
        <style>
            @media (min-width: 1245px) {
                .phoneslider{
                    display: none;
                }
            }
            @media (max-width: 800px) {
                .phoneslider{
                    position: relative;
                    top: 90%;
                    right:3%;
                }

            }
        </style>
    </aside>


    <aside class="left-sidebar">
        <div>
            <div class="floorChoseButtonBox">
                <span class="floorChoseButton__title">Этаж:</span>
                <a href=<?php echo "apartments.php?s=$s&f=1&c=abc" ?> class="button27<?php if ($f == "1") echo ' active'; ?>">1</a>
                <a href=<?php echo "apartments.php?s=$s&f=2&c=abc" ?> class="button27<?php if ($f == "2") echo ' active'; ?>">2</a>
                <a href=<?php echo "apartments.php?s=$s&f=3&c=abc" ?> class="button27<?php if ($f == "3") echo ' active'; ?>">3</a>
                <a href=<?php echo "apartments.php?s=$s&f=4&c=abc" ?> class="button27<?php if ($f == "4") echo ' active'; ?>">4</a>
                <a href=<?php echo "apartments.php?s=$s&f=5&c=abc" ?> class="button27<?php if ($f == "5") echo ' active'; ?>">5</a>
                <a href=<?php echo "apartments.php?s=$s&f=6&c=abc" ?> class="button27<?php if ($f == "6") echo ' active'; ?>">6</a>
                <a href=<?php echo "apartments.php?s=$s&f=7&c=abc" ?> class="button27<?php if ($f == "7") echo ' active'; ?>">7</a>
            </div>
        </div >
    </aside>



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

            <h2 class="head_img_apartments">
                <?php
                if($f>1)
                    echo 'Квартира №' . $number;
                else
                    echo 'Офісне приміщення №' . $number;
                ?></h2>
            <a class="close" href="#">&times;</a>


            <img style="width:auto ; height: 60%; display: block;margin-left: auto;margin-right: auto;  " src=<?php if($f>1)echo "../img/info/section$s/info$number.jpg"; else echo "../img/info/section$s/info$number(0).jpg"; ?>>

            <div class="explain">
                <?php
                if($f>1){
                    $number1 = "'$number'";
                    $plan_info_array_query = mysqli_query($connection , "Select * from `apartments_info_db` where `apartment_number` = $number1 ");
                    $plan_info_array = mysqli_fetch_assoc($plan_info_array_query);
                    $i = 0;
                    while ($i < count($info)){

                        if($plan_info_array[$info_eng[$i]] > 0){
                            if($info[$i]  == "Загальна площа"){
                                echo '<b>' .$info[$i] .'</b>' . " - ";
                                echo '<b>'.$plan_info_array[$info_eng[$i]] .'<b>';
                                echo ' '.'M'.'&sup2';

                                echo '</br>';

                            }
                            else {
                                echo $info[$i] . " - ";
                                echo $plan_info_array[$info_eng[$i]];
                                echo ' '.'M'.'&sup2';
                                echo '</br>';
                            }

                        }
                        $i++;

                    }
                }

                ?>
            </div>
        </div>
    </div>

    <style>
        .explain {
            position: absolute;
            bottom: 3%;
            -webkit-column-width: 200px;
            -moz-column-width: 200px;
            column-width: 200px;
            -webkit-column-count: 3;
            -moz-column-count: 3;
            column-count: 3;
            -webkit-column-gap: 30px;
            -moz-column-gap: 30px;
            column-gap: 30px;
            -webkit-column-rule: 1px solid #ccc;
            -moz-column-rule: 1px solid #ccc;
            column-rule: 1px solid #ccc;
            font-size: 20px;
        }
        @media screen and (max-width: 700px) {
            .explain{
                position: absolute;
                /*top:77%;*/
                max-height: 50%;
                -webkit-column-width: 200px;
                -moz-column-width: 200px;
                /*column-width: 200px;*/
                -webkit-column-count: 4;
                -moz-column-count: 4;
                column-count: 4;
                -webkit-column-gap: 10px;
                -moz-column-gap: 10px;
                column-gap: 10px;
                -webkit-column-rule: 1px solid #ccc;
                -moz-column-rule: 1px solid #ccc;
                column-rule: 1px solid #ccc;
                font-size: 18px;
                padding: 0 1%;

            }
        }

    </style>

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
            height: 84%;
            position: relative;
            transition: all 2s ease-in-out;
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
        @media (max-width: 1000px) {
            .popup {
                top:10%;
                width: 80%;
                height: 60%;
            }
        }

        @media (max-width: 700px) {
            .box {
                width: 70%;
            }

            .popup {
                top:10%;
                width: 80%;
                height: 70%;
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
                    <a href="/ru/contacts.php" target="_blank" class="email">
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
                    <a target="_blank" type="button" onclick="javascript:window.location='tel:0991432327'">
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
<style>

    .slider {
        width: 236px;
        height: 159px;
        position: relative;
        top:-250px;
        left: 3%;
        /*left: 70%;*/
        /*top:13%;*/
        margin-left: auto;
        margin-right: auto;

    }

    .slider-wrapper {
        width: 100%;
        height: 100%;
    }

    .slide {
        float: left;
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        left:0%;
        transition: opacity 500ms linear;
    }

    .slider-wrapper > .slide:first-child {
        opacity: 1;
    }

    .slider-nav {
        height: 40px;
        width: 100%;
        margin-top: 1.5em;
    }

    .slider-nav button {
        border: none;
        display: block;
        width: 40px;
        height: 40px;
        cursor: pointer;
        text-indent: -9999em;
        background-color: transparent;
        background-repeat: no-repeat;
    }

    .slider-nav button:focus {
        outline-style: none;
    }

    .slider-nav button.slider-previous {
        float: left;
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NTc3MiwgMjAxNC8wMS8xMy0xOTo0NDowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QTc2QkYxMDcyRUNEMTFFNDk4RTdGNTFGNjdGRjYzREYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QTc2QkYxMDgyRUNEMTFFNDk4RTdGNTFGNjdGRjYzREYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBNzZCRjEwNTJFQ0QxMUU0OThFN0Y1MUY2N0ZGNjNERiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBNzZCRjEwNjJFQ0QxMUU0OThFN0Y1MUY2N0ZGNjNERiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PucyzUQAAAI7SURBVHja1JlNK0RRGMfPXEphksb7y8JLUhZKUj6B3WyUJMonIMuxm4XyUljMN6BBKQsR8wVsJDZYDBZGUTY2pDD+Z/rfuqTcuee5M3ee+jV17j3/+7/33Puc55wJKe8xDEbAIGgETaCNxzLgETyBU3AMTrxcJJTn+e1gDkyBOrZdgDR4ALds66TZLtDPtmewAdbAvRKOCFgCWfAOdsE0CLvoG+a5u+ybpVZEytw4RTWroMFAq4Eatt64qbkFCu2BbsER6aZmltfIOyyHQEz5FzHHA7Dy6WibG1X+x6jDpKtYZIeoKlxEec1Ft3cTV4WP+H+jptPBF0ip4kWKHv5MX8u8g5YiGmyhh+XfB5p5IKGKHwl6aXY2roMPlzODm9DiK5yf840wvaw7G1/AvpC5CnDDp9DqUWOfnnIxQLEJAXP1rGTeQI+BzgQ9Ddif9yeoMTSnh+aKwv2GWjX0lEt3R+DcULAa3NFcr9Croj0dWSx70oal2Bk/jD5wLWRQv8cRi1/ag0eRWo6ALkyHwKVgusnYWUAPy4xHkUP27/AhH85qbctQJMnfeb+ydjkfZZfH/ptMqlugSihVKce6JlPO1VergdA2J/gd3vCYkME2ehNJMzom+T4mJdOMZKJ2LrC2JRO15FSnOMRa7wBUSkx10sWC4jr41eDj+1Es+FFu2RmiTKrcCnzBGviSvyQWTYFfdpbEwr0ktj5KYvPIjsBuv/01vwZyA9O57ijKFnDgN9FDBk+1IH9DfAswAH+nuqbSIF3xAAAAAElFTkSuQmCC');
        display: none;

    }

    .slider-nav button.slider-next {
        float: right;
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NTc3MiwgMjAxNC8wMS8xMy0xOTo0NDowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QTc2QkYxMDMyRUNEMTFFNDk4RTdGNTFGNjdGRjYzREYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QTc2QkYxMDQyRUNEMTFFNDk4RTdGNTFGNjdGRjYzREYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBNzZCRjEwMTJFQ0QxMUU0OThFN0Y1MUY2N0ZGNjNERiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBNzZCRjEwMjJFQ0QxMUU0OThFN0Y1MUY2N0ZGNjNERiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PggGK0EAAAIwSURBVHja1JlNK0RRHMbPXFNKJgnjZcYCk5SFkpRPYGcjTKJ8ArIcOwvlpbyUb6AmacpChC9gI7HBwrAwirKxIYXxnOm5dWdSZu75z8ydp36N7p3z3OfeM/ec/zn8yr2GwDAYAM2gBYR5LgWewQs4ByfgzM1FfAV+vx3Mg2nQyGNXIMlQ9zzWCUIgAvp47BXsgA3wqITVAFZAGnyCBJgBgTzaBvjdBNum6dUgFS5KU806CBp4Belh+0VNwy3RaJ/dJaUIPdO8RsGyHAYxVTzFHA/AKqShHW5UFV+jjpB5aZkNRlTpNMJrLud7N4uq9Fr8r9f0cPADTlX5dMoMfw5fq7yDtjIGbGOG1dwTrTyxrcqvbWZpdR7cBF95zgy50nPwWq6hgQLMsuk8+AYOXBqGeMd6Pq4WCnnATBn18wKTBobd4IMFQ5NAwElm6rdf729QZ2jaR9Mblz8Vp+qYKTPcHYNLoa7pYcgHUGvopTMdWyx7kkIBb0EvX5gLw5LqTre3+BamBIeJazAIutg79S59npgt0yVzRRjPOuh95LL9rG5vqeJpgZ9xUyO9PtgSDhcXqJh1pkc/V19hwXB7YAxM8G+3CjGb6DBjP7kpAa9LZhMbqHelFkK5A7XpVFcDDukxLtQTWVOdabGgx7t3rn2llFUsmJZbVcAvGO7PcsvzBavnS/6KWDR5ftlZEQv3itj6qIjNI1ue3X5zytMbmLbKtgXs+U10n8FTLcm/IX4FGADop7oo5vCO1wAAAABJRU5ErkJggg==');
    }

</style>
<script type="text/javascript" src="//cdn.callbackhunter.com/cbh.js?hunter_code=8722e37ca37f1f601fc73d41bff9c589" charset="UTF-8"></script>
<script>
    (function() {

        function Slideshow( element ) {
            this.el = document.querySelector( element );
            this.init();
        }

        Slideshow.prototype = {
            init: function() {
                this.wrapper = this.el.querySelector( ".slider-wrapper" );
                this.slides = this.el.querySelectorAll( ".slide" );
                this.previous = this.el.querySelector( ".slider-previous" );
                this.next = this.el.querySelector( ".slider-next" );
                this.index = 0;
                this.total = this.slides.length;

                this.actions();
            },
            _slideTo: function( slide ) {
                var currentSlide = this.slides[slide];
                currentSlide.style.opacity = 1;

                for( var i = 0; i < this.slides.length; i++ ) {
                    var slide = this.slides[i];
                    if( slide !== currentSlide ) {
                        slide.style.opacity = 0;
                    }
                }
            },
            actions: function() {
                var self = this;
                self.next.addEventListener( "click", function() {
                    self.index++;
                    self.previous.style.display = "block";

                    if( self.index == self.total - 1 ) {
                        self.index = self.total - 1;
                        self.next.style.display = "none";
                    }

                    self._slideTo( self.index );

                }, false);

                self.previous.addEventListener( "click", function() {
                    self.index--;
                    self.next.style.display = "block";

                    if( self.index == 0 ) {
                        self.index = 0;
                        self.previous.style.display = "none";
                    }

                    self._slideTo( self.index );

                }, false);
            }


        };

        document.addEventListener( "DOMContentLoaded", function() {

            var slider = new Slideshow( "#main-slider" );

        });


    })();

</script>
</div>
</body>
</html>
