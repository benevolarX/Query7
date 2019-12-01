<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

use Query7\Clause\{FromInterface, GroupByHavingInterface, JoinInterface, OrderByInterface, WhereInterface};

interface SelectQueryInterface extends QueryInterface, FromInterface, JoinInterface, GroupByHavingInterface, WhereInterface, OrderByInterface
{
    /**
     * @param string $col
     * @param string|null $alias
     * @return self
     */
    public function column(string $col, ?string $alias = null): self;

    /**
     * @param string ...$cols
     * @return self
     */
    public function columns(string ...$cols): self;
}
