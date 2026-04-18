<?php

$sql = "SELECT p.fk_opp_status as opp_status, cls.code, COUNT(p.rowid) as nb, SUM(p.opp_amount) as opp_amount, SUM(p.opp_amount * p.opp_percent) as ponderated_opp_amount";
$resql = $db->query($sql);