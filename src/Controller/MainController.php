<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class MainController extends AbstractController
{
    /**
     * @Route("/change-locale/{locale}", name="change_locale")
     * @param $locale
     * @param Request $request
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function changeLocale($locale, Request $request, TranslatorInterface $translator): Response
    {

        //on stocke la langue demandé
        $request->getSession()->set('_locale', $locale);

        //on reviens sur la page percedente
        return $this->redirect($request->headers->get('referer'));
    }
}
