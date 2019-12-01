<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\Util\ConditionTree;
use Query7\Util\Leaf;
use Query7\CrudQuery\QueryInterface;

trait GroupByHavingTrait
{
    /**
     * @var string[]
     */
    protected $group = [];

    /**
     * @var ConditionTree
     */
    protected $having = null;

    /**
     * @param string $group
     * @return QueryInterface
     */
    public function groupBy(string ...$cols)
    {
        $this->group = \array_merge($cols, $this->group);
        return $this;
    }

    /**
     * @param ConditionTree|string $test
     * @return QueryInterface
     */
    public function having($test)
    {
        $leaf = \is_string($test) ? new Leaf($test) : $test;
        $this->having = $leaf;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isValidGroupByHaving(): bool
    {
        return !empty($this->group) || $this->having === null;
    }

    /**
     * @return string
     */
    public function generateGroupByHaving(): string
    {
        if ($this->isValidGroupByHaving()) {
            $group = $this->generateGroupBy();
            $having = $this->generateHaving();
            return ($having === "") ? $group : "$group $having";
        }
        return "";
    }

    /**
     * @return string
     */
    protected function generateGroupBy(): string
    {
        if (!empty($this->group)) {
            $group = \join(', ', $this->group);
            return "GROUP BY $group";
        }
        return "";
    }

    /**
     * @return string
     */
    protected function generateHaving(): string
    {
        return ($this->having !== null) ? "HAVING $this->having" : "";
    }
}
