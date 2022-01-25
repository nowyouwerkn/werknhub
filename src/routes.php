<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    'uses' => 'Nowyouwerkn\WerknHub\Controllers\FrontController@index',
    'as' => 'index',
]);

Route::get('/informacion-legal/{slug}', [
    'uses' => 'Nowyouwerkn\WerknHub\Controllers\FrontController@legalText',
    'as' => 'legal.text',
])->where('slug', '[\w\d\-\_]+');


// Back-End Views
Route::group(['prefix' => 'hub', 'middleware' => ['web', 'can:admin_access']], function(){
    //Dashboard
    Route::get('/', 'Nowyouwerkn\WerknHub\Controllers\DashboardController@index')->name('dashboard'); //
    Route::get('/change-color', [
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\DashboardController@changeColor',
        'as' => 'change.color',
    ]);

    Route::get('/mensajes-actualizaciones', [
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\DashboardController@messages',
        'as' => 'update.messages',
    ]);

    //Configuration
    Route::get('/configuration', 'Nowyouwerkn\WerknHub\Controllers\DashboardController@configuration')->name('configuration'); //

    Route::get('/bienvenido/paso-1',[
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\DashboardController@configStep1',
        'as' => 'config.step1',
    ]);

    Route::get('/bienvenido/paso-2/{id}',[
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\DashboardController@configStep2',
        'as' => 'config.step2',
    ]);

    //Administration
    Route::resource('seo', Nowyouwerkn\WerknHub\Controllers\SEOController::class); //
    Route::resource('extensions', Nowyouwerkn\WerknHub\Controllers\ExtensionController::class); //
    Route::resource('legals', Nowyouwerkn\WerknHub\Controllers\LegalTextController::class);

    Route::resource('users', Nowyouwerkn\WerknHub\Controllers\UserController::class); //
    Route::get('user/config', 'Nowyouwerkn\WerknHub\Controllers\UserController@config')->name('user.config');  //
    Route::get('user/help', 'Nowyouwerkn\WerknHub\Controllers\UserController@help')->name('user.help');  //

    Route::resource('banners', 'Nowyouwerkn\WerknHub\Controllers\BannerController');

    Route::post('/banners/status/{id}', [
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\BannerController@status',
        'as' => 'banners.status',
    ]);

    Route::resource('popups', Nowyouwerkn\WerknHub\Controllers\PopUpController::class);

    Route::post('/popups/status/{id}', [
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\PopupController@status',
        'as' => 'popups.status',
    ]);

    Route::resource('band', Nowyouwerkn\WerknHub\Controllers\HeaderbandController::class);
       Route::post('/band/status/{id}', [
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\HeaderbandController@status',
        'as' => 'band.status',
    ]);

    Route::resource('mail', Nowyouwerkn\WerknHub\Controllers\MailConfigController::class)->except(['show, create, index']);
    Route::resource('notifications', Nowyouwerkn\WerknHub\Controllers\NotificationController::class)->except(['show']); //

    Route::get('/notifications/all',[
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\NotificationController@all',
        'as' => 'notifications.all',
    ]);

    Route::get('/notifications/all/mark-as-read',[
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\NotificationController@markAsRead',
        'as' => 'notifications.mark.read',
    ]);

    //Country
    //Route::resource('countries', Nowyouwerkn\WerknHub\Controllers\CountryController::class); 
    //Route::resource('states', Nowyouwerkn\WerknHub\Controllers\StateController::class); 
    //Route::resource('cities', Nowyouwerkn\WerknHub\Controllers\CityController::class);
    Route::resource('config', Nowyouwerkn\WerknHub\Controllers\SiteConfigController::class); 

    Route::post('config-api-token',[
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\SiteConfigController@apiToken',
        'as' => 'api.token.store',
    ]);

    Route::resource('integrations', Nowyouwerkn\WerknHub\Controllers\IntegrationController::class); 
    Route::get('general-preferences',[
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\IntegrationController@index',
        'as' => 'general.config',
    ]);

    Route::resource('themes', Nowyouwerkn\WerknHub\Controllers\SiteThemeController::class); 

    Route::post('site-logo',[
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\IntegrationController@siteLogo',
        'as' => 'site.logo',
    ]);

    // Sección Soporte
    Route::get('support', 'Nowyouwerkn\WerknHub\Controllers\DashboardController@support')->name('support.help');

    // Búsqueda
    Route::get('/busqueda-general', [
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\DashboardController@generalSearch',
        'as' => 'back.search.query',
    ]);
});

//Profile
Route::group(['prefix' => 'profile', 'middleware' => 'web', 'can:customer_access'], function(){
    Route::get('/', 'Nowyouwerkn\WerknHub\Controllers\FrontController@profile')->name('profile');
    Route::get('account', 'Nowyouwerkn\WerknHub\Controllers\FrontController@account')->name('account');

    Route::put('/account/{id}', [
        'uses' => 'Nowyouwerkn\WerknHub\Controllers\FrontController@updateAccount',
        'as' => 'profile.update',
    ]);
});