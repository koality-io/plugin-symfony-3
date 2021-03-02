<?php

namespace Koalityio\Symfony3Bundle\Controller;

use Leankoala\HealthFoundation\Check\Device\SpaceUsedCheck;
use Leankoala\HealthFoundation\HealthFoundation;
use Leankoala\HealthFoundation\Result\Format\Koality\KoalityFormat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ServerController
 *
 * @package Koalityio\Symfony3Bundle\Controller
 *
 * @author Nils Langner <nils.langner@leankoala.com>
 * created 2021-03-02
 */
class ServerController extends Controller
{
    /**
     * @param string $secret
     *
     * @return JsonResponse
     */
    public function indexAction($secret)
    {
        $this->assertIsAllowed($secret);

        $healthFoundation = new HealthFoundation();

        $spaceUsedChecked = new SpaceUsedCheck();
        $spaceUsedChecked->init(80, '/');

        $healthFoundation->registerCheck($spaceUsedChecked);

        $result = $healthFoundation->runHealthCheck();

        $formatter = new KoalityFormat();

        $resultArray = $formatter->handle($result, false);

        $response = new JsonResponse($resultArray);

        $response->setEncodingOptions($response->getEncodingOptions() | JSON_PRETTY_PRINT);

        return $response;
    }

    private function assertIsAllowed($secret)
    {

    }
}
