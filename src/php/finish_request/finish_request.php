<?php

echo "start";

fastcgi_finish_request();

//while (true) {
//    echo "start \n";
//}


for ($i=1; $i<=222; $i++) {
    sleep(2);
    echo "start \n";
    sleep(1);

}

sleep(300);
