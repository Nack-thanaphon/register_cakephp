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

    $routes->connect('/', ['controller' => 'home', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('blogs', ['controller' => 'posts', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('products', ['controller' => 'products', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('ourBusiness', ['controller' => 'Aboutus', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('ourCustomer', ['controller' => 'Aboutus', 'action' => 'ourcustomer'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('ourBranch', ['controller' => 'Aboutus', 'action' => 'ourbranch'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('AboutUs',  ['controller' => 'Aboutus', 'action' => 'aboutus'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('carts', ['controller' => 'cart', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('api/product', ['controller' => 'api', 'action' => 'product'], ['routeClass' => 'ADmad/I18n.I18nRoute']);


    $routes->scope('/', function (RouteBuilder $builder) {
        $builder->setextensions(['json']);
        $builder->connect('/pages/*', 'Pages::display');
        $builder->connect(
            '/{controller}',
            ['action' => 'index'],
            ['routeClass' => 'ADmad/I18n.I18nRoute']
        );
        $builder->connect(
            '/{controller}/{action}/*',
            [],
            ['routeClass' => 'ADmad/I18n.I18nRoute']
        );
        $builder->fallbacks();
    });

    $routes->prefix('admin', function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'dashboard', 'action' => 'index']);
        $routes->connect('/users', ['controller' => 'users', 'action' => 'index']);
        $routes->connect('/users/register', ['controller' => 'users', 'action' => 'register']);
        $routes->connect('/users/verification', ['controller' => 'Users', 'action' => 'verification']);
        $routes->connect('/users/resetpassword', ['controller' => 'users', 'action' => 'resetpassword']);
        $routes->connect('/users/forgetpassword', ['controller' => 'users', 'action' => 'forgetpassword']);
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
