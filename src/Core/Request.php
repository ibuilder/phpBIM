<?php

class Request
{
    private $requestMethod;
    private $requestUri;
    private $requestBody;
    private $queryParams;

    public function __construct()
    {
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->requestBody = json_decode(file_get_contents('php://input'), true);
        $this->queryParams = $_GET;
    }

    public function getMethod()
    {
        return $this->requestMethod;
    }

    public function getUri()
    {
        return $this->requestUri;
    }

    public function getBody()
    {
        return $this->requestBody;
    }

    public function getQueryParams()
    {
        return $this->queryParams;
    }

    public function isPost()
    {
        return $this->requestMethod === 'POST';
    }

    public function isGet()
    {
        return $this->requestMethod === 'GET';
    }

    public function isPut()
    {
        return $this->requestMethod === 'PUT';
    }

    public function isDelete()
    {
        return $this->requestMethod === 'DELETE';
    }
}