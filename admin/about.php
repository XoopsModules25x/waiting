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
 * @author          XOOPS Module Development Team
 * @copyright       {@link http://xoops.org 2001-2016 XOOPS Project}
 * @license         {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @link            http://xoops.org XOOPS
 */

include_once __DIR__ . '/admin_header.php';

xoops_cp_header();

$aboutAdmin = new ModuleAdmin();

echo $aboutAdmin->addNavigation(basename(__FILE__));
echo $aboutAdmin->renderAbout('WKFZBRBGMYKCA', false);

include_once __DIR__ . '/admin_footer.php';
