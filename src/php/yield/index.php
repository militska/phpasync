<?php


function printer()
{
    while (true) {
        (call_user_func_array(yield, []));
    }
}

$print = printer();


foreach (range(1, 2) as $step) {
    $print->send(function () use ($step) {
        sleep(2);
        file_put_contents
        (__DIR__ . '/all.log',
            date('d.m.Y H:i:s')
            . " hi. step " . $step . "\n"
            , FILE_APPEND);

        return true;
    });

}

foreach (range(1, 100) as $step) {
    sleep(1);
    echo "step = " . $step . " \n";
}
