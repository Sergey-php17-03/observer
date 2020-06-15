<?php

class TeamLead
{
    private $observers = [];
    public $mood;
    
    const GOOD_MOOD = 0;
    const NORMAL_MOOD = 1;
    const BAD_MOOD = 2;
    const TERRIBLE_MOOD = 3;
    
    protected $moodList = [
        self::GOOD_MOOD => self::GOOD_MOOD,
        self::NORMAL_MOOD => self::NORMAL_MOOD,
        self::BAD_MOOD => self::BAD_MOOD,
        self::TERRIBLE_MOOD => self::TERRIBLE_MOOD,
    ];
    
    protected $rules = [
        Junior::BAD_JOB => [
            self::GOOD_MOOD => self::NORMAL_MOOD,
            self::NORMAL_MOOD => self::BAD_MOOD,
            self::BAD_MOOD => self::TERRIBLE_MOOD,
            self::TERRIBLE_MOOD => self::TERRIBLE_MOOD,
        ],
        Junior::GOOD_JOB => [
            self::GOOD_MOOD => self::GOOD_MOOD,
            self::NORMAL_MOOD => self::GOOD_MOOD,
            self::BAD_MOOD => self::NORMAL_MOOD,
            self::TERRIBLE_MOOD => self::BAD_MOOD,
        ],
    ];

    public function __construct()
    {
        $rand = mt_rand(0, count($this->moodList) - 1);
        $this->mood = $this->moodList[$rand];
        $this->notify();
    }

    public function checkTask($result)
    {
        $this->mood = $this->rules[$result][$this->mood];
        $this->say($result);
        $this->notify();
    }
    
    public function say($result) {
        echo $result > 0
                ? "\nExelent, here it is the victory of the mind over a soulless machine!"
                : "\nThere is no hope for you.";

    }


    public function attachObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }
    
    public function detachObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }
    
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
    
}
