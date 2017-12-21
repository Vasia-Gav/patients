<?php

namespace AppBundle\Service\Filter;

use Doctrine\ORM\QueryBuilder;
use Requestum\ApiBundle\Filter\Handler\AbstractByNameHandler;
use Requestum\ApiBundle\Util\QueryBuilderHelper;

class ActiveHandler extends AbstractByNameHandler
{
    /**
     * @var array
     */
    private $activeFields = [];

    /**
     * @var string
     */
    private $rootAlias;

    /**
     * SearchHandler constructor.
     * @param array $activeFields
     * @param string $rootAlias
     */
    public function __construct(array $activeFields, $rootAlias = 'e')
    {
        $this->activeFields = $activeFields;
        $this->rootAlias = $rootAlias;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(QueryBuilder $builder, $filter, $value)
    {
        $whereExpr = $builder
            ->expr()
            ->andX();

        $joined = [];
        foreach ($this->getSearchFields() as $field) {
            $prevJoinColumn = $joinColumn = $this->rootAlias;

            while (false !== $dotPosition = strpos($field, '.')) {
                $joinColumn = substr($field, 0, $dotPosition);
                $field = substr($field, $dotPosition + 1);

                if (!in_array($joinColumn, $joined, true)) {
                    $joined[] = $joinColumn;
                    QueryBuilderHelper::joinOnce($builder, $prevJoinColumn.'.'.$joinColumn, $joinColumn, $this->rootAlias);
                }
                $prevJoinColumn = $joinColumn;
            }

            $whereExpr
                ->add(sprintf('%s.%s = :active', $joinColumn, $field));
        }

        $builder
            ->andWhere($whereExpr)
            ->setParameter('active', $value);
        var_dump($builder->getQuery()); die;
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilterKey()
    {
        return 'active';
    }

    /**
     * @return array Returns list for fields to search. Supports fields in referenced entities in following format: "reference.reference_field",
     *               reference deep is unlimited, so in this case "vehicle.vehicleModel.name" two joins will be performed
     */
    protected function getSearchFields()
    {
        return $this->activeFields;
    }
}