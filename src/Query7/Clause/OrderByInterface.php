<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;

interface OrderByInterface
{

    /**
     * @param string $order
     * @param boolean|null $desc
     * @return QueryInterface
     */
    public function orderBy(string $order, ?bool $desc = false);

    /**
     * @return string
     */
    public function generateOrderBy(): string;
}
