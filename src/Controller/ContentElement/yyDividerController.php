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

namespace Berecont\ContaoDividerBundle\Controller\ContentElement;

use Contao\BackendTemplate;
use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DividerController
 *
 * @ContentElement(DividerController::TYPE, category="werbepanorama", template="ce_divider")
 */
class DividerController extends AbstractContentElementController
{
    public const TYPE = 'divider';

    /**
     * Generate the content element
     */

    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
        
        $template->dividerWidth = $model->dividerWidth;
        $template->dividerAddIcon = $model->dividerAddIcon;
        $template->dividerStyle = $model->dividerStyle;
        $template->dividerIcon = $model->dividerIcon;
        $template->dividerIconbg = $model->dividerIconbg;
        $template->dividerIconbgOutline = $model->dividerIconbgOutline;

        $cssClasses = [
            $template->dividerWidth,
            $template->dividerStyle,
            $template->dividerIconbg,
        ];
        if ($template->dividerIconbgOutline) {
            $cssClasses[] = 'dividerBorder';
        };

        if ($template->dividerAddIcon) {
            $cssClass = implode(' ',$cssClasses);

            $template->cssClass = $cssClass;

            $template->class .= ' '.$cssClass;
        };

        if (TL_MODE === 'BE') {
            $template = new BackendTemplate ('be_wildcard');
            $template->wildcard = '### Trennlinie ###';
            if ($model->dividerAddIcon) {
                $template->title = $GLOBALS['TL_LANG']['tl_content']['dividerWidthOptions'][$model->dividerWidth] . ' |  plus Icon' ;
            } else {
                $template->title = $GLOBALS['TL_LANG']['tl_content']['dividerWidthOptions'][$model->dividerWidth];
            };
            
            
            return $template->getResponse();
        }
        

        return $template->getResponse();
    }


}


