<?php
  
namespace App\Http;
  
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\IsAdmin;
  
class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        'admin' => IsAdmin::class
    ];
}