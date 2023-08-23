<?php

namespace App\DataFixtures;

use App\Entity\Stack;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $this->createStacks($manager);
        $this->createAdmin($faker, $manager);
        $this->createUsers($faker, $manager);
    }

    private function createStacks(ObjectManager $manager): void
    {
        $stackNames = ['Front-end', 'Back-end', 'Full-Stack', 'DevOps', 'Data Science', 'QA', 'Estágiario'];

        foreach ($stackNames as $stackName) {
            $stack = new Stack();
            $stack->setName($stackName);

            $manager->persist($stack);
        }

        $manager->flush();
    }

    private function createAdmin($faker, ObjectManager $manager): void
    {
        $user = new User();
        $user->setName('Admin App');
        $user->setEmail('admin@admin.com');
        $user->setPassword(password_hash('password', PASSWORD_DEFAULT));
        $user->setLevel(1);
        $user->setStack($faker->numberBetween(1, 7));

        $manager->persist($user);
        $manager->flush();
    }

    private function createUsers($faker, ObjectManager $manager): void
    {
        for ($i = 0; $i < 1000; $i++) {
            $user = new User();
            $user->setName($faker->name);
            $user->setEmail($faker->email);
            $user->setPassword(password_hash('password', PASSWORD_DEFAULT));
            $user->setLevel(0);
            $user->setStack($faker->numberBetween(1, 7));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
