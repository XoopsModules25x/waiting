<?php

/**
 * @return array
 */
function b_waiting_articles()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];
    $block   = [];

    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('articles_main') . ' WHERE art_validated = 0');
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/articles/admin/validate.php';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_SUBMITTED;
    }

    $ret[] = $block;

    return $ret;
}
