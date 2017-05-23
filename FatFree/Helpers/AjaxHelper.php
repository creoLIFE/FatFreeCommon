<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 22:07
 */
namespace FatFree\Helpers;

class AjaxHelper
{
    /**
     * Verify if request is ajax call from current domain
     * @method isAjax
     * @return boolean
     */
    public static function isAjax()
    {
        return (boolean)(

        isset($_SERVER['HTTP_X_REQUESTED_WITH'])
        && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
            ? true : false

        );
    }

}
