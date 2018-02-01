<?php

//if there is no constant defined called __CONFIG__,do not load this file
    if (!defined('__CONFIG__')) {
        exit('You do not have a config file');
    }

    //our config is bellow

//include bd php file
include_once "./classes/db.php";


