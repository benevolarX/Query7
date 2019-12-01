<?php
declare(strict_types=1);
namespace Query7\Util;

abstract class ConditionTree
{

    /**
     * @return string
     */
    abstract protected function generateTree(): string;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->generateTree();
    }

    /**
     * @param ConditionTree $tree
     * @return Tree
     */
    public function or(ConditionTree $tree): Tree
    {
        return new Tree($this, $tree, 'OR');
    }

    /**
     * @param ConditionTree $tree
     * @return Tree
     */
    public function and(ConditionTree $tree): Tree
    {
        return new Tree($this, $tree, 'AND');
    }
}
