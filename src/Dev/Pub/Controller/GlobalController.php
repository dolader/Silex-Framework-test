<?php

namespace Dev\Pub\Controller;

use Silex\Application;
use Dev\Pub\Entity\Author;
use Dev\Pub\Entity\Post;
use Dev\Helper\Excerpt;
use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextAreaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormError;
use Symfony\Component\Validator\Constraints as Assert;


class GlobalController {



    // Creating new Post
    public function newPost (Request $request, Application $app){
        $post = new Post();
        // instantiate the helper function
        $helper = new Excerpt();
        // Result array from ajax post
        
        if($_POST) {
        // Getting the data from the AJAX Post    
        $result = $_POST['form'];
        $dbc = $app['db'];

        // var needed foor the id query
        $author_name = $result['author_name'];

        // Getting the Author ID 
        $query = "SELECT author.id FROM author WHERE name = '$author_name' "; 
        $author_id = $dbc->fetchColumn($query); 

        // Gettin number of post by author
        $sql =  "SELECT COUNT(id) FROM post WHERE author_name = '$author_name' "; 
        $num_post = $dbc->fetchColumn($sql);

        // update number of all posts voor the author that makes a new post
        $sql_update_num_post = $dbc->executeUpdate(
            "UPDATE post SET number_of_post = $num_post + 1 
             WHERE author_name = '$author_name'"); 
        }
        // Form Placeholders
        $data = array(
            'title' => 'Titel bericht',
            'author_name' => 'Vul je naam in',
            'message' => 'Nieuw Bericht',   
        );    

        // Creating the formfields
        $form = $app['form.factory']->createBuilder(FormType::class, $post)
                ->add('title', TextType::class, array('constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 5))),
                'label' => 'Titel', 'attr' => array('class' => 'form-control mb-3')))
                ->add('author_name', TextType::class, array('constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 5))),
                'label' => 'Naam auteur','attr' 
                => array('class' => 'form-control mb-3')))
                ->add('message', TextAreaType::class, array('constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 5))),
                'label' => 'Bericht','attr' 
                => array('class' => 'form-control mb-3')))
                ->add('save', SubmitType::class, array('label'
                => 'Verstuur',
                'attr' => array('class' => 'btn btn-primary mt-3')))
                ->getForm();

                $form->addError(new FormError(''));

                $form->handleRequest($request);

                // if form is submitted and valid then submit to the database
                if($form->isSubmitted() && $form->isValid()){

                // Getting all the form data via ajax and set it.
                    $message_excerpt = $helper->excerpt_str($result['message']);   
                    $entityManager  = $app['orm.em'];
                    $post = new Post();
                    date_default_timezone_set('Europe/Amsterdam');
                    $post->setPostDate(new \DateTime('now'));
                    $post->setTitle($result['title']);
                    $post->setAuthorName($result['author_name']);
                    $post->setAuthorID($author_id);
                    $post->setMessage($result['message']);
                    $post->setExcerpt($message_excerpt);
                    $post->setNumberOfPost($num_post + 1);
                 
                    // Saving the new entree
                    $entityManager->persist($post);
                    $entityManager->flush();

                    // Redirect to homepage after submit
                    return $app->redirect('/');
                    
                }

                    return $app['twig']->render('/post/new-post.twig', array(
                                'form' => $form->createView()));
                
        }

        // Creating new Author
        public function newAuthor (Request $request, Application $app){
            if($_POST){
            $result = $_POST['form'];
            }
            $author = new Author();
            $data = array(
                'name' => 'Vul je naam in',
                'website' => 'Vul websiteadres in',
                'email' => 'Vul je mailadres in', 
                'biografie' => 'Vertel wat over je zelf',
                'headshot' => 'Upload een profielfoto'
            );

            // Creating the formfields
            $form = $app['form.factory']->createBuilder(FormType::class, $author)
                    ->add('name', TextType::class, array('constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 5))),
                    'label' => 'Naam auteur', 'attr' => array('class' => 'form-control mb-3')))
                    ->add('email', TextType::class, array('constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 5))),
                    'label' => 'Mailadres','attr' 
                    => array('class' => 'form-control mb-3')))
                    ->add('biografie', TextAreaType::class, array('constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 5))),
                        'label' => 'Biografie',
                        'required' => 'true',
                        'attr' => array('class' => 'form-control mb-3')))
                    ->add('website', TextType::class, array(
                    'label' => 'Website',
                    'required' => 'false',
                    'attr' => array('class' => 'form-control mb-3')))
                    // ->add('headshot', FileType::class,array(
                    //     'label' => 'Upload een profielfoto',
                    //     'required' => 'false',
                    //     'attr' => array('class' => 'form-control mb-3')))
                    ->add('save', SubmitType::class, array('label'
                    => 'Verstuur',
                    'attr' => array('class' => 'btn btn-primary mt-3')))
                    ->getForm();

                    $form->addError(new FormError(''));

                    $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){

                // Getting all the form data        
                $entityManager  = $app['orm.em'];
                $author = new Author();
                $author->setName($result['name']);
                $author->setBiografie($result['biografie']);
                $author->setEmail($result['email']);
                $author->setWebsite($result['website']);
                        
                // Saving th new entree
                $entityManager->persist($author);
                $entityManager->flush();

                //redirect user to homepage
                return $app->redirect('/');
                
            }

            return $app['twig']->render('/author/new-author.twig', array(
                'form' => $form->createView()));
                
    }



    // Find als Posts for list view
    public function indexAction(Application $app, Request $request) {
       
        $posts= $app['orm.em']->getRepository
        ('Dev\Pub\Entity\Post')->findAll();
        $authors = $app['orm.em']->getRepository
        ('Dev\Pub\Entity\Author')->findAll();
        return new Response($app['twig']->render('post/home.twig', array(
        'posts' => $posts,
        'authors' => $authors  
        )) );  
    }


    // Find Post by ID
    public function showPostAction(Application $app, Request $request, $id) {
       
        $post = $app['orm.em']->getRepository
        ('Dev\Pub\Entity\Post')->find($id);
       
        return  new Response($app['twig']->render('post/single-post.twig', array(
        'post' => $post)) );
 
    }

    // Find Author by Name
    public function showAuthor(Application $app, Request $request, $name) {
       
        $authors = $app['orm.em']->getRepository
        ('Dev\Pub\Entity\Author')->findOneBy( ["name" => $name] );
       
        return  new Response($app['twig']->render('author/single-author.twig', array(
        'authors' => $authors )));
 
    }

     // Showing list of posts from a single arthor
     public function showListAuthor(Application $app, Request $request, $authorName) {
       
        $posts = $app['orm.em']->getRepository
        ('Dev\Pub\Entity\Post')->findBy( ["author_name" => $authorName] );

        return  new Response($app['twig']->render('author/list-author-posts.twig', array(
        'posts' => $posts)) );
 
    }

    
}