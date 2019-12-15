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
 * Class BadgeController
 * @Route("/badge")
 *
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\Controller
 */
class BadgeController extends AbstractController
{
    const SILVER_RACIAL_BADGE = [10, 40];
    const BRONZE_RACIAL_BADGE = [0, 10];

    const SILVER_OSEXUAL_BADGE = [10, 40];
    const BRONZE_OSEXUAL_BADGE = [0, 10];

    const SILVER_GEN_BADGE = [10, 40];
    const BRONZE_GEN_BADGE = [0, 10];

    /**
     * @Route("/{company}/{type}/generate", name="api_badge")
     * @Method("GET")
     * @param Request $request, Company $company, string $type
     * @return Response
     */
    public function newAction(Request $request, Company $company, string $type)
    {
        try {
            $scoreType = 0;
            $scoreTypePretty = 'racial';

            switch ($type) {
                case 'racial': {
                    $scoreType = '0';
                    $scoreTypePretty = 'Racial';

                } break;
                case 'orientacao-sexual': {
                    $scoreType = '1';
                    $scoreTypePretty = 'Orientação Sexual';
                } break;
                case 'genero': {
                    $scoreType = '2';
                    $scoreTypePretty = 'Gênero';
                } break;
            }

            $employees = $company->getEmployees();

            $scores = 0;
            $totalEmployees = count($employees);

            /** @var Employee $employee */
            foreach ($employees as $employee) {
                /** Employee $employee */
               $scores += $employee->{'getScore' . $scoreType}();
            }

            $percent = $scores/$totalEmployees;
            $finalScore = number_format( $percent * 100, 2 );
            $badgeType = 'bronze';

            switch ($type) {
                case 'racial': {
                    if ($finalScore >= self::BRONZE_RACIAL_BADGE[1]) $badgeType = 'silver';
                    if ($finalScore >= self::SILVER_RACIAL_BADGE[1]) $badgeType = 'gold';

                } break;
                case 'orientacao-sexual': {
                    if ($finalScore >= self::BRONZE_OSEXUAL_BADGE[1]) $badgeType = 'silver';
                    if ($finalScore >= self::SILVER_OSEXUAL_BADGE[1]) $badgeType = 'gold';
                } break;
                case 'genero': {
                    if ($finalScore >= self::BRONZE_GEN_BADGE[1]) $badgeType = 'silver';
                    if ($finalScore >= self::SILVER_GEN_BADGE[1]) $badgeType = 'gold';
                } break;
            }

//            var_dump($percent_friendly);
//            var_dump($scores);
//            var_dump($totalEmployees);

            return $this->render('ApiBundle:Default:index.html.twig', [
                'score' => $finalScore,
                'type' => $scoreTypePretty,
                'badgeType' => $badgeType,
            ]);

        } catch (\Exception $ex) {
            return $this->createResponse($ex, $ex->getCode());
        }
    }

}