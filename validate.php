<?php
session_start();
date_default_timezone_set('Europe/Moscow');
$time_start = microtime(true);
$x = substr($_GET['x'], 0, 6);
$y = $_GET['y'];
$r = $_GET['r'];


function hit($x, $y, $r) {
    if ($x > 0 && $y > 0 && $y<(-$x+$r)){
        return true;
    }elseif ($x < 0 && $y < 0 && $y > -$r && $x > -$r/2){
        return true;
    }elseif ($x > 0 && $y < 0 && ($y*$y + $x*$x) < $r*$r){
        return true;
    }
}

function check_x($x){
    $flag = 0;
    $arr = array("-3", "-2", "-1", "0", "1", "2", "3", "4", "5");
    foreach ($arr as &$value) {
        if ($value == $x){
            $flag++;
        }
    }
    if ($flag==1){
        return true;
    }
    return false;

}

function check_yr($y, $r){
    $isOk = preg_match('/^-?\d+\.?\d*$/', $y) && preg_match('/^-?\d+\.?\d*$/', $r);
        if ($isOk) {
                if ($r > 2 && $r < 5 && $y > -3 && $y < 5) {
                    return true;
                }
        }
        return false;
}





$current_time = date('Y-m-d, H:i:s');
$session_time = number_format(microtime(true)-$time_start,5);

if (check_yr($y, $r) && check_x($x)) {
    $answer = [$x, $y, $r, hit($x, $y, $r) ? "Есть" : "Нет", $session_time];
    $_SESSION['history'][] = $answer;

    $_SESSION['time']['0'] = $current_time;
    $result = "<table>
            <tr><th>X</th><th>Y</th><th>R</th><th>Попадание</th><th>Время работы:</th></tr>";
    foreach ($_SESSION['history'] as $line) {
        $result.="<tr>
                        <td>$line[0]</td>
                        <td>$line[1]</td>
                        <td>$line[2]</td>
                        <td>$line[3]</td>
                        <td>$line[4]</td>
                  </tr>";
    }
    $result = "<label>Текущая дата и время: $current_time </label>".$result;
    $result.="</table>";
    $_SESSION['table'] = $result;
    header('Location: https://se.ifmo.ru/~s334271/table.php');

}else{
    header('Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ');
}


