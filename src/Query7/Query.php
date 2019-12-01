<?php
declare(strict_types=1);
namespace Query7;

use Query7\CrudQuery\{InsertQuery, SelectQuery, UpdateQuery, DeleteQuery};

final class Query
{
    
    /**
     * @param string|null $into
     * @return InsertQuery
     */
    public static function insert(?string $into = ""): InsertQuery
    {
        return (new InsertQuery())->into($into);
    }

    /**
     * @param string ...$cols
     * @return SelectQuery
     */
    public static function select(string ...$cols): SelectQuery
    {
        return (new SelectQuery())->columns(...$cols);
    }

    /**
     * @return UpdateQuery
     */
    public static function update(): UpdateQuery
    {
        return new UpdateQuery();
    }

    /**
     * @return DeleteQuery
     */
    public static function delete(): DeleteQuery
    {
        return new DeleteQuery();
    }

}
