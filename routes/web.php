<?php

use App\Http\Controllers\Admin\Core\KeywordsController;
use App\Http\Controllers\Admin\Episodes\EpisodesController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Other\FAQsController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\PublicPart\Episodes\EpisodesController as PublicEpisodesController;
use App\Http\Controllers\PublicPart\HomeController as PublicHomeController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    /**
     *  Public part of Web App
     */
    Route::get ('/',                              [PublicHomeController::class, 'home'])->name('public.home');

    /**
     *  Episodes
     */
    Route::prefix('/episodes')->group(function () {
        Route::get ('/',                              [PublicEpisodesController::class, 'episodes'])->name('public.episodes');

        Route::get ('/preview/{slug}',                [PublicEpisodesController::class, 'preview'])->name('public.episodes.preview');

        /**
         *  Post request as user activity
         */
        Route::prefix('/activity')->group(function () {
            Route::post('/update-activity',               [PublicEpisodesController::class, 'updateActivity'])->name('public.episodes.update-activity');
        });

        Route::get ('/preview-video',                 [PublicEpisodesController::class, 'previewVideo'])->name('public.episodes.preview-video');

        Route::get ('/test-video',                    [PublicEpisodesController::class, 'testVideo'])->name('public.episodes.test-video');
    });
});

/**
 *  Auth routes
 */

Route::prefix('auth')->group(function () {
    Route::get ('/',                              [AuthController::class, 'auth'])->name('auth');
    Route::post('/authenticate',                  [AuthController::class, 'authenticate'])->name('auth.authenticate');
    Route::get ('/logout',                        [AuthController::class, 'logout'])->name('auth.logout');

    /* Create an account */
    Route::get ('/create-account',                [AuthController::class, 'createAccount'])->name('auth.create-account');
    Route::post('/save-account',                  [AuthController::class, 'saveAccount'])->name('auth.save-account');
    Route::get ('/verify-account/{token}',        [AuthController::class, 'verifyAccount'])->name('auth.verify-account');

    /* Restart password */
    Route::get ('/restart-password',              [AuthController::class, 'restartPassword'])->name('auth.restart-password');
    Route::post('/generate-restart-token',        [AuthController::class, 'generateRestartToken'])->name('auth.generate-restart-token');
    Route::get ('/new-password/{token}',          [AuthController::class, 'newPassword'])->name('auth.new-password');
    Route::post('/generate-new-password',         [AuthController::class, 'generateNewPassword'])->name('auth.generate-new-password');
});


/**
 *  Admin routes
 */

Route::prefix('system')->group(function () {
    Route::prefix('admin')->middleware('isAdmin')->group(function (){
        Route::get('/dashboard',                 [HomeController::class, 'index'])->name('system.home');

        /**
         *  Users routes;
         */
        Route::prefix('users')->middleware('auth')->group(function () {
            Route::get ('/',                          [UsersController::class, 'index'])->name('system.admin.users');
            Route::get ('/create',                    [UsersController::class, 'create'])->name('system.admin.users.create');
            Route::post('/save',                      [UsersController::class, 'save'])->name('system.admin.users.save');
            Route::get ('/preview/{username}',        [UsersController::class, 'preview'])->name('system.admin.users.preview');
            Route::get ('/edit/{username}',           [UsersController::class, 'edit'])->name('system.admin.users.edit');
            Route::post('/update',                    [UsersController::class, 'update'])->name('system.admin.users.update');
            Route::post('/update-profile-image',      [UsersController::class, 'updateProfileImage'])->name('system.admin.users.update-profile-image');
        });

        /**
         *  Episodes
         *  1. Episodes
         *  2. Add remove lectures
         */
        Route::prefix('episodes')->group(function () {
            Route::get ('/',                          [EpisodesController::class, 'index'])->name('system.admin.episodes');
            Route::get ('/create',                    [EpisodesController::class, 'create'])->name('system.admin.episodes.create');
            Route::post('/save',                      [EpisodesController::class, 'save'])->name('system.admin.episodes.save');
            Route::get ('/preview/{slug}',            [EpisodesController::class, 'preview'])->name('system.admin.episodes.preview');
            Route::get ('/edit/{slug}',               [EpisodesController::class, 'edit'])->name('system.admin.episodes.edit');
            Route::post('/update',                    [EpisodesController::class, 'update'])->name('system.admin.episodes.update');
            Route::get ('/delete/{slug}',             [EpisodesController::class, 'delete'])->name('system.admin.episodes.delete');

            Route::prefix('video-content')->group(function () {
                Route::get ('/add/{slug}',                    [EpisodesController::class, 'addVideo'])->name('system.admin.episodes.video-content.add');
                Route::post('/save',                          [EpisodesController::class, 'saveVideo'])->name('system.admin.episodes.video-content.save');
                Route::get ('/preview/{id}',                  [EpisodesController::class, 'previewVideo'])->name('system.admin.episodes.video-content.preview');
                Route::get ('/edit/{id}',                     [EpisodesController::class, 'editVideo'])->name('system.admin.episodes.video-content.edit');
                Route::post('/update',                        [EpisodesController::class, 'updateVideo'])->name('system.admin.episodes.video-content.update');
                Route::get ('/delete/{id}',                   [EpisodesController::class, 'deleteVideo'])->name('system.admin.episodes.video-content.delete');
            });
        });

        /**
         *  Other section
         *  1. FAQs
         */
        Route::prefix('other')->group(function () {
            /**
             *  FAQs section
             */
            Route::prefix('faq')->middleware('auth')->group(function () {
                Route::get ('/',                               [FAQsController::class, 'faqIndex'])->name('system.admin.other.faq');
                Route::get ('/create',                         [FAQsController::class, 'faqCreate'])->name('system.admin.other.faq.create');
                Route::post('/save',                           [FAQsController::class, 'faqSave'])->name('system.admin.other.faq.save');
                Route::get ('/edit/{id}',                      [FAQsController::class, 'faqEdit'])->name('system.admin.other.faq.edit');
                Route::post('/update',                         [FAQsController::class, 'faqUpdate'])->name('system.admin.other.faq.update');
                Route::get ('/delete/{id}',                    [FAQsController::class, 'faqDelete'])->name('system.admin.other.faq.delete');
            });
        });

        /**
         *  Core section:
         *  1. Keywords
         */
        Route::prefix('core')->group(function () {
            /**
             *  FAQs section
             */
            Route::prefix('keywords')->group(function () {
                Route::get ('/',                                    [KeywordsController::class, 'index'])->name('system.admin.core.keywords');
                Route::get ('/preview-instances/{key}',             [KeywordsController::class, 'previewInstances'])->name('system.admin.core.keywords.preview-instances');
                Route::get ('/new-instance/{key}',                  [KeywordsController::class, 'newInstance'])->name('system.admin.core.keywords.new-instance');

                Route::post('/save-instance',                       [KeywordsController::class, 'saveInstance'])->name('system.admin.core.keywords.save-instance');
                Route::get ('/edit-instance/{id}',                  [KeywordsController::class, 'editInstance'])->name('system.admin.core.keywords.edit-instance');
                Route::post('/update-instance',                     [KeywordsController::class, 'updateInstance'])->name('system.admin.core.keywords.update-instance');
                Route::get ('/delete-instance/{id}',                [KeywordsController::class, 'deleteInstance'])->name('system.admin.core.keywords.delete-instance');
            });
        });

        /**
         *  Blog:: ToDo
         */
        Route::prefix('blog')->middleware('auth')->group(function () {
            Route::get ('/',                               [AdminBlogController::class, 'index'])->name('system.admin.blog');
            Route::get ('/create',                         [AdminBlogController::class, 'create'])->name('system.admin.blog.create');
            Route::post('/save',                           [AdminBlogController::class, 'save'])->name('system.admin.blog.save');
            Route::get ('/preview/{id}',                   [AdminBlogController::class, 'preview'])->name('system.admin.blog.preview');
            Route::get ('/edit/{id}',                      [AdminBlogController::class, 'edit'])->name('system.admin.blog.edit');
            Route::post('/update',                         [AdminBlogController::class, 'update'])->name('system.admin.blog.update');
            Route::get ('/delete/{id}',                    [AdminBlogController::class, 'delete'])->name('system.admin.blog.delete');

            /*
             *  Work with images
             */
            Route::post('/add-to-gallery',                 [AdminBlogController::class, 'addToGallery'])->name('system.admin.blog.add-to-gallery');
            Route::get ('/delete-from-gallery/{id}',       [AdminBlogController::class, 'deleteFromGallery'])->name('system.admin.blog.delete-from-gallery');

            Route::get ('/edit-image/{id}/{what}',         [AdminBlogController::class, 'editImage'])->name('system.admin.blog.edit-image');
            Route::post('/update-image',                   [AdminBlogController::class, 'updateImage'])->name('system.admin.blog.update-image');
        });
    });
});