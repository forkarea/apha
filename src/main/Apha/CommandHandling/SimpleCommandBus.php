<?php
declare(strict_types = 1);

namespace Apha\CommandHandling;

use Apha\Message\Command;

class SimpleCommandBus extends CommandBus
{
    /**
     * @var array
     */
    private $commandHandlerMap = [];

    /**
     * @param array $commandHandlerMap
     */
    public function __construct(array $commandHandlerMap = [])
    {
        foreach ($commandHandlerMap as $commandClass => $handler) {
            $this->addHandler($commandClass, $handler);
        }
    }

    /**
     * @param string $commandClass
     * @param CommandHandler $handler
     * @throws CommandHandlerAlreadyExistsException
     */
    public function addHandler(string $commandClass, CommandHandler $handler)
    {
        if (array_key_exists($commandClass, $this->commandHandlerMap)) {
            throw new CommandHandlerAlreadyExistsException($commandClass);
        }

        $this->commandHandlerMap[$commandClass] = $handler;
    }

    /**
     * @param Command $command
     * @throws NoCommandHandlerException
     */
    public function send(Command $command)
    {
        $commandClassName = get_class($command);

        if (!array_key_exists($commandClassName, $this->commandHandlerMap)) {
            throw new NoCommandHandlerException($command);
        }

        /* @var $handler CommandHandler */
        $handler = $this->commandHandlerMap[$commandClassName];
        $handler->handle($command);
    }
}