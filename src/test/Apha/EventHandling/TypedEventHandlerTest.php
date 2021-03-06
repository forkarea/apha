<?php
declare(strict_types = 1);

namespace Apha\EventHandling;

use Apha\Message\Event;

/**
 * @group annotations
 */
class TypedEventHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function handleWithTypeInflection()
    {
        $handler = $this->getMockBuilder(TypedEventHandler::class)
            ->setMethods(['onSomeEvent'])
            ->getMockForTrait();

        $event = $this->getMockBuilder(Event::class)
            ->setMockClassName('SomeEvent')
            ->setMethods(['getEventName'])
            ->getMock();

        $event->expects(self::any())
            ->method('getEventName')
            ->willReturn('SomeEvent');

        $handler->expects(self::once())
            ->method('onSomeEvent')
            ->with($event);

        $handler->on($event);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function handleThrowsExceptionForUnknownEvent()
    {
        $handler = $this->getMockBuilder(TypedEventHandler::class)
            ->getMockForTrait();

        $event = $this->getMockBuilder(Event::class)
            ->setMockClassName('SomeEvent')
            ->setMethods(['getEventName'])
            ->getMock();

        $event->expects(self::any())
            ->method('getEventName')
            ->willReturn('SomeEvent');

        $handler->on($event);
    }
}