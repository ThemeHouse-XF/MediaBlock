<?php

class ThemeHouse_MediaBlock_Install_Controller extends ThemeHouse_Install
{

    protected $_resourceManagerUrl = 'https://xenforo.com/community/resources/media-block.3798/';

    protected function _getPrerequisites()
    {
        return array(
            'XenGallery' => '901000000'
        );
    } /* END _getPrerequisites */
}