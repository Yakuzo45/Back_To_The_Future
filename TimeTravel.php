<?php
/**
 * Created by PhpStorm.
 * User: wilder7
 * Date: 27/09/18
 * Time: 16:07
 */


class TimeTravel extends \DateTime
{
    private $_start;
    private $_end;

    /**
     * TimeTravel constructor.
     *
     * @param $start
     * @param $interval
     */
    public function __construct($start,$end)
    {
        $this->_start = $start;
        $this->_end = $end;
    }

    public function getStart()
    {
        return $this->_start;
    }

    /**
     * @param mixed $start
     */
    public function setStart($start)
    {
        $this->_start = $start;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->_end;
    }

    /**
     * @param mixed $end
     */
    public function setEnd($end)
    {
        $this->_end = $end;
    }

    public function getTravelInfo()
    {
        $dateDiff = $this->_end->diff($this->_start);
        return $dateDiff->format("Il y a %Y années, %M mois, %D jours, %H heures, %I minutes et %S secondes entre les deux dates");
    }

    public function findDate(DateInterval $interval)
    {
        $this->_end->sub($interval);
    }

    public function backToFutureStepByStep(DatePeriod $step)
    {
        $period = [];
        foreach ($step as $key) {
            $period[] = $key->format('M-d-Y A g:i');
        }
        return $period;
    }
}