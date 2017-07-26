<?php
/*
 You may not change or alter any portion of this comment or credits of
 supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit
 authors.

 This program is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
/**
 * Module: Waiting
 *
 * @category        Module
 * @package         waiting
 * @author          Ryuji AMANO <info@ryus.co.jp>
 * @author          XOOPS Module Development Team
 * @copyright       {@link https://xoops.org 2001-2016 XOOPS Project}
 * @license         {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @link            http://ryus.co.jp Ryu's Planning
 * @link            https://xoops.org XOOPS
 */

$path = dirname(dirname(dirname(__DIR__)));
include_once $path . '/mainfile.php';
include_once $path . '/include/cp_functions.php';
require_once $path . '/include/cp_header.php';

global $xoopsModule;

$moduleDirName = $GLOBALS['xoopsModule']->getVar('dirname');

// Load language files
xoops_loadLanguage('admin', $moduleDirName);
xoops_loadLanguage('modinfo', $moduleDirName);
xoops_loadLanguage('main', $moduleDirName);

$pathIcon16      = '../' . $xoopsModule->getInfo('icons16');
$pathIcon32      = '../' . $xoopsModule->getInfo('icons32');
$pathModuleAdmin = $xoopsModule->getInfo('dirmoduleadmin');

require_once $GLOBALS['xoops']->path($pathModuleAdmin . '/moduleadmin.php');
