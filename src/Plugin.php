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

namespace Hirak\Prestissimo;

if (!function_exists("\Hirak\Prestissimo\curl_setopt_array")) {
    function curl_setopt_array($ch, array $options) : bool
    {
        if (getenv("DEBUG")) {
            echo "hijacked: " . $options[CURLOPT_URL] . "\n";
        }
        return \curl_setopt_array($ch, $options);
    }
}
