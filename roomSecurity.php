<?php

if (!isset($_SESSION['login'])){
    header('location: login.php?notlogin');
};

if (!isset($_SESSION['id_room'])){
    header('location: room.php?notJoin');
};


