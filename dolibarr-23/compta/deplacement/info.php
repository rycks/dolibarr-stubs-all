<?php

// Security check
$id = \GETPOSTINT('id');
$result = \restrictedArea($user, 'deplacement', $id, '');