<?php
$targetId =  $this->security->xss_clean($userInfo->userId);
$ppic = $userInfo->ppic == '' ? base_url('assets/dist/img/avatar.png') : $ppic;
$fname = $this->security->xss_clean($userInfo->firstName);
$lname =  $this->security->xss_clean($userInfo->lastName);
$email =  $this->security->xss_clean($userInfo->email);
$mobile =  $this->security->xss_clean($userInfo->mobile);
$roleId =  $this->security->xss_clean($userInfo->roleId);
$total =  $this->security->xss_clean($accountInfo);
$pmtType =  $this->security->xss_clean($userInfo->pmtType);
$pmtAccount = $this->security->xss_clean($userInfo->pmtAccount);
?>
