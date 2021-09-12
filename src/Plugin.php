<?php
declare(strict_types=1);

namespace Edspc\ComposerPlatformReqIgnoreEnv;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\PreCommandRunEvent;

class Plugin implements PluginInterface, EventSubscriberInterface
{
    const INVOLVED_COMMANDS = ['require', 'update', 'install'];

    public function activate(Composer $composer, IOInterface $io)
    {
    }

    public function deactivate(Composer $composer, IOInterface $io)
    {
    }

    public function uninstall(Composer $composer, IOInterface $io)
    {
    }

    public static function getSubscribedEvents()
    {
        return Environment::check() ? [PluginEvents::PRE_COMMAND_RUN => [['onPreCommandRun']]] : [];
    }

    public function onPreCommandRun(PreCommandRunEvent $event)
    {
        if (\in_array($event->getCommand(), self::INVOLVED_COMMANDS, true)) {
            Environment::addInputOptions($event->getInput());
        }
    }
}
