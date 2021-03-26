<?php


namespace App\Controller;


use App\Entity\InspectionOrder;
use App\Form\Type\InspectionOrderType;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HomeController
 * @package App\Controller
 * @Route("/api/inspection-order")
 */
class InspectionOrderController extends AbstractFOSRestController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $inspectionOrder = new InspectionOrder();
        $inspectionOrder->setData(array("dupa" => "kupa"));

        $em->persist($inspectionOrder);
        $em->flush();

        dd();
    }

    /**
     * @Route("/", name="store", methods={"POST"})
     * @param Request $request
     */
    public function store(Request $request)
    {
        $inspectionOrder = new InspectionOrder();
        $form = $this->createForm(InspectionOrderType::class, $inspectionOrder);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($inspectionOrder);
            $em->flush();
            return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
        }
        return $this->handleView($this->view($form->getErrors()));
    }
}