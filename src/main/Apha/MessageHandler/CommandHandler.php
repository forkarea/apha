<?php
declare(strict_types = 1);

namespace Apha\MessageHandler;

use Apha\Message\Command;

interface CommandHandler
{
    /**
     * @param Command $command
     * @return void
     */
    public function handle(Command $command);
}