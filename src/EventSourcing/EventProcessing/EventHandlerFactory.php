<?php
namespace SSDMTechTest\EventSourcing\EventProcessing;

use SSDMTechTest\EventSourcing\EventProcessing\EventHandlerFactoryInterface;

/**
 *
 * @author Mohanram
 */
class EventHandlerFactory implements EventHandlerFactoryInterface
{

    /**
     * Holds all event handlers
     * @var array $eventHandlers
     */
    private $eventHandlers = array();

    /**
     * Storage for the event
     * @var \EventStorageInterface $eventStorage
     */
    private $eEventStorage;

    public function __construct(\EventStorageInterface $eEventStorage)
    {
        $this->eEventStorage = $eEventStorage;
        $this->registerHandlers();

    }


    /**
     * Given a single Event (`EventInterface`), determine whether or not to process it.
     *
     * @return boolean true if event processed, false if the event discarded.
     */
    public function resolve(\EventInterface $event)
    {

        $eventHandler = $this->getEventHandler($event);

        if (is_object($eventHandler))
        {
            if ($eventHandler->handle($event->getEventType())) {
                $this->eEventStorage->store($event);
                return true;
            }
          
        }
        
        return false;
    }


    /**
     * Get the event handler for the given event 
     * 
     * 
     */
    private function getEventHandler(\EventInterface $event)
    {
        $sport = $event->getSport();
        $eventType = $event->getEventType();
        $eventHandler = null;
        
        if (array_key_exists($sport, $this->eventHandlers)) {

            $eventTypes = $this->eventHandlers[$sport];
            if (array_key_exists($eventType, $eventTypes)) {
                $eventHandler = $this->eventHandlers[$sport][$eventType];
            } 

        }

        return $eventHandler;
    }
    
    /**
     * Register event handlers with their eventTypes here
     *
     **/
    private function registerHandlers()
    {
        
        $events['football'] = array('kickoff', 'goal', 'yellowcard', 'redcard', 'penalty', 'halftime', 'fulltime', 'extratime', 'freekick', 'corner');
        $this->registerHandlerWithTypes(new FootballEventHandler, $events);

        /** Add the new sports events and eventTypes here like above after creating the EventHandler object **/
    }

    private function registerHandlerWithTypes($eventHandler, $events)
    {

        foreach ($events as $event=>$eventTypes) {
            foreach ($eventTypes as $type) {
                $this->eventHandlers[$event][$type] = $eventHandler;
            }
        }

    }
}