<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

interface QueryInterface
{
    public function __toString(): string;
    public function generateQuery(): string;
    public function isValid(): bool;
}
