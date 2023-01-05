<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    /**
     * @var int|null
     */
    protected const MAX_FILTERS = 10;

    protected Request $request;

    protected Builder $builder;

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {

            /** @var string $name */

            if (method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }

        return $this->builder;
    }

    /**
     * @return array|string|null
     */
    private function filters(): array|string|null
    {
        $query = $this->request->query();

        abort_if(
            self::MAX_FILTERS !== null && count($query) > self::MAX_FILTERS,
            400,
            'Too many filters'
        );

        return $query;
    }
}
