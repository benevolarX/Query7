<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

interface QueryInterface
{
    /**
     * @return boolean
     */
    public function isValidQuery(): bool;

    /**
     * @return string
     */
    public function __toString(): string;
}
