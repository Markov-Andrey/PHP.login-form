<?php

/*uri, page_name*/
use App\Services\Router;
use App\Controllers\Auth;

Router::page('/', 'home');
Router::page('/login', 'login');
Router::page('/register', 'register');
Router::page('/logout', 'logout');
Router::page('/articles1', 'articles1');
Router::page('/nojs', 'nojs');

Router::post('/auth/register', Auth::class, 'register');

Router::enable();