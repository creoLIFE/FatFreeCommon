<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 22:07
 */

namespace FatFree\Helpers;

class HeadersHelper
{
    /**
     * @return void
     */
    public static function addJsonHeaders()
    {
        header('Content-Type: application/json');
    }

    /**
     * @return void
     */
    public static function addAccessControlHeaders(string $origin)
    {
        header(
            sprintf("Access-Control-Allow-Origin: %s", $origin)
        );
        if ($origin !== '*') {
            header('Vary: Origin');
        }
    }

    /**
     * @return void
     */
    public static function addCorsHeaders()
    {
        header('Access-Control-Allow-Origin: *');
    }

    /**
     * @return void
     */
    public static function addXmlHeaders()
    {
        header("Content-type: text/xml; charset=utf-8");
    }

    /**
     * @return void
     */
    public static function addJavascriptHeaders()
    {
        header('Content-type: text/javascript');
    }

    /**
     * @param integer $code - response code
     * @return void
     */
    public static function setResponseCode($code)
    {
        http_response_code($code);
    }

    /**
     * @return void
     */
    public static function unsetCache()
    {
        header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
        header("Pragma: no-cache"); //HTTP 1.0
        header("Expires: " . date("D, d M Y H:i:s e", strtotime('-1 day'))); // Date in the past
    }

    /**
     * @param integer $time - expiration time (expire after x seconds)
     * @return void
     */
    public static function setCache($expTime = 86400)
    {
        //86400 - 1day (60sec * 60min * 24hours)
        header("Cache-Control: max-age=" . (int)$expTime);
        header("Expires: " . date("D, d M Y H:i:s e", time() + (int)$expTime)); // Date in the past

        //TODO - To check
        /*
        if ((int)$expTime === -1) {
            $expTime = (int)\F3::get('HEADER.cache');
        }

        $lastModified = \F3::get('HEADERS.If-Modified-Since');
        if (!$lastModified) {
            $lastModified = date("D, d M Y H:i:s e", time());
            $expire = date("D, d M Y H:i:s e", time() + (int)$expTime);
        } else {
            $expire = date("D, d M Y H:i:s e", strtotime($lastModified) + (int)$expTime);
        }

        //86400 - 1day (60sec * 60min * 24hours)
        if ($expTime === 0) {
            header("Expires: " . date("D, d M Y H:i:s e", time() - 1));
            header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
            header("Pragma: no-cache");
        } else {
            session_cache_limiter(false);
            header("Expires: " . $expire);
            header("Cache-Control: public, max-age=" . (int)$expTime);
            header('Last-Modified: ' . $lastModified);
            self::setResponseCode(304);
        }
        */
    }

}
