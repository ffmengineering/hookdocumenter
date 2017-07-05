<?php

namespace Ffm\Hookdocs\Console;

use Ffm\Hookdocs\Console\Commands\Magento1\ObserversCommand as Magento1Observers;
use Symfony\Component\Console\Application as SymfonyConsole;

class Application extends SymfonyConsole
{
    const APP_NAME = 'Hookdocs';
    const APP_VERSION = '0.1.0';

    /**
     * {@inheritdoc}
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    protected function getDefaultCommands()
    {
        $commands = parent::getDefaultCommands();

        $commands[] = new Magento1Observers();

        return $commands;
    }
}
