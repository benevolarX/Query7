<?php
declare(strict_types=1);
namespace Query7\Util;

class Tree extends ConditionTree
{
    /**
     * @var ConditionTree
     */
    protected $a;

    /**
     * @var ConditionTree
     */
    protected $b;

    /**
     * @var string
     */
    protected $op;

    /**
     * @param ConditionTree $a
     * @param ConditionTree $b
     * @param string $op
     */
    public function __construct(ConditionTree $a, ConditionTree $b, string $op = 'AND')
    {
        $this->a = $a;
        $this->b = $b;
        $this->op = $op;
    }

    /**
     * @return string
     */
    public function generateTree(): string
    {
        $left = $this->a->generateTree();
        $right = $this->b->generateTree();
        $operator = $this->op;
        return "($left $operator $right)";
    }
    
}
