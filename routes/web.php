<?php

use Symfony\Component\HttpFoundation\Request;
use Intercom\IntercomClient;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->post('/webhook', function(Request $request) use($router) { 
    print_r($request->request->all());

    $client = new Intercom\IntercomClient(env('INTERCOM_TOKEN'));
    /**
     * Reply to a user's last conversation
     * See more options here: https://developers.intercom.com/reference#replying-to-users-last-conversation
     */

    $client->conversations->replyToLastConversation([
        "email" => "test@example.com",
        "body" => "Thanks :)",
        "type" => "user",
        "message_type" => "comment"
    ]);
});