<?php
use PHPUnit\Framework\TestCase;
use a3\WorkSchedule;

class WorkScheduleTest extends TestCase
{

    function durations()
    {
        include __DIR__ . "/../schedule2.php";
        return $employeeWorkSchedule;
    }

    function durations3()
    {
        include __DIR__ . "/../schedule3.php";
        return $employeeWorkSchedule;
    }

    function durations4()
    {
        include __DIR__ . "/../schedule4.php";
        return $employeeWorkSchedule;
    }

    /**
     * @dataProvider durations
     */
    public function testDurations($name,$ss,$se,$dur,$dur_day,$dur_night)
    {
        $sch = new WorkSchedule($name,$ss,$se);       
        $this->assertEquals($dur,$sch->getDuration(),"Duration mismatch");
        $this->assertEquals($dur_day,$sch->getDayDuration('22:00','07:00'),"Day Duration mismatch for $ss <=> $se with 22-07");
        $this->assertEquals($dur_night,$sch->getNightDuration('22:00','07:00'),"Night Duration mismatch");
    }

    /**
     * @dataProvider durations3
     */
    public function testDurations3($name,$ss,$se,$dur,$dur_day,$dur_night)
    {
        $sch = new WorkSchedule($name,$ss,$se);       
        $this->assertEquals($dur,$sch->getDuration(),"Duration mismatch");
        $this->assertEquals($dur_day,$sch->getDayDuration('20:00','23:00'),"Day Duration mismatch for $ss <=> $se with 20-23");
        $this->assertEquals($dur_night,$sch->getNightDuration('20:00','23:00'),"Night Duration mismatch");
    }

    /**
     * @dataProvider durations4
     */
    public function testDurations4($name,$ss,$se,$dur,$dur_day,$dur_night)
    {
        $sch = new WorkSchedule($name,$ss,$se);       
        $this->assertEquals($dur,$sch->getDuration(),"Duration mismatch");
        $this->assertEquals($dur_day,$sch->getDayDuration('21:00','00:00'),"Day Duration mismatch for $ss <=> $se with 21-00");
        $this->assertEquals($dur_night,$sch->getNightDuration('21:00','00:00'),"Night Duration mismatch");
    }
}