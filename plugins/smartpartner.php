<?php

/**
 * SmartPartner plugin
 *
 * @author Marius Scurtescu <mariuss@romanians.bc.ca>
 */
function b_waiting_smartpartner()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];
    $block   = [];

    // smartpartner submitted
    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('smartpartner_partner') . ' WHERE status=1');
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/smartpartner/admin/index.php?statussel=1';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_SUBMITTED;
    }

    $ret[] = $block;

    return $ret;
}
