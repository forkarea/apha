<?php
declare(strict_types = 1);

namespace Apha\CommandHandling\Interceptor;

use Apha\Message\Command;

interface CommandDispatchInterceptor
{
    /**
     * @param Command $command
     * @return void
     */
    public function onBeforeDispatch(Command $command);

    /**
     * @param Command $command
     * @return void
     */
    public function onDispatchSuccessful(Command $command);

    /**
     * @param Command $command
     * @param \Exception $exception
     * @return void
     */
    public function onDispatchFailed(Command $command, \Exception $exception);
}