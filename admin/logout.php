<?php
Session_start();
Session_destroy();
header('Location: /Project/index.php');