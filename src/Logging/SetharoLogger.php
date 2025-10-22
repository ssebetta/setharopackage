<?php

namespace Setharo\Logging;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Setharo\Setharo;

class SetharoLogger extends AbstractProcessingHandler
{
    protected Setharo $setharo;

    public function __construct($level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);

        $this->setharo = app('setharo');
    }

    protected function write(array $record): void
    {
        $message = $record['message'];
        $context = $record['context'] ?? [];

        // Send log to Setharo
        $this->setharo->sendError($message, strtolower($record['level_name']), $context);
    }
}
