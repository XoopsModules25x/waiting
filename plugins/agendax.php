<?php
// not tested

/**
 * @return array
 */
function b_waiting_agendax()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];
    $block   = [];

    // agenda-x events
    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('agendax_events') . ' WHERE approved=0');
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/agendax/admin/index.php?listNewLinks';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_EVENTS;
    }

    $ret[] = $block;

    return $ret;
}
