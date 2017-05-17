<?php
namespace SSDMTechTest\EventSourcing\EventProcessing;

interface EventHandlerFactoryInterface
{
    /**
     * Resolves an event
     * @param  \EventInterface $event
     * @return boolean
     */
    public function resolve(\EventInterface $event);

}
