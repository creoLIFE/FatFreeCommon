<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 22:07
 */
namespace FatFree\Helpers;

class CookieHelper
{
    /**
     * Method will get Account ID from cookie
     * @return boolean
     */
    public function getAccountId()
    {
        return \F3::get('COOKIE.appAid');
    }

    /**
     * Method will get User ID from cookie
     * @return boolean
     */
    public function getUserId()
    {
        return \F3::get('COOKIE.appUid');
    }

    /**
     * Method will get Session ID from cookie
     * @return boolean
     */
    public function getSessionId()
    {
        return \F3::get('COOKIE.appSid');
    }

    /**
     * Method will get Session hash from cookie
     * @return boolean
     */
    public function getSessionHash()
    {
        return \F3::get('COOKIE.appShash');
    }

    /**
     * Method will set app cookies
     * @param string $accountId - user (client) account ID
     * @return void
     */
    public function setAccountId($accountId)
    {
        \F3::set('COOKIE.appAid', $accountId, (int)\F3::get('APP.cookie.expiration'));
    }

    /**
     * Method will set app cookies
     * @param string $userId - user (internal) ID
     * @return void
     */
    public function setUserId($userId)
    {
        \F3::set('COOKIE.appUid', $userId, (int)\F3::get('APP.cookie.expiration'));
    }

    /**
     * Method will set app cookies
     * @param string $sessionId - session ID
     * @return void
     */
    public function setSessionId($sessionId)
    {
        \F3::set('COOKIE.appSid', $sessionId, (int)\F3::get('APP.cookie.expiration'));
    }

    /**
     * Method will set session hash in app cookies
     * @param string $sessionId - session Hash
     * @return void
     */
    public function setSessionHash($sessionHash)
    {
        \F3::set('COOKIE.appShash', $sessionHash, (int)\F3::get('APP.cookie.expiration'));
    }

    /**
     * Method will remove Account ID cookies
     * @return void
     */
    public function removeAccountId()
    {
        \F3::set('COOKIE.appAid', false);
    }

    /**
     * Method will remove User ID cookies
     * @return void
     */
    public function removeUserId()
    {
        \F3::set('COOKIE.appUid', false);
    }

    /**
     * Method will remove Session ID cookies
     * @return void
     */
    public function removeSessionId()
    {
        \F3::set('COOKIE.appSid', false);
    }

    /**
     * Method will remove Session Hash cookies
     * @return void
     */
    public function removeSessionHash()
    {
        \F3::set('COOKIE.appShash', false);
    }

    /**
     * Method will check if accountId was set and exists in cookies
     * @return boolean
     */
    public function isAccountSet()
    {
        return (boolean)\F3::get('COOKIE.appAid');
    }

    /**
     * Method will check if userId was set and exists in cookies
     * @return boolean
     */
    public function isUserSet()
    {
        return (boolean)\F3::get('COOKIE.appUid');
    }

    /**
     * Method will check if sessionId was set and exists in cookies
     * @return boolean
     */
    public function isSessionSet()
    {
        return (boolean)\F3::get('COOKIE.appSid');
    }

    /**
     * Method will check if session Hash was set and exists in cookies
     * @return boolean
     */
    public function isSessionHashSet()
    {
        return (boolean)\F3::get('COOKIE.appShash');
    }

    /**
     * Method will get app cookies
     * @return array
     */
    public function getAppCookies()
    {
        return array(
            'accountId' => \F3::get('COOKIE.appAid'),
            'userId' => \F3::get('COOKIE.appUid'),
            'sessionId' => \F3::get('COOKIE.appSid'),
            'sessionHash' => \F3::get('COOKIE.appShash')
        );
    }

    /**
     * Method will set app cookies
     * @param string $accountId - user (client) account ID
     * @param string $userId - user (internal) ID
     * @param string $sessionId - session ID
     * @param string $sessionHash - session Hash
     * @return void
     */
    public function setAppCookies($accountId, $userId, $sessionId, $sessionHash)
    {
        \F3::set('COOKIE.appAid', $accountId, (int)\F3::get('APP.cookie.expiration'));
        \F3::set('COOKIE.appUid', $userId, (int)\F3::get('APP.cookie.expiration'));
        \F3::set('COOKIE.appSid', $sessionId, (int)\F3::get('APP.cookie.expiration'));
        \F3::set('COOKIE.appShash', $sessionHash, (int)\F3::get('APP.cookie.expiration'));
    }

    /**
     * Method will remove app cookies
     * @return void
     */
    public function removeAppCookies()
    {
        \F3::set('COOKIE.appAid', false);
        \F3::set('COOKIE.appUid', false);
        \F3::set('COOKIE.appSid', false);
        \F3::set('COOKIE.appShash', false);
    }
}
