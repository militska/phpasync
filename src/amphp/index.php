<?php
require __DIR__."/../../vendor/autoload.php";

use Amp\Loop;

function tick()
{
    echo "tick\n";
}


function defer()
{
    echo "defer";
}

echo "-- before Loop::run()\n";

Loop::run(function () {
    Loop::repeat($msInterval = 1000, "tick");
    Loop::delay($msDelay = 5000, "Amp\\Loop::stop");
    Loop::defer('defer');
});

echo "-- after Loop::run()\n"

?>;