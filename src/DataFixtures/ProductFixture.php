<?php

namespace App\DataFixtures;

use App\Entity\ApiToken;
use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
 
use Faker\ORM\Doctrine\Populator;

class ProductFixture extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(18, 'main_product', function($i) use ($manager) {

             
            // $repository = $this->getDoctrine()->getRepository(Category::class);
            // $categories = $repository->findAll();
            $category = new Category();
            $product = new Product();
            
            $product->setName($this->faker->name);
            $product->setDescription($this->faker->text);
            $product->setImage($this->faker->imageUrl($width = 369, $height = 160));
            $product->setPurchasePrice($this->faker->randomFloat);
            $product->setSalePrice($this->faker->randomFloat);
            $product->setStock($this->faker->randomNumber);
            $product->setCategoryId($category->getId());
           
            
            

            return $product;
        });

        $manager->flush();
    }
}
