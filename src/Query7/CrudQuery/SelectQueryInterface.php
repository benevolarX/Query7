<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

interface SelectQueryInterface extends QueryInterface
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
