<?php

interface iInquiry
{
    public function replytoInquiry();
    public function notifyinquiry($message,$subject);
}
interface iPackageReport
{
    public function addrecipientsReport();
    public function notifyreport();
}
interface iNewswire
{
    public function addrecipientsNewswire();
    public function notifynews();
}

?>