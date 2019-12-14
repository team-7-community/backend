<?php

namespace ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class GameController
 * @Route("/questions")
 *
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\Controller
 */
class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="api_questions")
     * @Method("GET")
     *
     * @return JsonResponse
     */
    public function questionAction()
    {
        try {
            return $this->createResponse(
                [
                    'questions'=> [
                    [
                        0 => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                        1 => 'Morbi lobortis tincidunt mattis. Aenean condimentum in eros id malesuada',
                        3 => 'Quisque bibendum est ut justo convallis, ut interdum lacus fringilla',
                        4 => 'Aenean quis lacinia justo. Sed sed nibh nibh. Duis rutrum ornare scelerisque',
                        5 => 'Aliquam aliquet semper massa at ultricies'
                    ]
                ]
                ], Response::HTTP_OK);

        } catch (\Exception $ex) {
            return $this->createResponse($ex, $ex->getCode());
        }
    }
}