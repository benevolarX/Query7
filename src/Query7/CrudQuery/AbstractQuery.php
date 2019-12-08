<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

abstract class AbstractQuery implements QueryInterface
{

    /**
     * @return boolean
     */
    abstract public function isValidQuery(): bool;

    /**
     * @return string
     */
    public function __toString(): string
    {
        if ($this->isValidQuery()) {
            return rtrim(preg_replace('/\s+/', ' ', $this->generateQuery()));
        }
        return "";
    }

    /**
     * @return string
     */
    abstract protected function generateQuery(): string;
}
