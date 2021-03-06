<?php
/**
 * Created by PhpStorm.
 * User: basil
 * Date: 12.12.17
 * Time: 22:58
 */

namespace AppBundle\Action;


use AppBundle\Repository\PatientRepository;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ListAction extends \Requestum\ApiBundle\Action\ListAction
{
    private $router;

    public function __construct($entity, UrlGeneratorInterface $router)
    {
        parent::__construct($entity);
        $this->router = $router;
    }
    /**
     * @param Pagerfanta $data
     * @param int $status
     * @param array $serializationContext
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    protected function handleResponse($data, $status = Response::HTTP_OK, array $serializationContext = [])
    {
        $data = [
            'navigation' =>
                [
                    0 =>
                        [
                            'id' => 'AZ',
                            'name' => 'sortation',
                            'url' => $this->router->generate('patients', ['status' =>1 ], UrlGeneratorInterface::ABSOLUTE_URL),
                            'title' => 'Patienten-Liste',
                            'collection' => 'patient',
                            'group' => false,
                            'filter' =>
                                [
                                    'status' => 1,
                                ],
                            'filterBox' => PatientRepository::$SEARCH_FIELDS,
                        ],
                    1 =>
                        [
                            'id' => 'group',
                            'name' => 'group',
                            'url' => $this->router->generate('groups', [], UrlGeneratorInterface::ABSOLUTE_URL),
                            'title' => 'Patienten-Liste',
                            'collection' => 'patient',
                            'group' => true,
                        ],
                    2 =>
                        [
                            'id' => 'archive',
                            'name' => 'archive',
                            'url' => $this->router->generate('patients', ['status' =>0 ], UrlGeneratorInterface::ABSOLUTE_URL),
                            'title' => 'Liste der archivierten Patienten',
                            'collection' => 'patient',
                            'group' => false,
                            'filter' =>
                                [
                                    'status' => 0,
                                ],
                        ],
                ],
            'collections' =>
                [
                    'patient' => $data,
                ],
        ];

        return parent::handleResponse($data, $status, $serializationContext); // TODO: Change the autogenerated stub
    }

}