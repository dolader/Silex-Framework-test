<?php

namespace Dev\Pub\Controller;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;



class GlobalControllerProvider implements ControllerProviderInterface {

    public function connect(Application $app) {
            $controllers = $app['controllers_factory'];

            // Routes are defined here

            // homepage route post list
            $controllers
                ->match('/','\Dev\Pub\Controller\GlobalController::indexAction')
                ->bind('home');

            // Create new post
            $controllers
                 ->match('/post-new','Dev\Pub\Controller\GlobalController::newPost')
                 ->bind('post_new');     

            // Show single post by id   
            $controllers
                ->match('/post/{id}','\Dev\Pub\Controller\GlobalController::showPostAction')
                ->bind('show_post');  
            
            // Create new Author
            $controllers
                ->match('/author-new','Dev\Pub\Controller\GlobalController::newauthor')
                ->bind('author_new'); 

            // Show single author by name
            $controllers
                ->match('/author/{name}','Dev\Pub\Controller\GlobalController::showAuthor')
                ->bind('show_author');  
            
            // Show List of posts from single author
            $controllers
                ->match('/list-post-author/{authorName}','Dev\Pub\Controller\GlobalController::showListAuthor')
                 ->bind('list_post_author');
                
            return $controllers;
          
        }
    
 
}