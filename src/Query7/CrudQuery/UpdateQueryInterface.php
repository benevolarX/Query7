<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

use Query7\Clause\{LimitInterface, OnceTableInterface, OrderByInterface, WhereInterface};

interface UpdateQueryInterface extends QueryInterface, OnceTableInterface, WhereInterface, OrderByInterface, LimitInterface
{

    /**
     * @param array $vals
     * @return self
     */
    public function set(array $vals): self;

    /**
     * @return string
     */
    public function generateSet(): string;
    
}
