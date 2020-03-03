<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController // As soon as we want to render a twig template, we need to extend this class
{

    //Defining the route for this controller method
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage() // This is the method that controls the homepage of our app
    {
        return $this->render('article/homepage.html.twig');
    }

    // Giving this route a wildcard, which means whatever is passed after "/news/" could be anything
    // Since we are passing a wildcard to this route, we need to add an argument to the method that matches the wildcard name, which could be anything
    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show($slug)
    {
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];

        return $this->render('article/show.html.twig', [ // render() takes two arguments, the template we want to render and any variables and their values we want to use on that template
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments, // Passing the $comments array above to the template
        ]);
    }

}