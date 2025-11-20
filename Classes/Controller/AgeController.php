<?php

declare(strict_types=1);

namespace AgeCalc\AgeCalc\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;

/**
 * This file is part of the "at_age_calc" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024
 */

/**
 * AgeController
 */
class AgeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return ResponseInterface|null
     */
    public function listAction(): ?ResponseInterface
    {
        $contentElement = $this->configurationManager->getContentObject()->data;
        $settings = [
            'calc_alignment' => $contentElement['calc_alignment'],
            'calc_header' => $contentElement['calc_header'],
            'calc_header_clr' => $contentElement['calc_header_clr'],
            'calc_btn_name' => $contentElement['calc_btn_name'],
            'rst_btn_name' => $contentElement['rst_btn_name'],
            'btn_bgclr' => $contentElement['btn_bgclr'],
            'btn_txtclr' => $contentElement['btn_txtclr'],
            'bg_clr_type' => $contentElement['bg_clr_type'],
            'solid_bgclr' => $contentElement['solid_bgclr'],
            'grdnt_clr1' => $contentElement['grdnt_clr1'],
            'grdnt_clr2' => $contentElement['grdnt_clr2'],
        ];
        // Assign settings to the view
        $this->view->assign('settings', $settings);

        $typo3Version = VersionNumberUtility::getNumericTypo3Version();

        if (version_compare($typo3Version, '11.0', '>=')) {
            // For TYPO3 v11 and v12
            return $this->htmlResponse();
        }

        return null;
    }
}
