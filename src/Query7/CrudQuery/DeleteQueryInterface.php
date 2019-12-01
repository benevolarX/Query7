<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

use Query7\Clause\LimitInterface as Limit;
use Query7\Clause\OnceTableInterface as Once;
use Query7\Clause\OrderByInterface as Order;
use Query7\Clause\WhereInterface as Where;

interface DeleteQueryInterface extends QueryInterface, Once, Where, Order, Limit
{

}
