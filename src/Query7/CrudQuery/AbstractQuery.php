<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

abstract class AbstractQuery implements QueryInterface
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return rtrim(preg_replace('/\s+/', ' ', $this->generateQuery()));
    }

    /**
     * @return string
     */
    abstract public function generateQuery(): string;

    /**
     * @return boolean
     */
    abstract public function isValid(): bool;
}
