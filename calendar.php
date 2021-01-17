<?
function build($month){
    if($month==1){
        $daysPrev = date("t", mktime(0,0,0,12,1,2019));
    }
        
    else if($month==12){
        $daysPrev = date("t", mktime(0,0,0,11,1,2020));
    }
    else{
        $daysPrev = date("t", mktime(0,0,0,$month-1,1,2020));
    }
    $days = date("t", mktime(0,0,0,$month,1,2020));
    $maxWeek = 6;
    echo "<table style='background-color:gray'>";

    $dayOfWeekPrevMonth=0;
    if(date("w", mktime(0,0,0,$month,1,2020))==0)
    $dayOfWeekPrevMonth = 7;
    else
    $dayOfWeekPrevMonth = date("w", mktime(0,0,0,$month,1,2020));
    $daysPrev-=$dayOfWeekPrevMonth-1;
    $day = 1;
    $dayNextMonth=1;
    for ($i=0; $i < $maxWeek; $i++) {
        echo "<tr>";
        
        for ($j=0; $j < 7; $j++) {
            if($dayOfWeekPrevMonth>1){
                echo "<td style='width: 40px; height: 40px; background-color: #ccc; color: #000;'>".(++$daysPrev)."</td>";
                $dayOfWeekPrevMonth-=1;
            }
            else if ($day<=$days){
                echo "<td style='width: 40px; height: 40px; background-color: #303030; color: #eee;'>".($day)."</td>";
                $day++;
            }
            else{
                echo "<td style='width: 40px; height: 40px; background-color: #ccc; color: #000;'>".($dayNextMonth++)."</td>";
            }
        }
        
        $dayNum = date("w", mktime(0,0,0,$month,$i,2020));
        echo "</tr>";
    }
    echo "</table>";
}
build(12);
?>