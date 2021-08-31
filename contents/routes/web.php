<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Routing\Router;

/** @var $router Router */
$router->group(['namespace' => 'React', 'prefix' => 'react'], function (Router $router) {
    $router->get('chart', 'ChartTestController@show');
});

$router->group(['middleware' => ['api', 'cors'], 'namespace' => 'API', 'prefix' => 'api'], function (Router $router) {
    $router->group(['namespace' => 'Redux'], function (Router $router) {
        $router->group(['prefix' => 'v1'], function (Router $router) {

            // Comment router
            $router->group(['namespace' => 'Comment', 'prefix' => 'comment'], function (Router $router) {
                $router->get('{page}', 'GetController@getComments');
                $router->get('{comment_id}', 'GetController@findComment');

                cors($router);
                $router->post('/', 'PostController@postComment');
            });

            // Nominee router
            $router->group(['namespace' => 'Nominee', 'prefix' => 'nominee'], function (Router $router) {
                $router->post('/', 'PostController@postNominees');
            });

            // PointHistory router
            $router->group(['namespace' => 'PointHistory', 'prefix' => 'pointHistory'], function (Router $router) {
                $router->get('/', 'GetController@getPointHistories');

                $router->post('/', 'PostController@postPointHistory');
            });

            // Prize router
            $router->group(['namespace' => 'Prize', 'prefix' => 'prize'], function (Router $router) {
                $router->get('/', 'GetController@getPrizes');

                $router->post('/', 'PostController@postPrize');
            });

            // PrizeExchangeHistory router
            $router->group(['namespace' => 'PrizeExchangeHistory', 'prefix' => 'prizeExchangeHistory'], function (Router $router) {
                $router->get('/', 'GetController@getPrizeExchangeHistories');

                $router->post('/', 'PostController@postPrizeExchangeHistory');
            });

            // Reaction router
            $router->group(['namespace' => 'Reaction', 'prefix' => 'reaction'], function (Router $router) {
                $router->get('/', 'GetController@getReactions');

                cors($router);
                $router->post('/', 'PostController@postReaction');
            });

            // Users router
            $router->group(['namespace' => 'User', 'prefix' => 'user'], function (Router $router) {
                $router->get('/', 'GetController@getUsers');
                $router->get('auth', 'GetController@findAuth');
                $router->get('{user_id}', 'GetController@findUser');

                cors($router, 'stamina');
                $router->put('stamina', 'PutController@recoverStamina');
                cors($router, '{user_id}');
                $router->put('{user_id}', 'PutController@editUser');
            });
        });
    });
});

/**
 * @param Router $router
 * @param string $route
 * @return \Illuminate\Routing\Route
 */
function cors(Router $router, string $route = '/')
{
    return $router->options($route, function () {
        return response()->json();
    });
}
