<?php

namespace App\Concerns;

trait UniqueIdentifier
{
    private function try($length): int
    {
        if ($length <= 4) {
            throw new \Exception('A unique identifier should be more than 4 characters!');
        } elseif ($length > 64) {
            throw new \Exception('A unique identifier cannot be longer than 64 characters!');
        }

        $min = $max = 0;

        for ($i = 1; $i <= $length; $i++) {
            $max .= '9';
        }

        $min = ((int) $max + 1) / 10;

        return random_int($min, $max);
    }

    private function identifierExists($identifier, $column = 'serial'): bool
    {
        $model = get_class($this);

        if (! in_array($column, $this->getFillable())) {
            throw new \Exception("Model `{$model}` does not have `{$column}` property!");
        }

        return self::query()
            ->where($column, $identifier)
            ->exists();
    }

    public function generateUniqueIdentifier($column = 'serial', $length = 8): int
    {
        $identifier = $this->try($length);

        if ($this->identifierExists($identifier)) {
            return $this->generateUniqueIdentifier($column, $length);
        }

        return $identifier;
    }
}
