<?php

/**
 * @param string $mydirnumber
 * @return array
 */
function b_waiting_myalbum_0($mydirnumber = '')
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];
    $block   = [];

    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix("myalbum{$mydirnumber}_photos") . ' WHERE STATUS=0');
    if ($result) {
        $block['adminlink'] = XOOPS_URL . "/modules/myalbum{$mydirnumber}/admin/admission.php";
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_WAITINGS . ('' === $mydirnumber ? '' : "({$mydirnumber})");
    }

    $ret[] = $block;

    return $ret;
}

for ($i = 0; $i < 3; ++$i) {
    if (file_exists(XOOPS_ROOT_PATH . "/modules/myalbum{$i}/xoops_version.php")) {
        eval(
            ' function b_waiting_myalbum_' . ($i + 1) . '() {
            return b_waiting_myalbum_0(' . $i . ');
        }
        '
        );
    }
}
?>
