<?php

namespace App\DataFixtures;

use App\Entity\Stacks;
use App\Entity\User;
use App\Entity\Users;
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
        $stackNames = ['Front-end', 'Back-end', 'Full-stack'];

        foreach ($stackNames as $stackName) {
            $stack = new Stacks();
            $stack->setName($stackName);

            $manager->persist($stack);
        }

        $manager->flush();
    }

    private function createAdmin($faker, ObjectManager $manager): void
    {
        $user = new Users();
        $user->setName('Admin App');
        $user->setEmail('admin@admin.com');
        $user->setPassword(password_hash('password', PASSWORD_DEFAULT));
        $user->setLevel(1);
        $user->setStack($faker->numberBetween(1, 3));

        $manager->persist($user);
        $manager->flush();
    }

    private function createUsers($faker, ObjectManager $manager): void
    {
        for ($i = 0; $i < 1000; $i++) {
            $user = new Users();
            $user->setName($faker->name);
            $user->setEmail($faker->email);
            $user->setPassword(password_hash('password', PASSWORD_DEFAULT));
            $user->setLevel(0);
            $user->setStack($faker->numberBetween(1, 3));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
