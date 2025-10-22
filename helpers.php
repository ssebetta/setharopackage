<?php

if (!function_exists('setharo')) {
    function setharo()
    {
        return app('setharo');
    }
}


// use Setharo\Facades\Setharo;

// if (!function_exists('setharo_send_error')) {
//     function setharo_send_error(string $content, array $metadata = [], string $severity = 'error') {
//         return Setharo::sendError($content, $metadata, $severity);
//     }
// }

// if (!function_exists('setharo_send_system_message')) {
//     function setharo_send_system_message(string $content, array $metadata = []) {
//         return Setharo::sendSystemMessage($content, $metadata);
//     }
// }
