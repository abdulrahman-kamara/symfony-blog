<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');


        for ($i = 0; $i < 10; $i++) {
            $post = new post();
            $post->setTitle($faker->sentence($nbWords = 2, $variableNbWords = true));
            $post->setContent($faker->sentence($nbWords = 10, $variableNbWords = true));
            $post->setLikes($faker->sentence($nbWords = 10, $variableNbWords = true));
            $post->setDislikes($faker->sentence($nbWords = 10, $variableNbWords = true));
            $post->setPhotos('https://picsum.photos/id/237/200/300', $i);
            $post->setCreateAt($faker->dateTime('-6 months'));


            $manager->persist($post);
        }
        $manager->flush();
    }
}
