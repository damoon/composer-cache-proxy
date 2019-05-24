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
        if (!isset($options[CURLOPT_URL])) {
            return \curl_setopt_array($ch, $options);
        }

        if ("https://repo.packagist.org/packages.json" == $options[CURLOPT_URL]) {
            return \curl_setopt_array($ch, $options);
        }

        if (!getenv("CITO_SERVER")) {
            echo "cito: CITO_SERVER not configured\n";
            return \curl_setopt_array($ch, $options);
        }

        $beginsWith = function(string $haystack, string $needle) : string {
            return substr($haystack, 0, strlen($needle)) === $needle;
        };

        $prefixCitoServer = function($url) use ($beginsWith) {
            if ($beginsWith($url, "http://")) {
                return  "/http/" . substr($url, strlen("http://"));
            } else
            if ($beginsWith($url, "https://")) {
                return "/https/" . substr($url, strlen("https://"));
            }
        };

        $url = getenv("CITO_SERVER") . $prefixCitoServer($options[CURLOPT_URL]);
        if (getenv("DEBUG")) {
            echo "hijacked: " . $options[CURLOPT_URL] . " calling " . $url . "\n";
        }
        $options[CURLOPT_URL] = $url;

        return \curl_setopt_array($ch, $options);
    }
}
