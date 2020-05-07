<?php


namespace vendor\libs;


class Cache
{
    public function __construct()
    {

    }

    public function set($key, $data, $seconds = 3600)
    {
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        if (file_put_contents(
            CACHE . '/cache/' . md5($key) . 'a1b2c3.txt', serialize($content)
        )
        ) {
            return true;
        }
        return false;
    }

    public function get($key)
    {
        $file = CACHE . '/cache/' . md5($key) . 'a1b2c3.txt';
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time']) {
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }

    public function delete($key)
    {
        $file = CACHE . '/cache/' . md5($key) . 'a1b2c3.txt';
        if (file_exists($file)) {
            unlink($file);
        }
    }

}
