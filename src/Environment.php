<?php
declare(strict_types=1);

namespace Edspc\ComposerPlatformReqIgnoreEnv;

use Symfony\Component\Console\Input\InputInterface;

class Environment
{
    private const ENV_VARIABLE_NAME = 'COMPOSER_IGNORE_PLATFORM_REQ';

    private static $full = false;
    private static $extension = [];

    public static function check(): bool
    {
        $ignore = \getenv(static::ENV_VARIABLE_NAME);

        if ($ignore) {
            $ignore = \trim($ignore);

            if (\in_array($ignore, ['1', 'all', 'full'])) {
                self::$full = true;
            } else {
                self::$extension = \explode(' ', $ignore);
            }

            return true;
        }

        return false;
    }

    public static function addInputOptions(InputInterface $input): void
    {
        if (self::$full) {
            $input->setOption('ignore-platform-reqs', true);
        }

        if (self::$extension) {
            $input->setOption('ignore-platform-req', self::$extension);
        }
    }
}
