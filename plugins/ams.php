<?php

/**
 * @return array
 */
function b_waiting_AMS()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];
    $block   = [];

    // AMS articles
    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('ams_article') . ' WHERE published=0');
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/AMS/admin/index.php?op=newarticle';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_WAITINGS;
    }

    $ret[] = $block;

    return $ret;
}
