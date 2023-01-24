<?php

if (!function_exists('extract_collection')) {
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
            ->filter(fn($item) => strlen((string)$item) > 0)
            ->when($trim, function (\Illuminate\Support\Collection $collection) {
                return $collection->map(fn($item) => trim($item));
            });
    }
}

if (!function_exists('parseContentRange')) {
    /**
     * @param string|null $header
     * @return array|null
     */
    function parseContentRange(?string $header): ?array
    {
        if (!$header)
            return null;

        $pattern = '/(\w+) (\d*)-?(\d*|\*)\/(\d+|\*)/';

        if (!preg_match($pattern, $header, $matches))
            return null;

        return array_map(
            function (string $item): int|string|null {
                if (strlen($item) === 0)
                    return null;

                return is_numeric($item) ? (int)$item : $item;
            },
            array_slice($matches, 1),
        );
    }
}
