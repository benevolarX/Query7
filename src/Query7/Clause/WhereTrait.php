<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;
use Query7\Util\{ConditionTree, Leaf, Tree};

trait WhereTrait
{
    /**
     * @var ConditionTree|null
     */
    protected $where = null;

    /**
     * @param string|ConditionTree $condition
     * @param string|null $op
     * @return QueryInterface
     */
    public function where($condition, ?string $op = 'AND')
    {
        $leaf = (\is_string($condition)) ? new Leaf($condition) : $condition;
        $this->where = ($this->where === null) ? $leaf : new Tree($this->where, $leaf, $op);
        return $this;
    }

    /**
     * @param string|ConditionTree $condition
     * @return QueryInterface
     */
    public function andWhere($condition)
    {
        return $this->where($condition, 'AND');
    }

    /**
     * @param string|ConditionTree $condition
     * @return QueryInterface
     */
    public function orWhere($condition)
    {
        return $this->where($condition, 'OR');
    }

    /**
     * @param ConditionTree $tree
     * @return QueryInterface
     */
    public function setWhere(ConditionTree $tree)
    {
        $this->where = $tree;
        return $this;
    }

    /**
     * @return string
     */
    public function generateWhere(): string
    {
        return ($this->where !== null) ? "WHERE " . $this->where->generateTree() : "";
    }
}
