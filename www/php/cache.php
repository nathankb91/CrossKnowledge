<?php

/**
 * Class Cache
 */
class Cache
{
    /**
     * Redis instance.
     *
     * @var Cache
     */
    private static ?Redis $instance = null;

    /**
     * Redis host.
     *
     * @var string
     */
    private static string $host = 'redis';

    /**
     * Redis port.
     *
     * @var int
     */
    private static int $port = 6379;

    /**
     * Create a singleton instance of Redis if it not exists.
     *
     * @return Redis
     * @throws Exception
     */
    private static function getInstance(): Redis
    {
        if(self::$instance === null){
            self::$instance = new Redis;
        }

        if (!self::$instance->isConnected() && !self::connect()) {
            throw new \Exception('Could not connect to the Redis Server.', 500);
        }

        return self::$instance;
    }

    /**
     * Create a new redis connection or reuse a connection already established.
     *
     * @return bool
     * @throws Exception
     */
    private static function connect(): bool
    {
        return self::$instance->pconnect(self::$host, self::$port);
    }

    /**
     * Set a new key.
     *
     * @param string $key
     * @param array $data
     * @param int|null $ttl
     */
    public static function set(string $key, array $data, ?int $ttl = null): void
    {
        self::getInstance()->set($key, json_encode($data), $ttl);
    }

    /**
     * Get a key.
     *
     * @param string $key
     * @return array
     */
    public static function get(string $key): array
    {
        return json_decode(self::getInstance()->get($key), true);
    }

    /**
     * Verify if key exists.
     *
     * @param string $key
     * @return bool
     */
    public static function exists(string $key): bool
    {
        return self::getInstance()->exists($key);
    }

    /**
     * Delete a key.
     *
     * @param string $key
     * @return bool
     */
    public static function delete(string $key): bool
    {
        return (bool) self::getInstance()->del($key);
    }
}