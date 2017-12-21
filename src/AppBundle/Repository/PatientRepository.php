<?php

namespace AppBundle\Repository;
use AppBundle\Service\Filter\ActiveHandler;
use Requestum\ApiBundle\Filter\Handler\OrderHandler;
use Requestum\ApiBundle\Filter\Handler\SearchHandler;
use Requestum\ApiBundle\Repository\ApiRepositoryTrait;
use Requestum\ApiBundle\Repository\FilterableRepositoryInterface;

/**
 * FileRepository
 */
class PatientRepository extends \Doctrine\ORM\EntityRepository implements FilterableRepositoryInterface
{
    use ApiRepositoryTrait;

    public static $SEARCH_FIELDS = ['name', 'email', 'groups.name', 'phone'];

    protected function createHandlers()
    {
        return [
            new SearchHandler(['name', 'email', 'groups.name', 'phone']),
        ];
    }

}
