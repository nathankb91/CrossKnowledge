<?php

require_once "cache.php";

/**
 * Class SimpleJsonRequest
 */
class SimpleJsonRequest
{

    private static function makeRequest(string $method, string $url, array $parameters = null, array $data = null) 
    {
        $opts = [
            'http' => [
                'method' => $method,
                'header' => 'Content-type: application/json',
                'content' => $data ? json_encode($data) : null
            ]
        ];

        $url .= ($parameters ? '?' . http_build_query($parameters) : '');

        return file_get_contents($url, false, stream_context_create($opts));
    }

    public static function get(string $url, array $parameters = null, string $cacheKey = null, int $ttl = 86400) 
    {
        if (!is_null($cacheKey) && Cache::exists($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $response = json_decode(self::makeRequest('GET', $url, $parameters), true);

        if (!is_null($cacheKey) && !is_null($response)) {
            Cache::set($cacheKey, $response, $ttl);
        }

        return $response;
    }

    public static function post(string $url, array $parameters = null, array $data = null, string $cacheKey = null): array
    {
        return json_decode(self::makeRequest('POST', $url, $parameters, $data), true);
    }

    public static function put(string $url, array $parameters = null, array $data = null, string $cacheKey = null): array
    {
        return json_decode(self::makeRequest('PUT', $url, $parameters, $data), true);
    }

    public static function patch(string $url, array $parameters = null, array $data = null, string $cacheKey = null): array
    {
        return json_decode(self::makeRequest('PATCH', $url, $parameters, $data), true);
    }

    public static function delete(string $url, array $parameters = null, array $data = null, string $cacheKey = null): array
    {
        return json_decode(self::makeRequest('DELETE', $url, $parameters, $data), true);
    }
}