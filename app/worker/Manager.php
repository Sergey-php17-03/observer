<?php
include_once dirname(__DIR__) . '/interfaces/Observer.php';

class Manager implements Observer
{
    public $countPraise = 0;
    public $preSubjectMood;


    public function update($subject) {
        if(isset($this->preSubjectMood) && $this->preSubjectMood === $subject::GOOD_MOOD && $subject->mood === $subject::GOOD_MOOD){
            $this->countPraise++;            
        }
        $this->preSubjectMood = $subject->mood;
    }
    
    public function getCountPraise() {
        return $this->countPraise;
    }
}