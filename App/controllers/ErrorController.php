<?php

namespace App\Controllers;

/**
 * Error controller
 */
class ErrorController
{
    /**
     * Show a 404 page
     * 
     * @param string $message
     * @return void
     */
    public static function notFound($message = 'Resource not found')
    {
        http_response_code(404);
        loadView('error', ['status' => '404', 'message' => $message]);
    }

    /**
     * Show a 403 page
     * 
     * @param string $message
     * @return void
     */
    public static function unauthorized($message = 'Access denied')
    {
        http_response_code(403);
        loadView('error', ['status' => '403', 'message' => $message]);
    }
}
