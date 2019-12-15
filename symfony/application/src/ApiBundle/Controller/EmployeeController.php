<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Company;
use ApiBundle\Entity\Employee;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class EmployeeController
 * @Route("/employee")
 *
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\Controller
 */
class EmployeeController extends AbstractController
{
    /**
     * @Route("/add", name="api_employee")
     * @Method("POST")
     * @param Request $request
     * @return JsonResponse
     */
    public function newAction(Request $request)
    {
        try {

            $requestContent = json_decode($request->getContent(), true);

            /** @var Company $company */
            $company = $this
                ->getDoctrine()
                ->getRepository('ApiBundle:Company')
                ->find($requestContent['company']);

            if (($requestContent['score'])) {
                $employee = new Employee();
                $employee
                    ->setScore($requestContent['score'])
                    ->setCreated(new \DateTime('now'))
                    ->setModified(new \DateTime('now'))
                    ->setCompany($company);

                $this->getDoctrine()->getManager()->persist($employee);
                $this->getDoctrine()->getManager()->flush();
            }

            return $this->createResponse(['success' => true], Response::HTTP_OK);

        } catch (\Exception $ex) {
            return $this->createResponse($ex, $ex->getCode());
        }
    }
}