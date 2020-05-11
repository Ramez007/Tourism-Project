<?php

interface iInquiry
{
    public function replytoInquiry();
    public function notifyinquiry($message,$subject);
}
interface iNewswire
{
    public function sendnewswire();
    public function notifynewswire($message,$subject);
}

?>