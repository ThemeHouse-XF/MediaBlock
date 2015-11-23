<?php

class ThemeHouse_MediaBlock_Template_XenGalleryCallback
{

    public static function getMediaForBlock($content, $params, XenForo_Template_Abstract $template)
    {
        /* @var $mediaModel XenGallery_Model_Media */
        $mediaModel = XenForo_Model::create('XenGallery_Model_Media');

        $visitor = XenForo_Visitor::getInstance();

        $conditions = array();
        if ($params['mediaIds']) {
            $conditions['media_id'] = explode(',', $params['mediaIds']);
        }

        $fetchOptions = array(
            'join' => XenGallery_Model_Media::FETCH_USER | XenGallery_Model_Media::FETCH_CATEGORY |
                 XenGallery_Model_Media::FETCH_ALBUM | XenGallery_Model_Media::FETCH_ATTACHMENT,
                'order' => $params['type'],
                'orderDirection' => 'desc',
                'limit' => $params['limit']
        );

        $media = $mediaModel->getMedia($conditions, $fetchOptions);
        $media = $mediaModel->prepareMediaItems($media);

        $viewParams = array(
            'media' => $media,
            'captions' => true
        );

        return $template->create('xengallery_media_block_items', $viewParams);
    } /* END getMediaForBlock */
}