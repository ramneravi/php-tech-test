<?php
namespace SSDMTechTest\EventSourcing\EventProcessing;

class FootballEventHandler
{

    /**
     * handles the given Event Type
     * @param  $eventType
     * @return boolean
     */
    public function handle($eventType) {
    	
    	if (method_exists($this, $eventType)){
    		return $this->$eventType();
    	} else {
    		return false;
    	}

    }

    /**
     * handles the given Event Type
     * @param  $eventType
     * @return boolean
     */
    private function kickoff() {
    	echo "Kickoff Event handled";
    	return true;	
    }

    /**
     * handles the given Event Type
     * @param  $eventType
     * @return boolean
     */
    private function goal() {
    	echo "Goal Event handled";
    	return true;	
    }

    /**
     * handles the given Event Type
     * @param  $eventType
     * @return boolean
     */
    private function yellowcard() {
        echo "Yellowcard Event handled";
        return true;    
    }



    /**
     * handles the given Event Type
     * @param  $eventType
     * @return boolean
     */
    private function redcard() {
    	echo "Redcard Event handled";
    	return true;	
    }

    /**
     * handles the given Event Type
     * @param  $eventType
     * @return boolean
     */
    private function penalty() {
    	echo "Penalty Event handled";
    	return true;	
    }

    /**
     * handles the given Event Type
     * @param  $eventType
     * @return boolean
     */
    private function halftime() {
    	echo "Halftime Event handled";
    	return true;	
    }

    /**
     * handles the given Event Type
     * @param  $eventType
     * @return boolean
     */
    private function fulltime() {
    	echo "Fulltime Event handled";
    	return true;	
    }

    /**
     * handles the given Event Type
     * @param  $eventType
     * @return boolean
     */
    private function extratime() {
    	echo "Extratime Event handled";
    	return true;	
    }

    /**
     * handles the given Event Type
     * @param  $eventType
     * @return boolean
     */
    private function freekick() {
    	echo "Freekick Event handled";
    	return true;	
    }

    /**
     * handles the given Event Type
     * @param  $eventType
     * @return boolean
     */
    private function corner() {
    	echo "Corner Event handled";
    	return true;	
    }

}
