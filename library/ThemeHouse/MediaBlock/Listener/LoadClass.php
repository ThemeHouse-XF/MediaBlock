<?php

class ThemeHouse_MediaBlock_Listener_LoadClass extends ThemeHouse_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'ThemeHouse_MediaBlock' => array(
                'helper' => array(
                    'ThemeHouse_Tabs_ViewPublic_Helper_Tabs'
                ), /* END 'helper' */
            ), /* END 'ThemeHouse_MediaBlock' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassHelper($class, array &$extend)
    {
        $extend = self::createAndRun('ThemeHouse_MediaBlock_Listener_LoadClass', $class, $extend, 'helper');
    } /* END loadClassHelper */
}