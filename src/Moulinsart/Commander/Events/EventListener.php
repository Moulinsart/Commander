<?php
namespace Moulinsart\Commander\Events;

use ReflectionClass;
Company\Eventing\EventDispatcher;

class EventListener
{
	public function handle($event)
	{
		$eventName = $this->getEventName($event);

		if ($this->ListenerIsRegistered($eventName))
		{
			return call_user_func([$this, 'when'.$eventName], $event);
		}
	}

	/**
	* @param $event
	* @return string
	*/

	protected function getEventName($event)
	{

		return (new ReflectionClass($event))->getShortName();

	}

	/**
	* @param $eventName
	* @return bool
	*/
	protected function ListenerIsRegistered($eventName)
	{
		$method = "when{$eventName}";

		return method_exists($this, $method);
	}
}
