<?php

/**
 *
 * @see ThemeHouse_Tabs_ViewPublic_Helper_Tabs
 */
class ThemeHouse_MediaBlock_Extend_ThemeHouse_Tabs_ViewPublic_Helper_Tabs extends XFCP_ThemeHouse_MediaBlock_Extend_ThemeHouse_Tabs_ViewPublic_Helper_Tabs
{

    /**
     *
     * @see ThemeHouse_Tabs_ViewPublic_Helper_Tabs::getTabs()
     */
    public function getTabs()
    {
        parent::getTabs();

        $params = $this->_view->getParams();

        if (!empty($params['tabContents'])) {
            $tabContents = $params['tabContents'];

            $tabsMediaIds = self::extractXenGalleryMedia($tabContents);

            $xenOptions = XenForo_Application::get('options');

            $maxImages = $xenOptions->th_mediaBlock_maxItems;

            $this->_view->setParams(
                array(
                    'tabsMediaIds' => implode(',', $tabsMediaIds),
                    'tabsMediaCount' => min(count($tabsMediaIds), $maxImages),
                    'tabContents' => $tabContents
                ));
        }
    } /* END getTabs */

    /**
     *
     * @param array $tabContents
     * @return array
     */
    public static function extractXenGalleryMedia(array &$tabContents)
    {
        $tabsMediaIds = array();

        foreach ($tabContents as $tabKey => $tab) {
            if ($tab['content_type'] == 'xengallery_media') {
                if (empty($tab['selected'])) {
                    $tabsMediaIds[] = $tab['content_id'];
                }
                unset($tabContents[$tabKey]);
            }
        }

        return $tabsMediaIds;
    } /* END extractXenGalleryMedia */
}