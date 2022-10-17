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
    $routes->connect('/posts', ['controller' => 'posts', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/products', ['controller' => 'products', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);

    $routes->connect('api/product', ['controller' => 'api', 'action' => 'product']);
    $routes->connect('/carts', ['controller' => 'cart', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/carts/add', ['controller' => 'cart', 'action' => 'add']);
    $routes->connect('/Aboutus', ['controller' => 'aboutus', 'action' => 'index'],['routeClass' => 'ADmad/I18n.I18nRoute']);


    $routes->scope('/', function (RouteBuilder $builder) {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Admin', 'action' => 'index']);
        $builder->connect('/:language/:controller/:action/*', array(), array('language' => 'en|th'));

        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        $builder->fallbacks();
    });

    $routes->prefix('Admin', function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'users', 'action' => 'login']);
        $routes->connect('/users/register', ['controller' => 'users', 'action' => 'register']);
        $routes->connect('/users/verification', ['controller' => 'Users', 'action' => 'verification']);
        $routes->connect('/users/resetpassword', ['controller' => 'users', 'action' => 'resetpassword']);
        $routes->connect('/users/forgetpassword', ['controller' => 'users', 'action' => 'forgetpassword']);
        $routes->connect('/posts', ['controller' => 'posts', 'action' => 'index']);
        $routes->connect('/dashboard', ['controller' => 'dashboard', 'action' => 'index']);
        $routes->connect('/products', ['controller' => 'products', 'action' => 'index']);
        $routes->connect('/chat', ['controller' => 'chats', 'action' => 'index']);
        $routes->fallbacks(DashedRoute::class);
    });
    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder) {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
