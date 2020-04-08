<?php
$number1 = "'$number'";
$plan_info_array_query = mysqli_query($connection , "Select * from `apartments_info_db` where `apartment_number` = $number1 ");
$plan_info_array = mysqli_fetch_assoc($plan_info_array_query);
$i = 0;
while ($i < count($info)){

    if($plan_info_array[$info[$i]] > 0){
        echo $info[$i] . "-";
        echo $plan_info_array[$info[$i]];
        echo '</br>';
    }

    $i = $i +1;
}
?>
