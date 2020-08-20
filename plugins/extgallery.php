<?php

/**
 * @return array
 */
function b_waiting_extgallery()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];
    $block   = [];

    // extcal events
    $sql    = 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix('extgallery_publicphoto') . ' WHERE photo_approved=0';
    $result = $xoopsDB->query($sql);
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/extgallery/admin/photo.php';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_EVENTS;
    }

    $ret[] = $block;

    return $ret;
}
