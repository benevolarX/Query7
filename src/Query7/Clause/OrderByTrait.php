<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;

trait OrderByTrait
{
    /**
     * @var string[]
     */
    protected $order = [];

    /**
     * @param string $order
     * @param boolean|null $desc
     * @return QueryInterface
     */
    public function orderBy(string $order, ?bool $desc = false)
    {
        $this->order[] = $desc ? "$order DESC" : "$order ASC";
        return $this;
    }

    public function generateOrderBy(): string
    {
        return (empty($this->order)) ? "" : "ORDER BY " . \join(', ', $this->order);
    }
}
