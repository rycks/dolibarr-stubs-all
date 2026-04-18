<?php

// Add extra fields
$sql = "SELECT name, label, type, param, fieldcomputed, fielddefault, fieldrequired FROM " . \MAIN_DB_PREFIX . "extrafields";
//print $sql;
$resql = $this->db->query($sql);