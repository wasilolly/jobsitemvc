<?php 

/*require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';*/
function autoload($className)
{
    require_once 'libraries/'.$className.'.php';
}
spl_autoload_register('autoload');

require_once 'config/config.php';


$init = new Core;
