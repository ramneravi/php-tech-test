<?php
namespace SSDMTechTest\EventSourcing\EventProcessing;

interface EventHandlerInterface
{
    /**
     * Resolves an event
     * @param  \EventInterface $event
     * @return boolean
     */
    public function handle($eventType);

}
