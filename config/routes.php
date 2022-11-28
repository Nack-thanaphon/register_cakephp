<?php

/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;



return static function (RouteBuilder $routes) {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */

    $routes->setRouteClass(DashedRoute::class);

    $routes->connect('/', ['controller' => 'home', 'action' => 'index']);
    $routes->connect('/', ['controller' => 'home', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/blogs', ['controller' => 'posts', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/products', ['controller' => 'products', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/business', ['controller' => 'aboutus', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/branch', ['controller' => 'aboutus', 'action' => 'ourbranch'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/aboutUs',  ['controller' => 'aboutus', 'action' => 'aboutus'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/cart', ['controller' => 'cart', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/customer', ['controller' => 'aboutus', 'action' => 'ourcustomer'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/login', ['controller' => 'users', 'action' => 'login']);
    $routes->connect('/logout', ['controller' => 'users', 'action' => 'logout']);
    $routes->connect('/register', ['controller' => 'users', 'action' => 'register'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/verification', ['controller' => 'Users', 'action' => 'verification'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/resetpassword', ['controller' => 'users', 'action' => 'resetpassword'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/forgetpassword', ['controller' => 'users', 'action' => 'forgetpassword'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('api/product', ['controller' => 'api', 'action' => 'product']);





    $routes->scope('/', function ($routes) {
        $routes->setextensions(['json']);
        $routes->connect(
            '/{controller}',
            ['action' => 'index'],
            ['routeClass' => 'ADmad/I18n.I18nRoute']
        );
        $routes->connect(
            '/{controller}/{action}/*',
            [],
            ['routeClass' => 'ADmad/I18n.I18nRoute']
        );

        $routes->fallbacks();
    });

    $routes->prefix('Customer', function (RouteBuilder $routes) {

        $routes->connect('/', ['controller' => 'dashboard', 'action' => 'index']);
        $routes->connect(
            '/payment/{token}',
            array('controller' => 'dashboard', 'action' => 'payment'),
            array(
                'pass' => array('token')
            )
        );
        $routes->fallbacks(DashedRoute::class);
    });
    $routes->prefix('Admin', function (RouteBuilder $routes) {

        $routes->connect('/', ['controller' => 'dashboard', 'action' => 'index']);
        $routes->connect('/users', ['controller' => 'users', 'action' => 'index']);
        $routes->connect('/posts', ['controller' => 'posts', 'action' => 'index']);
        $routes->connect('/postcover', ['controller' => 'posts', 'action' => 'postcover']);
        $routes->connect('/dashboard', ['controller' => 'dashboard', 'action' => 'index']);
        $routes->connect('/branch', ['controller' => 'branch', 'action' => 'index']);
        $routes->connect('/contact', ['controller' => 'contact', 'action' => 'index']);
        $routes->connect('/products', ['controller' => 'products', 'action' => 'index']);
        $routes->connect('/carts', ['controller' => 'cart', 'action' => 'index']);
        $routes->connect('/orders', ['controller' => 'orders', 'action' => 'index']);
        $routes->fallbacks(DashedRoute::class);
    });
};
