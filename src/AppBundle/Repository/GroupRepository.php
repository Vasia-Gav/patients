<?php

namespace AppBundle\Repository;
use AppBundle\Service\Filter\ActiveHandler;
use Requestum\ApiBundle\Filter\Handler\SearchHandler;
use Requestum\ApiBundle\Repository\ApiRepositoryTrait;
use Requestum\ApiBundle\Repository\FilterableRepositoryInterface;

/**
 * FileRepository
 */
class GroupRepository extends \Doctrine\ORM\EntityRepository implements FilterableRepositoryInterface
{
    use ApiRepositoryTrait;

    protected function createHandlers()
    {
        return [
            new ActiveHandler(['patients.status']),
        ];
    }
}
