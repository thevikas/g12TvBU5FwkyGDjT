<?php
namespace a3;

class WorkSchedule
{
    private $name;
    private $shiftStart;
    private $shiftEnd;
    function __construct($name,$shiftStart,$shiftEnd)
    {   
        $this->name = $name;
        $this->shiftStart = $shiftStart;
        $this->shiftEnd = $shiftEnd;        

        $this->shiftStart = strtotime("2000-01-01 " . $shiftStart);
        $this->shiftEnd = strtotime("2000-01-01 " . $shiftEnd);
        if($this->shiftEnd < $this->shiftStart)
            $this->shiftEnd = strtotime("+1 day",$this->shiftEnd);                        

    }

    /**
     * Duration of shift in hours:mins format
     */
    function getDuration()
    { 
        $diff_mins = ($this->shiftEnd - $this->shiftStart)/60;
        $diff_hours = intval($diff_mins/60);
        $diff_mins = $diff_mins % 60;
        return sprintf("%02d:%02d",$diff_hours,$diff_mins);
    }

    /**
     * Get duration of the shift during day time
     */
    function getDayDuration($nightStart,$nightEnd)
    {
        $ns = strtotime("2000-01-01 " . $nightStart);
        $ne = strtotime("2000-01-01 " . $nightEnd);
        if($ne < $ns)
            $ne = strtotime("+1 day",$ne);                
            
        $diff_day_mins = 0;
        //check diff day part 1 from shift shart to min(shift end,night start)
        if($this->shiftStart < $ns)
            $diff_day_mins = (min($this->shiftEnd,$ns) - $this->shiftStart)/60;
        //if shift end is > night end
        if($this->shiftEnd > $ne)
        //check diff day part 2 from night end to shift end
        $diff_day_mins += ($this->shiftEnd - $ne)/60;
        
        $diff_hours = intval($diff_day_mins/60);
        $diff_mins = $diff_day_mins % 60;
        return sprintf("%02d:%02d",$diff_hours,$diff_mins);

    }

    /**
     * Get duration of the shift during night time
     */
    function getNightDuration($nightStart,$nightEnd)
    {
        $ns = strtotime("2000-01-01 " . $nightStart);
        $ne = strtotime("2000-01-01 " . $nightEnd);
        if($ne < $ns)
            $ne = strtotime("+1 day",$ne);                
                
        //if shift end is < night start = no night
        if($this->shiftEnd < $ns)
            return '00:00';
        //check diff night part from night start to min(shift end,night end)
        $diff_night_mins = (min($this->shiftEnd,$ne) - max($ns,$this->shiftStart))/60;
        
        $diff_hours = intval($diff_night_mins/60);
        $diff_mins = $diff_night_mins % 60;
        return sprintf("%02d:%02d",$diff_hours,$diff_mins);

    }
}
