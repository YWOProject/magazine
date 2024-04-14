<?php

$db = mysqli_connect('localhost','root','','magazine');

if(!$db) {
    die('DataBase error');
}