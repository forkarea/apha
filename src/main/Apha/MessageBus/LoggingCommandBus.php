<?php
declare(strict_types = 1);

namespace Apha\MessageBus;

use Apha\Message\Command;
use Apha\MessageHandler\CommandHandler;
use Psr\Log\LoggerInterface;

class LoggingCommandBus extends CommandBus
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param CommandBus $commandBus
     * @param LoggerInterface $logger
     */
    public function __construct(CommandBus $commandBus, LoggerInterface $logger)
    {
        $this->commandBus = $commandBus;
        $this->logger = $logger;
    }

    /**
     * @param string $commandClass
     * @param CommandHandler $handler
     */
    public function addHandler(string $commandClass, CommandHandler $handler)
    {
        $this->commandBus->addHandler($commandClass, $handler);
    }

    /**
     * @param Command $command
     * @return void
     * @throws NoCommandHandlerException
     */
    public function send(Command $command)
    {
        $this->logger->info('Dispatch command', [
            'command' => get_class($command),
            'bus' => get_class($this->commandBus)
        ]);

        try {
            $this->commandBus->send($command);

            $this->logger->info('Command dispatched', [
                'command' => get_class($command),
                'bus' => get_class($this->commandBus)
            ]);
        } catch (NoCommandHandlerException $e) {
            $this->logger->info('Dead-letter message:command', [
                'command' => get_class($command),
                'bus' => get_class($this->commandBus)
            ]);

            throw $e;
        }
    }
}