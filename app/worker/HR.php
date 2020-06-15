<?php
include_once dirname(__DIR__) . '/interfaces/Observer.php';

class HR implements Observer
{
    public $countRebuke = 0;
    public $preSubjectMood;


    public function update($subject) {
        if(isset($this->preSubjectMood) && $this->preSubjectMood === $subject::TERRIBLE_MOOD && $subject->mood === $subject::TERRIBLE_MOOD){
            $this->countRebuke++;            
        }
        $this->preSubjectMood = $subject->mood;
    }
    
    public function getCountRebuke() {
        return $this->countRebuke;
    }
}