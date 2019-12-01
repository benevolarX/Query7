<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;

interface WhereInterface
{

    /**
     * @param string|ConditionTree $condition
     * @param string|null $op
     * @return QueryInterface
     */
    public function where($condition, ?string $op = 'AND');

    /**
     * @param string|ConditionTree $condition
     * @return QueryInterface
     */
    public function andWhere($condition);

    /**
     * @param string|ConditionTree $condition
     * @return QueryInterface
     */
    public function orWhere($condition);

    /**
     * @param ConditionTree $tree
     * @return QueryInterface
     */
    public function setWhere(ConditionTree $tree);

    /**
     * @return string
     */
    public function generateWhere(): string;
}
