<?php

namespace Damoon\Cito;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin as ComposerPlugin;

class Plugin implements ComposerPlugin\PluginInterface
{
    /**
     * Apply plugin modifications to Composer
     *
     * @param Composer    $composer
     * @param IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
    }
}
