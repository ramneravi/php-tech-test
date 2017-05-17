<?php
namespace SSDMTechTest;

use PHPUnit_Framework_TestCase;
use SSDMTechTest\EventSourcing\EventProcessing\FootballEventHandler;


class FootballEventHandlerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        
    }


    /**
     * @dataProvider dataProvider
     */

    /**
     * @dataProvider dataProvider
     *
     * @param string $eventType
     */
    public function testFootballEventHandler($eventType)
    {
        $footballEventHandler = new FootballEventHandler();
        $this->assertSame(true, $footballEventHandler->handle($eventType));
    }


    public function dataProvider()
    {
        return [ ['kickoff'], ['goal'], ['yellowcard'], ['redcard'], ['penalty'], ['halftime'], ['fulltime'], ['extratime'], ['freekick'], ['corner'] ];
        
    }
}
