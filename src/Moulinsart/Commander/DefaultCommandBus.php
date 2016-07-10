<?php
namespace Moulinsart\Commander;

use Illuminate\Foundation\Application;
//use Company\Commanding\CommandTranslator;

class DefaultCommandBus implements CommandBus
{
	private $app;

	protected $commandTranslator;

	function __construct(Application $app, CommandTranslator $commandTranslator)
	{
		$this->app = $app;
		$this->commandTranslator = $commandTranslator;
	}

	public function execute($command)
	{

		$handler = $this->commandTranslator->toCommandHandler($command);

		return $this->app->make($handler)->handle($command);
	}

}
