<?php
/*************************************************************************/

# Waiting Contents Extensible                                            #
# Plugin for module wgGallery                                            #
#                                                                        #
# Author                                                                 #
# goffy - wedega - Webdesign Gabor - webmaster@wedega.com                #
#                                                                        #
# Last modified on 27.08.2020                                            #
/*************************************************************************/
/**
 * @return array
 */
 
use XoopsModules\Wggallery\Constants;

/**
 * @return array
 */
function b_waiting_wggallery()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];
    // images waiting for approvement
    $block  = [];
    $sql    = 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wggallery_images') . ' WHERE img_state=' . Constants::STATE_APPROVAL_VAL;
    $result = $xoopsDB->query($sql);
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/wggallery/admin/images.php';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_WAITINGS;
    }
    $ret[] = $block;
    
    // albums waiting for approvement
    $block  = [];
    $sql    = 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wggallery_albums') . ' WHERE alb_state=' . Constants::STATE_APPROVAL_VAL;
    $result = $xoopsDB->query($sql);
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/wggallery/admin/albums.php';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_WAITINGS;
    }
    $ret[] = $block;

    return $ret;
}
