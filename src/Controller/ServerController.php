<?php

namespace Koalityio\Symfony3Bundle\Controller;

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
    const SERVICE_NAME = 'koalityio_healthfoundation';

    /**
     * @param string $secret
     *
     * @return JsonResponse
     */
    public function indexAction($secret)
    {
        $this->assertIsAllowed($secret);

        if ($this->has(self::SERVICE_NAME)) {
            /** @var HealthFoundation $healthFoundation */
            $healthFoundation = $this->get(self::SERVICE_NAME);
        } else {
            $healthFoundation = new HealthFoundation();
        }

        $result = $healthFoundation->runHealthCheck();

        $formatter = new KoalityFormat();
        $response = new JsonResponse($formatter->handle($result, false));

        $response->setEncodingOptions($response->getEncodingOptions() | JSON_PRETTY_PRINT);

        return $response;
    }

    private function assertIsAllowed($secret)
    {

    }
}
