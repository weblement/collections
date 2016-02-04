<?php
require(__DIR__ . '/vendor/autoload.php');

$assoc = [
    'a' => 1,
    'b' => 2,
    'c' => 3
];

$assoc2 = [
    'x' => 'z',
    'a' => 1,
    'b' => 2,
    'z' => 2,
    'c' => 3
];

$arr = [1,2,3,4,5];

$queue1 = new ezosoft\collections\Queue($assoc);
$queue2 = new ezosoft\collections\Queue([4,5,6]);

$queuex = new ezosoft\collections\Queue([4,5,6]);

$queue3 = new ezosoft\collections\Queue($arr);
$queue3->add($queue2);

var_dump($queue3->contains($queuex));