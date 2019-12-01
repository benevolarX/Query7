<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

use Query7\Clause\FromInterface as From;
use Query7\Clause\GroupByHavingInterface as Group;
use Query7\Clause\JoinInterface as Join;
use Query7\Clause\OrderByInterface as Order;
use Query7\Clause\WhereInterface as Where;

interface SelectQueryInterface extends QueryInterface, From, Join, Group, Where, Order
{
    /**
     * @param string $col
     * @param string|null $alias
     * @return SelectQueryInterface
     */
    public function column(string $col, ?string $alias = null): self;

    /**
     * @param string ...$cols
     * @return SelectQueryInterface
     */
    public function columns(string ...$cols): self;
}
