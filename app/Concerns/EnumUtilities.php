<?php

namespace App\Concerns;

trait EnumUtilities
{
    /**
     * Return a list of values on an enum.
     *
     * @return array
     */
    public static function values()
    {
        $values = [];

        foreach (static::cases() as $case) {
            $values[] = $case->value;
        }

        return $values;
    }

    /**
     * Translate the given value.
     *
     * @param  string  $value
     * @return string
     */
    public static function translate($value)
    {
        return __('enum.'.lcfirst(static::getClassName()).'.'.$value);
    }

    /**
     * Return an object with value and its translation.
     *
     * @param  string  $value
     */
    public static function objectify($value): object
    {
        return (object) [
            'value' => $value,
            'translation' => static::translate($value),
        ];
    }

    /**
     * Retrieve class name from namespace.
     *
     * @return string
     */
    private static function getClassName()
    {
        return substr(strrchr(get_called_class(), '\\'), 1);
    }
}
