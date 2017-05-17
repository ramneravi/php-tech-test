<?php
namespace SSDMTechTest;

use PHPUnit_Framework_TestCase;
use SSDMTechTest\EventSourcing\EventProcessing\FootballEventHandler;
use SSDMTechTest\EventSourcing\EventProcessing\EventHandlerFactory;


class EventHandlerFactoryTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        
    }


    public function testFootballEventHandler()
    {
        $event = $this->getMockBuilder('\EventInterface')->getMock();

        $event->method('getSport')
             ->willReturn('football');
        $event->method('getEventType')
             ->willReturn('penalty');  

        $eventStorage = $this->getMockBuilder('\EventStorageInterface')->getMock();
        $eventStorage->method('store')
                     ->with($this->equalTo('\EventInterface')) 
                     ->willReturn(true);  
              

        $eventHandlerFactory = new EventHandlerFactory($eventStorage);
        //$eventHandlerFactory->resolve($event);
    }


}
