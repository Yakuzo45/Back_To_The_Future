<?php
/**
 * Created by PhpStorm.
 * User: wilder7
 * Date: 27/09/18
 * Time: 16:07
 */

require "TimeTravel.php";
$start = new DateTime('1985-12-31');
$end = new DateTime('1985-12-31');
$interval = new DateInterval('PT1000000000S');
$interval2 = new DateInterval('P1M1W1D');
$voyage = new TimeTravel($start,$end);

$voyage->findDate($interval);
echo $voyage->getTravelInfo();
$end = $voyage->getEnd();
$step = new DatePeriod($end, $interval2, $start,DatePeriod::EXCLUDE_START_DATE);
var_dump($voyage->backToFutureStepByStep($step));