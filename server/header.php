<?php

require 'private.php';

header("Access-Control-Allow-Origin: $allow_origin");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

$json = file_get_contents('php://input');

