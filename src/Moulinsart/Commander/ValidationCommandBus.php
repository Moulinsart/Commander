<?php
namespace Moulinsart\Commander;

class ValidationCommandBus extends DefaultCommandBus
{
	public function execute($command)
	{
		$validator = $this->commandTranslator->toValidator($command);

		if (class_exists($validator))
		{
			$this->app->make($validator)->validate($command);
		}
		//return $this->commandBus->execute($command);
		return parent::execute($command);
	}

}
