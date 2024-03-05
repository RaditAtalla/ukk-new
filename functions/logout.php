<?php
session_start();
session_destroy();

header("location: ../peminjam/login.php");