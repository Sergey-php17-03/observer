<?php
require 'app/worker/Junior.php';
require 'app/worker/TeamLead.php';
include 'app/worker/HR.php';
include 'app/worker/Manager.php';

$jun = new Junior();
$t70 = new TeamLead();
$t1000 = new HR();
$t1001 = new Manager();

$t70->attachObserver($t1000);
$t70->attachObserver($t1001);

$countTasks = $argv[1] ?: 20; 
echo "start $countTasks tasks";

for ($i = 0; $i < $countTasks; $i++) {

    $result = $jun->doTheTask();
    echo "\nTask #" . ($i+1) . " TeamLead comment: ";
    $t70->checkTask($result);
    echo "\n";
}
echo "\nfinished $countTasks tasks";
echo "\n total Rebukes: " . $t1000->getCountRebuke();
echo "\n total Praises: " . $t1001->getCountPraise();

