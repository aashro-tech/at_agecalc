<?php

declare(strict_types=1);

namespace AgeCalc\AgeCalc\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class AgeController extends ActionController
{
    public function listAction(): ResponseInterface
    {
        /** @var ContentObjectRenderer|null $contentObject */
        $contentObject = $this->request->getAttribute('currentContentObject');

        $data = $contentObject?->data ?? [];

        $settings = [
            'calc_alignment'   => $data['calc_alignment'] ?? '',
            'calc_header'      => $data['calc_header'] ?? '',
            'calc_header_clr'  => $data['calc_header_clr'] ?? '',
            'calc_btn_name'    => $data['calc_btn_name'] ?? '',
            'rst_btn_name'     => $data['rst_btn_name'] ?? '',
            'btn_bgclr'        => $data['btn_bgclr'] ?? '',
            'btn_txtclr'       => $data['btn_txtclr'] ?? '',
            'bg_clr_type'      => $data['bg_clr_type'] ?? '',
            'solid_bgclr'      => $data['solid_bgclr'] ?? '',
            'grdnt_clr1'       => $data['grdnt_clr1'] ?? '',
            'grdnt_clr2'       => $data['grdnt_clr2'] ?? '',
        ];

        $this->view->assign('settings', $settings);

        $response = $this->responseFactory->createResponse();
        $response->getBody()->write($this->view->render());

        return $response;
    }
}
