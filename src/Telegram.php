<?php


function getLink($msg)
{
    return sprintf("https://api.telegram.org/%s/sendMessage?chat_id=%d&text=%s", getenv('BOT_KEY'), getenv('CHAT_ID'), $msg);
}