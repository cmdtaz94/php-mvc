<?php

$dbConnection = null;

const FLASH = 'FLASH_MESSAGES';
const FLASH_ERROR = 'danger';
const FLASH_SUCCESS = 'success';

/**
 * Undocumented function
 *
 * @param string $path
 * @return string
 */
function baseUri(string $path = '')
{
    $baseUri = 'http://localhost/php-mvc/index.php';

    if ($path) {
        return $baseUri . '/' . $path;
    }

    return $baseUri;
}


function dbConnection()
{
    global $dbConnection;

    if (!$dbConnection) {
        $dsn = "mysql:dbname=phpmvc;host=127.0.0.1";

        try {
            $dbConnection = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            $dbConnection = null;
        }
    }

    return $dbConnection;
}


/**
 * Create a flash message 
 * 
 * @param string $message
 * @param string $type
 * @return void
 */
function createFlashMessage(string $message, string $type): void
{
    if (isset($_SESSION[FLASH][$type])) {
        unset($_SESSION[FLASH][$type]);
    }

    $_SESSION[FLASH][$type] = ['message' => $message, 'type' => $type];
}


/**
 * Display a flash message
 *
 * @param string $type
 * @return void
 */
function displayFlashMessage(string $type): void
{
    if (!isset($_SESSION[FLASH][$type])) {
        return;
    }

    $flashMessage = $_SESSION[FLASH][$type];

    unset($_SESSION[FLASH][$type]);

    echo formatFlashMessage($flashMessage);
}

/**
 * Display all flash messages
 *
 * @return void
 */
function displayAllFlashMessages(): void
{
    if (!isset($_SESSION[FLASH])) {
        return;
    }

    $flashMessages = $_SESSION[FLASH];

    unset($_SESSION[FLASH]);

    foreach ($flashMessages as $flashMessage) {
        echo formatFlashMessage($flashMessage);
    }
}

/**
 * Format a flash message
 *
 * @param array $flashMessage
 * @return string
 */
function formatFlashMessage(array $flashMessage): string
{
    return sprintf(
        '<div class="alert alert-%s" role="alert">%s</div>',
        $flashMessage['type'],
        $flashMessage['message']
    );
}
