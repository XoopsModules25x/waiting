<?php

/**
 * @return array
 */
function b_waiting_recette()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];
    $block   = [];

    // news
    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('recette') . ' WHERE published=0');
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/recette/admin/index.php?op=newarticle';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_SUBMITTED;
    }

    $ret[] = $block;

    return $ret;
}
