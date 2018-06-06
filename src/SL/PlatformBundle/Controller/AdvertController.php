<?php

namespace SL\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SL\PlatformBundle\Entity\Advert;
use SL\PlatformBundle\Form\AdvertType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('SLPlatformBundle:Advert');
        $adverts = $repository->findAll();

        return $this->render('SLPlatformBundle:Advert:index.html.twig', array(
                    'adverts' => $adverts
        ));
    }

    public function addAction(Request $request) {
        $advert = new Advert();
        $form = $this->createForm(AdvertType::class, $advert);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($advert);
            $em->flush();

            return $this->redirectToRoute('sl_platform_view', array('id' => $advert->getId()));
        }

        return $this->render('SLPlatformBundle:Advert:add.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function viewAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('SLPlatformBundle:Advert');
        $advert = $repository->find($id);

        if ($advert === null) {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");
        }

        return $this->render('SLPlatformBundle:Advert:view.html.twig', array(
                    'advert' => $advert
        ));
    }

    public function editAction(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $advert = $em->getRepository('SLPlatformBundle:Advert')->find($id);

        if ($advert === null) {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");
        }

        $form = $this->createForm(AdvertType::class, $advert);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($advert);
            $em->flush();

            return $this->redirectToRoute('sl_platform_view', array('id' => $advert->getId()));
        }

        return $this->render('SLPlatformBundle:Advert:edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function deleteAction(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $advert = $em->getRepository('SLPlatformBundle:Advert')->find($id);

        if ($advert === null) {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");
        }

        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->remove($advert);
            $em->flush();

            return $this->redirectToRoute('sl_platform_home');
        }

        return $this->render('SLPlatformBundle:Advert:delete.html.twig', array(
                    'form' => $form->createView(),
                    'advert' => $advert
        ));
    }

}
