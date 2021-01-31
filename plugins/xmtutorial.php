<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * xmtutorial module
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @author          Mage Gregory (AKA Mage)
 */
 
/**
 * @return array
 */
function b_waiting_xmtutorial()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];
    $block   = [];
    $sql    = 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix('xmtutorial_tutorial') . ' WHERE tutorial_status=0';
    $result = $xoopsDB->query($sql);
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/xmtutorial/admin/tutorial.php?tutorial_cid=0&tutorial_status=0';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_TUTORIAL;
    }

    $ret[] = $block;

    return $ret;
}
