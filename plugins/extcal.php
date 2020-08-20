<?php

/**
 * @return array
 */
function b_waiting_extcal()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];
    $block   = [];
    // extcal events
    $sql    = 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix('extcal_event') . ' WHERE event_approved=0';
    $result = $xoopsDB->query($sql);
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/extcal/admin/index.php';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_EVENTS;
    }

    $ret[] = $block;

    return $ret;
}
