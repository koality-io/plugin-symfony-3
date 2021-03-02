<?php

namespace Koalityio\Symfony3Bundle\Controller;

use Leankoala\HealthFoundation\HealthFoundation;
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
        // $expectedApiKey = $this->getParameter('api_key');
        // var_dump($expectedApiKey);
        $healthFoundation = new HealthFoundation();


        return new JsonResponse(['status' => 'pass']);
    }
}
