<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        Route::group(['prefix'  =>   'categories'], function() {

            Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');

        });

        Route::group(['prefix'  =>   'home'], function() {

            Route::get('/', 'Admin\HomeController@index')->name('admin.homes.index');
            Route::get('/create', 'Admin\HomeController@create')->name('admin.homes.create');
            Route::post('/store', 'Admin\HomeController@store')->name('admin.homes.store');
            Route::get('/{id}/edit', 'Admin\HomeController@edit')->name('admin.homes.edit');
            Route::post('/update', 'Admin\HomeController@update')->name('admin.homes.update');
            Route::get('/{id}/delete', 'Admin\HomeController@delete')->name('admin.homes.delete');
        });


        Route::group(['prefix'  =>   'setting'], function() {

            Route::get('/', 'Admin\SettingController@index')->name('admin.settings.index');
            Route::post('/update', 'Admin\SettingController@update')->name('admin.settings.update');
        });


        Route::group(['prefix'  =>   'abouts'], function() {

            Route::get('/', 'Admin\AboutController@index')->name('admin.abouts.index');
            Route::get('/create', 'Admin\AboutController@create')->name('admin.abouts.create');
            Route::post('/store', 'Admin\AboutController@store')->name('admin.abouts.store');
            Route::get('/{id}/edit', 'Admin\AboutController@edit')->name('admin.abouts.edit');
            Route::post('/update', 'Admin\AboutController@update')->name('admin.abouts.update');
            Route::get('/{id}/delete', 'Admin\AboutController@delete')->name('admin.abouts.delete');

        });

         Route::group(['prefix'  =>   'companyicons'], function() {

            Route::get('/', 'Admin\CompanyIconController@index')->name('admin.companyicons.index');
            Route::get('/create', 'Admin\CompanyIconController@create')->name('admin.companyicons.create');
            Route::post('/store', 'Admin\CompanyIconController@store')->name('admin.companyicons.store');
            Route::get('/{id}/edit', 'Admin\CompanyIconController@edit')->name('admin.companyicons.edit');
            Route::post('/update', 'Admin\CompanyIconController@update')->name('admin.companyicons.update');
            Route::get('/{id}/delete', 'Admin\CompanyIconController@delete')->name('admin.companyicons.delete');

        });
        Route::group(['prefix'  =>   'companyfacts'], function() {

            Route::get('/', 'Admin\CompanyFactController@index')->name('admin.companyfacts.index');
            Route::get('/create', 'Admin\CompanyFactController@create')->name('admin.companyfacts.create');
            Route::post('/store', 'Admin\CompanyFactController@store')->name('admin.companyfacts.store');
            Route::get('/{id}/edit', 'Admin\CompanyFactController@edit')->name('admin.companyfacts.edit');
            Route::post('/update', 'Admin\CompanyFactController@update')->name('admin.companyfacts.update');
            Route::get('/{id}/delete', 'Admin\CompanyFactController@delete')->name('admin.companyfacts.delete');

        });
        Route::group(['prefix'  =>   'screens'], function() {

            Route::get('/', 'Admin\ScreenController@index')->name('admin.screens.index');
            Route::get('/create', 'Admin\ScreenController@create')->name('admin.screens.create');
            Route::post('/store', 'Admin\ScreenController@store')->name('admin.screens.store');
            Route::get('/{id}/edit', 'Admin\ScreenController@edit')->name('admin.screens.edit');
            Route::post('/update', 'Admin\ScreenController@update')->name('admin.screens.update');
            Route::get('/{id}/delete', 'Admin\ScreenController@delete')->name('admin.screens.delete');

        });
        Route::group(['prefix'  =>   'generalinformations'], function() {

            Route::get('/', 'Admin\GeneralInformationController@index')->name('admin.generalinformations.index');
            Route::get('/create', 'Admin\GeneralInformationController@create')->name('admin.generalinformations.create');
            Route::post('/store', 'Admin\GeneralInformationController@store')->name('admin.generalinformations.store');
            Route::get('/{id}/edit', 'Admin\GeneralInformationController@edit')->name('admin.generalinformations.edit');
            Route::post('/update', 'Admin\GeneralInformationController@update')->name('admin.generalinformations.update');
            Route::get('/{id}/delete', 'Admin\GeneralInformationController@delete')->name('admin.generalinformations.delete');

        });

        Route::group(['prefix'  =>   'contacts'], function() {

            Route::get('/', 'Admin\ContactController@index')->name('admin.contacts.index');
            Route::get('/create', 'Admin\ContactController@create')->name('admin.contacts.create');
            Route::post('/store', 'Admin\ContactController@store')->name('admin.contacts.store');
            Route::get('/{id}/edit', 'Admin\ContactController@edit')->name('admin.contacts.edit');
            Route::post('/update', 'Admin\ContactController@update')->name('admin.contacts.update');
            Route::get('/{id}/delete', 'Admin\ContactController@delete')->name('admin.contacts.delete');

        });

        Route::group(['prefix'  =>   'services'], function() {

            Route::get('/', 'Admin\ServiceController@index')->name('admin.services.index');
            Route::get('/create', 'Admin\ServiceController@create')->name('admin.services.create');
            Route::post('/store', 'Admin\ServiceController@store')->name('admin.services.store');
            Route::get('/{id}/edit', 'Admin\ServiceController@edit')->name('admin.services.edit');
            Route::post('/update', 'Admin\ServiceController@update')->name('admin.services.update');
            Route::get('/{id}/delete', 'Admin\ServiceController@delete')->name('admin.services.delete');

        });




        Route::group(['prefix'  =>   'testimonial'], function() {

            Route::get('/', 'Admin\TestimonialController@index')->name('admin.testimonial.index');
            Route::get('/create', 'Admin\TestimonialController@create')->name('admin.testimonial.create');
            Route::post('/store', 'Admin\TestimonialController@store')->name('admin.testimonial.store');
            Route::get('/{id}/edit', 'Admin\TestimonialController@edit')->name('admin.testimonial.edit');
            Route::post('/update', 'Admin\TestimonialController@update')->name('admin.testimonial.update');
            Route::get('/{id}/delete', 'Admin\TestimonialController@delete')->name('admin.testimonial.delete');

        });


        Route::group(['prefix'  =>   'portfolio'], function() {

            Route::get('/', 'Admin\PortfolioController@index')->name('admin.portfolio.index');
            Route::get('/create', 'Admin\PortfolioController@create')->name('admin.portfolio.create');
            Route::post('/store', 'Admin\PortfolioController@store')->name('admin.portfolio.store');
            Route::get('/{id}/edit', 'Admin\PortfolioController@edit')->name('admin.portfolio.edit');
            Route::post('/update', 'Admin\PortfolioController@update')->name('admin.portfolio.update');
            Route::get('/{id}/delete', 'Admin\PortfolioController@delete')->name('admin.portfolio.delete');

        });

        Route::group(['prefix'  =>   'subscription'], function() {

            Route::get('/', 'Admin\SubscriptionController@index')->name('admin.subscription.index');
            Route::get('/create', 'Admin\SubscriptionController@create')->name('admin.subscription.create');
            Route::post('/store', 'Admin\SubscriptionController@store')->name('admin.subscription.store');
            Route::get('/{id}/edit', 'Admin\SubscriptionController@edit')->name('admin.subscription.edit');
            Route::post('/update', 'Admin\SubscriptionController@update')->name('admin.subscription.update');
            Route::get('/{id}/delete', 'Admin\SubscriptionController@delete')->name('admin.subscription.delete');

        });

        Route::group(['prefix'  =>   'team'], function() {

            Route::get('/', 'Admin\TeamController@index')->name('admin.team.index');
            Route::get('/create', 'Admin\TeamController@create')->name('admin.team.create');
            Route::post('/store', 'Admin\TeamController@store')->name('admin.team.store');
            Route::get('/{id}/edit', 'Admin\TeamController@edit')->name('admin.team.edit');
            Route::post('/update', 'Admin\TeamController@update')->name('admin.team.update');
            Route::get('/{id}/delete', 'Admin\TeamController@delete')->name('admin.team.delete');

        });

        Route::group(['prefix'  =>   'blogs'], function() {

            Route::get('/', 'Admin\BlogController@index')->name('admin.blogs.index');
            Route::get('/create', 'Admin\BlogController@create')->name('admin.blogs.create');
            Route::post('/store', 'Admin\BlogController@store')->name('admin.blogs.store');
            Route::get('/{id}/edit', 'Admin\BlogController@edit')->name('admin.blogs.edit');
            Route::post('/update', 'Admin\BlogController@update')->name('admin.blogs.update');
            Route::get('/{id}/delete', 'Admin\BlogController@delete')->name('admin.blogs.delete');

        });
        Route::group(['prefix'  =>   'comments'], function() {

            Route::get('/', 'Admin\CommentController@index')->name('admin.comments.index');
            Route::get('/{id}/delete', 'Admin\CommentController@delete')->name('admin.comments.delete');

        });


        Route::group(['prefix'  =>   'user'], function() {

            Route::get('/', 'Admin\UserController@index')->name('admin.users.index');
        });
       /*

        Route::group(['prefix'  =>   'contacts'], function() {

            Route::get('/', 'Admin\ContactController@index')->name('admin.contacts.index');
            Route::get('/create', 'Admin\ContactController@create')->name('admin.contacts.create');
            Route::post('/store', 'Admin\ContactController@store')->name('admin.contacts.store');
            Route::get('/{id}/edit', 'Admin\ContactController@edit')->name('admin.contacts.edit');
            Route::post('/update', 'Admin\ContactController@update')->name('admin.contacts.update');
            Route::get('/{id}/delete', 'Admin\ContactController@delete')->name('admin.contacts.delete');

        });


        Route::group(['prefix'  =>   'testimonial'], function() {

            Route::get('/', 'Admin\TestimonialController@index')->name('admin.testimonial.index');
            Route::get('/create', 'Admin\TestimonialController@create')->name('admin.testimonial.create');
            Route::post('/store', 'Admin\TestimonialController@store')->name('admin.testimonial.store');
            Route::get('/{id}/edit', 'Admin\TestimonialController@edit')->name('admin.testimonial.edit');
            Route::post('/update', 'Admin\TestimonialController@update')->name('admin.testimonial.update');
            Route::get('/{id}/delete', 'Admin\TestimonialController@delete')->name('admin.testimonial.delete');

        });


        Route::group(['prefix'  =>   'teams'], function() {

            Route::get('/', 'Admin\TeamController@index')->name('admin.teams.index');
            Route::get('/create', 'Admin\TeamController@create')->name('admin.teams.create');
            Route::post('/store', 'Admin\TeamController@store')->name('admin.teams.store');
            Route::get('/{id}/edit', 'Admin\TeamController@edit')->name('admin.teams.edit');
            Route::post('/update', 'Admin\TeamController@update')->name('admin.teams.update');
            Route::get('/{id}/delete', 'Admin\TeamController@delete')->name('admin.teams.delete');

        });



        Route::group(['prefix'  =>   'blogs'], function() {

            Route::get('/', 'Admin\TeamController@index')->name('admin.blogs.index');
            Route::get('/create', 'Admin\TeamController@create')->name('admin.blogs.create');
            Route::post('/store', 'Admin\TeamController@store')->name('admin.blogs.store');
            Route::get('/{id}/edit', 'Admin\TeamController@edit')->name('admin.blogs.edit');
            Route::post('/update', 'Admin\TeamController@update')->name('admin.blogs.update');
            Route::get('/{id}/delete', 'Admin\TeamController@delete')->name('admin.blogs.delete');

        });*/



        Route::group(['prefix'  =>   'attributes'], function() {

            Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'Admin\AttributeController@delete')->name('admin.attributes.delete');

            Route::post('/get-values', 'Admin\AttributeValueController@getValues');
            Route::post('/add-values', 'Admin\AttributeValueController@addValues');
            Route::post('/update-values', 'Admin\AttributeValueController@updateValues');
            Route::post('/delete-values', 'Admin\AttributeValueController@deleteValues');

        });



    });


});

Route::group(['prefix'  =>   'comments'], function() {

    Route::post('/store', 'Admin\CommentController@store')->name('comments.store');
    // Route::post('/update', 'Admin\CommentController@update')->name('comments.update');
    Route::get('/{id}/delete', 'Admin\CommentController@delete')->name('comments.delete');

});
