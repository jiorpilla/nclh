<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Uid\Ulid;

class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $this->loadUsers($manager);
    }


    private function loadUsers(ObjectManager $manager): void
    {
        foreach ($this->getUserData() as [$username, $password, $email, $roles, $deleted, $created_by, $created_at, $updated_by, $updated_at]) {

            $user = new Users();

            $user->setUsername($username);
            $user->setPassword($this->passwordHasher->hashPassword($user, $password));
            $user->setEmail($email);
            $user->setRoles($roles);
            $user->setDeleted($deleted);
            $user->setCreatedBy($created_by);
            $user->setCreatedAt($created_at);
            $user->setUpdatedBy($updated_by);
            $user->setUpdatedAt($updated_at);

            $manager->persist($user);
            $this->addReference($username, $user);
        }

        $manager->flush();
    }

    /**
     * @return array<array{string, string, string, string, array<string>}>
     */
    private function getUserData(): array
    {
        $ulid = new Ulid();
        $date_time = new \DateTime();
        return [
            // $userData = [$username, $password, $email, $roles, $deleted, $created_by, $created_at, $updated_by, $updated_at];
            ['superadmin', 'superadmin', 'jiorpilla@gmail.com', [Users::ROLE_SUPERADMIN], 0, $ulid, $date_time, $ulid, $date_time],
            ['admin', 'admin', 'admin@gmail.com', [Users::ROLE_ADMIN], 0, $ulid, $date_time, $ulid, $date_time],
            ['nurse', 'nurse', 'nurse@gmail.com', [Users::ROLE_NURSE], 0, $ulid, $date_time, $ulid, $date_time],
            ['physician', 'physician', 'jiorpilla@gmail.com', [Users::ROLE_PHYSICIAN], 0, $ulid, $date_time, $ulid, $date_time],
            ['crew', 'crew', 'jiorpilla@gmail.com', [Users::ROLE_CREW], 0, $ulid, $date_time, $ulid, $date_time],

        ];
    }
}
