<?php

/**
 * @return array
 */
function b_waiting_eguide()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];
    $block   = [];

    // eguide
    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('eguide') . ' WHERE status=1');
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/eguide/admin/index.php?op=events';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_WAITINGS;
    }

    $ret[] = $block;

    return $ret;
}
