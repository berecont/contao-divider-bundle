<?php

declare(strict_types=1);

/*
 * This file is part of Contao Divider Bundle.
 * 
 * (c) Bernhard Renner 2021 <bernhard@werbepanorama.at>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/berecont/contao-divider-bundle
 */

use Berecont\ContaoDividerBundle\Controller\ContentElement\DividerController;

/**
 * Content elements
 */
$GLOBALS['TL_DCA']['tl_content']['palettes'][DividerController::TYPE] = '{type_legend},type;{divider_legend},dividerWidth,dividerAddIcon,dividerIcon,dividerStyle,dividerIconbg,dividerIconbgOutline,dividerIconTotop;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
//$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'dividerAddIcon';
//$GLOBALS['TL_DCA']['tl_content']['subpalettes']['dividerAddIcon'] = 'dividerIcon,dividerStyle,dividerIconbg,dividerIconbgOutline,dividerIconTotop';



$GLOBALS['TL_DCA']['tl_content']['fields']['dividerWidth'] = [
    'label'         => &$GLOBALS['TL_LANG']['tl_content']['dividerWidth'],
    'inputType'     => 'select',
    'exclude'       => true,
    'options' => [
        'dividerFull',
        'dividerSm',
        'dividerXs'
    ],
    'reference'     => &$GLOBALS['TL_LANG']['tl_content']['dividerWidthOptions'],
    'eval' => [
        'tl_class' => 'w50'
    ],
    'default'       => 'dividerSm',
    'sql'           => ['type' => 'string', 'length' => 32, 'default' => '']
];

$GLOBALS['TL_DCA']['tl_content']['fields']['dividerAddIcon'] = [
    'label'         => &$GLOBALS['TL_LANG']['tl_content']['dividerAddIcon'],
    'inputType'     => 'checkbox',
    'exclude'       => true,
    'eval' => [
        'tl_class'  => 'w50 m12',
        'submitOnChange' => true
    ],
    'sql'           => ['type' => 'string', 'length' => 1, 'fixed' => true, 'default' => '']  
];


/* subpalettes */

$GLOBALS['TL_DCA']['tl_content']['fields']['dividerIcon'] = [
    'label'         => &$GLOBALS['TL_LANG']['tl_content']['dividerIcon'],
    'inputType'     => 'rocksolid_icon_picker',
    'exclude'       => true,
    'eval' => [
        'fieldType' => 'radio',
        'tl_class'  => 'w100',
        'iconFont'  => 'web/bundles/berecontcontaodivider/fonts/rocksolid-icons.svg',
    ],
    'sql'           => ['type' => 'string', 'length' => 64, 'default' => '']
];

$GLOBALS['TL_DCA']['tl_content']['fields']['dividerStyle'] = [
    'label'         => &$GLOBALS['TL_LANG']['tl_content']['dividerStyle'],
    'inputType'     => 'select',
    'exclude'       => true,
    'options' => [
        'dividerCenter',
        'dividerLeft',
        'dividerRight'
    ],
    'default'       => 'dividerCenter',
    'reference'     => &$GLOBALS['TL_LANG']['tl_content']['dividerStyleOptions'],
    'eval' => [
        'tl_class' => 'w25',
    ],
    'sql'           => ['type' => 'string', 'length' => 32, 'default' => '']
];

$GLOBALS['TL_DCA']['tl_content']['fields']['dividerIconbg'] = [
    'label'         => &$GLOBALS['TL_LANG']['tl_content']['dividerIconbg'],
    'inputType'     => 'select',
    'exclude'       => true,
    'options' => [
        'dividerRoundedBg',
        'dividerSquareBg'
    ],
    'reference'     => &$GLOBALS['TL_LANG']['tl_content']['dividerIconbgOptions'],
    'eval' => [
        'tl_class' => 'w25',
        'includeBlankOption' => true,
    ],
    'sql'           => ['type' => 'string', 'length' => 32, 'default' => '']
];

$GLOBALS['TL_DCA']['tl_content']['fields']['dividerIconbgOutline'] = [
    'label'         => &$GLOBALS['TL_LANG']['tl_content']['dividerIconbgOutline'],
    'inputType'     => 'checkbox',
    'exclude'       => true,
    'eval' => [
        'tl_class'  => 'w25 m12',
    ],
    'sql'           => ['type' => 'string', 'length' => 1, 'fixed' => true, 'default' => '']  
];

$GLOBALS['TL_DCA']['tl_content']['fields']['dividerIconTotop'] = [
    'label'         => &$GLOBALS['TL_LANG']['tl_content']['dividerIconTotop'],
    'inputType'     => 'checkbox',
    'exclude'       => true,
    'eval' => [
        'tl_class'  => 'w25 m12'
    ],
    'sql'           => ['type' => 'string', 'length' => 1, 'fixed' => true, 'default' => '']  
];

