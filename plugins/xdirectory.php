<?php
// This code is not tested

/**
 * @return array
 */
function b_waiting_xdirectory()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];

    // xdirectory links
    $block  = [];
    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('xdir_links') . ' WHERE status=0');
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/xdirectory/admin/index.php?op=listNewLinks';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_LINKS;
    }
    $ret[] = $block;

    // xdirectory broken
    $block  = [];
    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('xdir_broken'));
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/xdirectory/admin/index.php?op=listBrokenLinks';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_BROKENS;
    }
    $ret[] = $block;

    // xdirectory modreq
    $block  = [];
    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('xdir_mod'));
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/xdirectory/admin/index.php?op=listModReq';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_MODREQS;
    }
    $ret[] = $block;

    return $ret;
}
