<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

use App\Controllers\News;
use App\Controllers\Pages;
use App\Controllers\Users;
use App\Controllers\game_news;
use App\Controllers\Apis;

///this is the game news route for api
$routes->get('apis', [Apis::class, 'videogame']);  
$routes->get('apis/game', [Apis::class, 'videogame']);  
$routes->get('game_news', [game_news::class, 'games']);  

$routes->get('news/autocomplete', 'News::autocomplete');


///this is route for news page to create blogs
$routes->match(['get', 'post'], 'news/create', [News::class, 'create']);
///This is the route to delete a blog
$routes->get('news/delete/(:segment)', [News::class, 'deleteNews']);
///This is the route to view a blog
$routes->get('news/(:segment)', [News::class, 'view']);







$routes->get('news', [News::class, 'index']);








$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
$route['default_controller'] = 'home';
$route['about'] = 'About';
$route['post'] = 'Post';

$routes->add('users/login', 'Login::index');




$routes->get('users/login', [Users::class, 'login']);
$routes->get('users/logout', [Users::class, 'logout']);
$routes->get('users/info/(:segment)', [Users::class, 'info']);



$route['contact'] = 'Contact';
$routes->get('contact_us', 'ContactUs::index');



$route['search'] = 'NewsController/search';



$routes->get('pages/register', 'Register::index');







/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
