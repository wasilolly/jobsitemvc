<?php

session_start();

function autoload($className)
{
    require_once 'libraries/' . $className . '.php';
}
spl_autoload_register('autoload');

require_once 'config/config.php';

$init = new Core;


function redirect($page = FALSE, $message = null, $message_type = null)
{
    if (is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }

    if ($message != null) {
        $_SESSION['message'] = $message;
    }

    if ($message_type != null) {
        $_SESSION['message_type'] = $message_type;
    }

    header('Location:' . $location);
    exit;
}

function displayMessage()
{
    if (!empty($_SESSION['message'])) {

        $message = $_SESSION['message'];

        if (!empty($_SESSION['message_type'])) {
            $message_type = $_SESSION['message_type'];

            if ($message_type == 'error') {
                echo '<div class="alert alert-danger">' . $message . '</div>';
            } else {
                echo '<div class="alert alert-success">' . $message . '</div>';
            }
        }
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } else {
        echo '';
    }
}
