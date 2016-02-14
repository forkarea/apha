<?php
declare(strict_types = 1);

namespace Apha\MessageBus;

use Apha\Message\Event;
use Apha\MessageHandler\EventHandler;

class SimpleEventBusTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function publishPropagatesEventToRegisteredHandlers()
    {
        $event = $this->getMockBuilder(Event::class)
            ->getMock();

        $handler1 = $this->getMockBuilder(EventHandler::class)
            ->getMock();

        $handler2 = $this->getMockBuilder(EventHandler::class)
            ->getMock();

        $handler1->expects(self::once())
            ->method('on')
            ->with($event);

        $handler2->expects(self::once())
            ->method('on')
            ->with($event);

        $eventBus = new SimpleEventBus([
            get_class($event) => [$handler1, $handler2]
        ]);

        $eventBus->publish($event);
    }

    /**
     * @test
     */
    public function publishEventWithoutHandlerPassesSilently()
    {
        $event = $this->getMockBuilder(Event::class)
            ->getMock();

        $eventBus = new SimpleEventBus([]);
        $eventBus->publish($event);
    }
}