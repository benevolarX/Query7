<?php
declare(strict_types=1);
namespace Query7\Util;

final class Condition
{
    public const IS_NULL = " IS NULL";
    public const IS_NOT_NULL = " IS NOT NULL";

    /**
     * @param string $pattern
     * @return string
     */
    public static function like(string $pattern): string
    {
        return " LIKE $pattern";
    }

    /**
     * @param string|int $min
     * @param string|int $max
     * @return string
     */
    public static function between($min, $max): string
    {
        return " BETWEEN $min AND $max";
    }

    /**
     * @param array|string $group
     * @return string
     */
    public static function in($group): string
    {
        $setGroup = (\is_array($group)) ? \implode(', ', $group) : $group;
        return " IN ( $setGroup )";
    }

    /**
     * @param string|int $val
     * @return string
     */
    public static function isEqual($val): string
    {
        return " = $val";
    }

    /**
     * @param string|int $val
     * @return string
     */
    public static function isNotEqual($val): string
    {
        return " <> $val";
    }

    /**
     * @param string|int $val
     * @return string
     */
    public static function isInf($val): string
    {
        return " < $val";
    }

    /**
     * @param string|int $val
     * @return string
     */
    public static function isInfOrEqual($val): string
    {
        return " <= $val";
    }

    /**
     * @param string|int $val
     * @return string
     */
    public static function isSup($val): string
    {
        return " > $val";
    }

    /**
     * @param string|int $val
     * @return string
     */
    public static function isSupOrEqual($val): string
    {
        return " >= $val";
    }
}
