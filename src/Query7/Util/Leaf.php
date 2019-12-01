<?php
declare(strict_types=1);
namespace Query7\Util;

class Leaf extends ConditionTree
{
    /**
     * @var string
     */
    private $condition;

    public function __construct(string $condition)
    {
        $this->condition = $condition;
    }

    public function generateTree(): string
    {
        return $this->condition;
    }
}
