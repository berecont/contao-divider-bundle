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
use Contao\CoreBundle\Routing\ScopeMatcher;
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

    private $scopeMatcher;

    public function __construct(ScopeMatcher $scopeMatcher)
    {
        $this->scopeMatcher = $scopeMatcher;
    }

    /**
     * Generate the content element
     */

    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
        if ($this->scopeMatcher->isBackendRequest($request)) {
            $template = new BackendTemplate('be_wildcard');
            $template->wildcard = '### Trennlinie ###';
            if ($model->dividerAddIcon) {
                $template->title = $GLOBALS['TL_LANG']['tl_content']['dividerWidthOptions'][$model->dividerWidth] . ' | ' . $GLOBALS['TL_LANG']['tl_content']['dividerStyleOptions'][$model->dividerStyle];
            } else {
                $template->title = $GLOBALS['TL_LANG']['tl_content']['dividerWidthOptions'][$model->dividerWidth];
            };

            return new Response($template->parse());
        }

        $template->dividerWidth = $model->dividerWidth;
        $template->dividerAddIcon = $model->dividerAddIcon;
        $template->dividerStyle = $model->dividerStyle;
        $template->dividerIcon = $model->dividerIcon;
        $template->dividerIconbg = $model->dividerIconbg;
        $template->dividerIconbgOutline = $model->dividerIconbgOutline;

        $cssClasses = [
            $template->dividerWidth,
            
            
        ];
        if ($template->dividerAddIcon) {  
            $cssClasses[] = $template->dividerStyle;
            $cssClasses[] = $template->dividerIconbg;
            if ($template->dividerIconbgOutline) {
                $cssClasses[] = 'dividerBorder';
            };
        };    

            $cssClass = implode(' ',$cssClasses);

            $template->cssClass = $cssClass;

            $template->class .= ' '.$cssClass;

        

        return new Response($template->parse());
    }


}


