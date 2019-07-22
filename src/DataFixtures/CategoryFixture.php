<?php


namespace App\DataFixtures;

use App\Entity\ApiToken;
use App\Entity\Category;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
 

class CategoryFixture extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(20, 'main_category', function($i) use ($manager) {
            $category = new Category();
             
            $category->setName($this->faker->name);
            $category->setDescription($this->faker->text);
            
           
           

            

            

            return $category;
        });

         

        $manager->flush();
    }
}
