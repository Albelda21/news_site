<?php

namespace Library;

class Request
{
    private $get;
    private $post;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
    }

    public function post($key, $default = null)
    {
        // if else ?
        return isset($this->post[$key]) ? $this->post[$key] : $default;
    }

    public function get($key, $default = null)
    {
        // if else ?
        return isset($this->get[$key]) ? $this->get[$key] : $default;
    }

    public function server($key, $default = null)
    {
        // if else ?
        return isset($this->server[$key]) ? $this->server[$key] : $default;
    }

    public function isPost()
    {
        return (bool)$this->post;
    }

    public function getIpAddress()
    {
        return $this->server('REMOTE_ADDR');
    }

    public function mergeGet($newGet)
    {
        $this->get += $newGet;
        $_GET += $newGet;
    }
    
    public function getUri()
    {
        $uri = explode('?', $_SERVER['REQUEST_URI']);
        $uri = $uri[0];
        return $uri;
    }
}