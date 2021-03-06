<?php
declare(strict_types = 1);

namespace Apha\EventHandling;

use Apha\Message\Event;

trait TypedEventHandler
{
    /**
     * @param Event $event
     * @throws \InvalidArgumentException
     */
    public function on(Event $event)
    {
        $this->handleEventByInflection($event);
    }

    /**
     * @param Event $event
     * @throws \InvalidArgumentException
     */
    private function handleEventByInflection(Event $event)
    {
        $eventHandleMethod = 'on' . $event->getEventName();

        if (!method_exists($this, $eventHandleMethod)) {
            $eventClassName = get_class($event);
            throw new \InvalidArgumentException("Unable to handle event '{$eventClassName}'.");
        }

        $this->{$eventHandleMethod}($event);
    }
}