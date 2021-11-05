<?php 

define('DB_HOST','localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'jobsite');


define('APPROOT', dirname(__FILE__,2));
define('URLROOT', 'http://localhost/jobsite');
define('SITENAME', 'Jobsite');

if(isset($_SESSION['user'])){
    define('AUTH', true);
    define('GUEST', false);
}else{
    define('AUTH', false);
    define('GUEST', true);
}

