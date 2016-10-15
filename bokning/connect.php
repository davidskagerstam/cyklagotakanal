<?php
$connect = mysqli_connect("cyklagotakanal.se.mysql", "cyklagotakanal_", "nvmTyjQU", "cyklagotakanal_");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}
?>