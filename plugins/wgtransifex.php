<?php
/*************************************************************************/

# Waiting Contents Extensible                                            #
# Plugin for module wgTransifex                                            #
#                                                                        #
# Author                                                                 #
# goffy - wedega - Webdesign Gabor - webmaster@wedega.com                #
#                                                                        #
# Last modified on 27.08.2020                                            #
/*************************************************************************/
/**
 * @return array
 */
 
use XoopsModules\Wgtransifex\Constants;

/**
 * @return array
 */
function b_waiting_wgtransifex()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];
    
    // packages notified as broken
    $block  = [];
    $sql    = 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wgtransifex_packages') . ' WHERE pkg_status=' . Constants::STATUS_BROKEN;
    $result = $xoopsDB->query($sql);
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/wgtransifex/admin/packages.php';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_BROKENS;
    }
    $ret[] = $block;
    
    // waiting requests for new language packages
    $block  = [];
    $sql    = 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wgtransifex_requests') . ' WHERE req_status=' . Constants::STATUS_PENDING;
    $result = $xoopsDB->query($sql);
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/wgtransifex/admin/requests.php';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_REQUESTS;
    }
    $ret[] = $block;

    return $ret;
}
