<?php

$authentication = function() use($app) {
	ApiAuth::authentication($app->request->headers);
};

$app->get('/',                   function()       use ($app) {  echo 'Denied';           });

$app->post('/auth/login/',       function()       use ($app) {  ApiAuth::login($app);    });

$app->post('/point/find/',       function()       use ($app) {  ApiPoint::find($app);    });
$app->post('/point/list/',       function()       use ($app) {  ApiPoint::list($app);    });
$app->post('/point/create/',     function()       use ($app) {  ApiPoint::create($app);  });
$app->post('/point/update/',     function()       use ($app) {  ApiPoint::update($app);    });
$app->post('/point/delete/',     function()       use ($app) {  ApiPoint::delete($app);  });
