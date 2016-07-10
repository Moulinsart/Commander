<?php
namespace Moulinsart\Commander

interface CommandBus
{
	public function execute($command);
}
