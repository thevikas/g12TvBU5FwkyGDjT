<?php
require_once 'autoload.php';
use a3\WorkSchedule;
require_once "schedule.php";

fputcsv(STDOUT,['Name','Shift Start','Shift End','Duration','Day Duration','Night Duration']);
foreach($employeeWorkSchedule as $emp)
{
    $ss = strtotime("2000-01-01 " . $emp['shiftStart']);
    $se = strtotime("2000-01-01 " . $emp['shiftEnd']);
    
    $sch = new WorkSchedule($emp['name'],$emp['shiftStart'],$emp['shiftEnd']);
    
    fputcsv(STDOUT,[$emp['name'],$emp['shiftStart'],$emp['shiftEnd'],
                $sch->getDuration(),
                $sch->getDayDuration($settingsNightTimeStart,$settingsNightTimeEnd),
                $sch->getNightDuration($settingsNightTimeStart,$settingsNightTimeEnd)]);
}
