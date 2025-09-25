<?php
class HttpClientException extends Exception
{
    public function __construct(string $metodo, string $url)
    {
        parent::__construct("Ocorreu um erro ao fazer requisição $metodo para a URL $url");
    }
}