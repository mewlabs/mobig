<?php

namespace InstagramAPI;

class Debug
{
    /*
     * If set to true, the debug logs will be placed in the file
     * noted below in $debugLogFile else being printed to console
     *
     * @var bool
     */
    public static $debugLog = false;

    /*
     * The file to place debug logs into when $debugLog is true
     *
     * @var string
     */
    public static $debugLogFile = '';

    /**
     * @return string
     */
    public static function getDebugLogFile()
    {
        return '' === self::$debugLogFile ? 'debug.log' : self::$debugLogFile;
    }

    /**
     * @param string $method
     * @param string $endpoint
     */
    public static function printRequest($method, $endpoint)
    {
        if (true === self::$debugLog) {
            file_put_contents(self::getDebugLogFile(), date('Y-m-d [H:i:s]') . ' ' . $method . ':  ' . $endpoint . "\n", FILE_APPEND | LOCK_EX);
        } else {
            $cMethod = $method . ':  ';

            if (PHP_SAPI === 'cli') {
                $cMethod = Utils::colouredString("{$method}:  ", 'light_blue');
            }

            echo $cMethod . $endpoint . "\n";
        }
    }

    /**
     * @param string $uploadBytes
     */
    public static function printUpload($uploadBytes)
    {
        if (true === self::$debugLog) {
            file_put_contents(self::getDebugLogFile(), date('Y-m-d [H:i:s]') . ' ' . "→  $uploadBytes\n", FILE_APPEND | LOCK_EX);
        } else {
            $dat = '→ ' . $uploadBytes;

            if (PHP_SAPI === 'cli') {
                $dat = Utils::colouredString('→ ' . $uploadBytes, 'yellow');
            }

            echo $dat . "\n";
        }
    }

    /**
     * @param string $httpCode
     * @param string $bytes
     */
    public static function printHttpCode($httpCode, $bytes)
    {
        if (true === self::$debugLog) {
            file_put_contents(self::getDebugLogFile(), date('Y-m-d [H:i:s]') . ' ' . "← {$httpCode} \t {$bytes}\n", FILE_APPEND | LOCK_EX);
        } else {
            if (PHP_SAPI === 'cli') {
                echo Utils::colouredString("← {$httpCode} \t {$bytes}", 'green') . "\n";
            } else {
                echo "← {$httpCode} \t {$bytes}\n";
            }
        }
    }

    /**
     * @param string $response
     * @param bool   $truncated
     */
    public static function printResponse($response, $truncated = false)
    {
        if ($truncated && mb_strlen($response, 'utf8') > 1000) {
            $response = mb_substr($response, 0, 1000, 'utf8') . '...';
        }

        if (true === self::$debugLog) {
            file_put_contents(self::getDebugLogFile(), date('Y-m-d [H:i:s]') . ' ' . "RESPONSE: {$response}\n\n", FILE_APPEND | LOCK_EX);
        } else {
            $res = 'RESPONSE: ';

            if (PHP_SAPI === 'cli') {
                $res = Utils::colouredString('RESPONSE: ', 'cyan');
            }

            echo $res . $response . "\n\n";
        }
    }

    /**
     * @param string $post
     */
    public static function printPostData($post)
    {
        $gzip = mb_strpos($post, "\x1f" . "\x8b" . "\x08", 0, 'US-ASCII') === 0;
        if (true === self::$debugLog) {
            file_put_contents(self::getDebugLogFile(), date('Y-m-d [H:i:s]') . ' ' . 'DATA: ' . urldecode(($gzip
                    ? zlib_decode($post) : $post)) . "\n", FILE_APPEND | LOCK_EX);
        } else {
            $dat = 'DATA: ';

            if (PHP_SAPI === 'cli') {
                $dat = Utils::colouredString(($gzip ? 'DECODED ' : '') . 'DATA: ', 'yellow');
            }

            echo $dat . ($gzip ? zlib_decode($post) : $post) . "\n";
        }
    }
}
