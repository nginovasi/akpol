<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class PublicAuthentication implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // $request = \Config\Services::request();
        // var_dump($request->uri->getSegments());
    }
}