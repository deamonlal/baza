<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
class WorkerFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const SURNAME = 'surname';
    public const EMAIL = 'email';
    public const FROM = 'from';
    public const TO = 'to';
    public const DESCRIPTION = 'description';
    public const IS_MARRIED = 'is_married';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::SURNAME => [$this, 'surname'],
            self::EMAIL => [$this, 'email'],
            self::FROM => [$this, 'from'],
            self::TO => [$this, 'to'],
            self::DESCRIPTION => [$this, 'description'],
            self::IS_MARRIED => [$this, 'isMarried'],
        ];
    }

    public function name(Builder $builder, $value): void
    {
        $builder->where('name', 'like', "%$value%");
    }

    public function surname(Builder $builder, $value): void
    {
        $builder->where('surname', 'like', "%$value%");
    }

    public function email(Builder $builder, $value): void
    {
        $builder->where('email', 'like', "%$value%");
    }

    public function from(Builder $builder, $value): void
    {
        $builder->where('age', '>', $value);
    }

    public function to(Builder $builder, $value): void
    {
        $builder->where('age', '<', $value);
    }

    public function description(Builder $builder, $value): void
    {
        $builder->where('description', 'like', "%$value%");
    }

    public function isMarried(Builder $builder, $value): void
    {
        $builder->where('is_married', true);
    }
}
