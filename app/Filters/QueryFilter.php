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

        $queryParameters = $this->getQueryParameters();

        foreach ($queryParameters as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }

        return $this->builder;
    }

    /**
     * @return Array<string, string | null>
     */
    private function getQueryParameters(): array
    {
        /** @var Array<string, string | null> $query */
        $query = $this->request->query();

        $this->validateQueryParameters($query);

        return $query;
    }

    /**
     * @param Array<string, string | null> $query
     * @return void
     */
    private function validateQueryParameters(array $query): void
    {
        abort_if(
            self::MAX_FILTERS !== null && count($query) > self::MAX_FILTERS,
            422,
            'Too many filters'
        );

        $validator = validator($query, $this->rules());

        abort_if($validator->fails(), 422, $validator->errors());
    }

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [];
    }
}
