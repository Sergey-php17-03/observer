<?php

interface Observer
{

    public function attachObserver();    
    public function detachObserver();    
    public function notify();    
}