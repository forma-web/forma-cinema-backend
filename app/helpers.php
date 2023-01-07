<?php

if ( ! function_exists('extract_collection')) {
    /**
     * @param string $key
     * @param string $separator
     * @param bool $trim
     * @return \Illuminate\Support\Collection
     */
    function extract_collection(string $key, string $separator = ',', bool $trim = true): \Illuminate\Support\Collection
    {
        return str($key)
            ->explode($separator)
            ->filter(fn ($item) => strlen((string)$item) > 0)
            ->when($trim, function (\Illuminate\Support\Collection $collection) {
                return $collection->map(fn ($item) => trim($item));
            });
    }
}
