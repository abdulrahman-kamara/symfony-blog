<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(PostRepository $repo): Response

    {
        $posts = $repo->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/posts/{id}", name="show_posts")
     */
    public function show(Post $post)
    {

        return $this->render('home/post.html.twig', [
            'post' => $post

        ]);
    }
}
