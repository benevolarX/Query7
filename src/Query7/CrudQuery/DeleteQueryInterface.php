<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

use Query7\Clause\{LimitInterface, OnceTableInterface, OrderByInterface, WhereInterface};

interface DeleteQueryInterface extends QueryInterface, OnceTableInterface, WhereInterface, OrderByInterface, LimitInterface
{

}
