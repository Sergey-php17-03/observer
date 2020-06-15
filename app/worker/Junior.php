<?php

class Junior
{
    const BAD_JOB = 0;
    const GOOD_JOB = 1;
    
    protected $results = [
        self::BAD_JOB => self::BAD_JOB,
        self::GOOD_JOB => self::GOOD_JOB,
    ];

    public function doTheTask()
    {
        $rand = mt_rand(0, count($this->results) - 1);
        return $this->results[$rand];
    }
    
}