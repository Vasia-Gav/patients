<?php

namespace AppBundle\Repository;
use Requestum\ApiBundle\Filter\Handler\SearchHandler;
use Requestum\ApiBundle\Repository\ApiRepositoryTrait;
use Requestum\ApiBundle\Repository\FilterableRepositoryInterface;

/**
 * FileRepository
 */
class PatientRepository extends \Doctrine\ORM\EntityRepository implements FilterableRepositoryInterface
{
    use ApiRepositoryTrait;

    protected function createHandlers()
    {
        return [
            new SearchHandler(['name', 'email', 'groups.name', 'phone'])
        ];
    }


}
