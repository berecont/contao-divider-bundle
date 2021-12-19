<?php

/*
 * This file is part of Contao Divider Bundle.
 * 
 * (c) Bernhard Renner 2021 <bernhard@werbepanorama.at>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/berecont/contao-divider-bundle
 */


$cssTimestamp = filemtime($this->rootDir.'/bundles/berecontcontaodivider/css/styles.css');
$GLOBALS['TL_CSS'][] = 'bundles/berecontcontaodivider/css/styles.css|'.$cssTimestamp;
