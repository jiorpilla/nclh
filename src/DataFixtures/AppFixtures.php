<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Branch;
use App\Entity\Crew;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Uid\Ulid;

class AppFixtures extends Fixture
{
    private $faker;
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {
        $this->faker = Factory::Create('en_PH');
    }

    public function load(ObjectManager $manager): void
    {
        $this->loadUsers($manager);
//        $this->loadBranches($manager);
//        $this->loadCrewData($manager);
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
            ['superadmin', 'superadmin', 'jiorpilla@gmail.com', [Users::ROLE_SUPERADMIN], 0, $ulid, $date_time, $ulid, $date_time],
            ['admin', 'admin', 'admin@gmail.com', [Users::ROLE_ADMIN], 0, $ulid, $date_time, $ulid, $date_time],
            ['nurse', 'nurse', 'nurse@gmail.com', [Users::ROLE_NURSE], 0, $ulid, $date_time, $ulid, $date_time],
            ['physician', 'physician', 'physician@gmail.com', [Users::ROLE_PHYSICIAN], 0, $ulid, $date_time, $ulid, $date_time],
            ['labtech', 'labtech', 'labtech@gmail.com', [Users::ROLE_LABTECHNICIAN], 0, $ulid, $date_time, $ulid, $date_time],
            ['crew', 'crew', 'crew@gmail.com', [Users::ROLE_CREW], 0, $ulid, $date_time, $ulid, $date_time],
        ];
    }

    private function loadBranches(ObjectManager $manager)
    {
        $ulid = new Ulid();
        $branches = [
            [$this->faker->company(), 0, $ulid, $this->faker->dateTime(), $ulid, $this->faker->dateTime()],
            [$this->faker->company(), 0, $ulid, $this->faker->dateTime(), $ulid, $this->faker->dateTime()],
            [$this->faker->company(), 0, $ulid, $this->faker->dateTime(), $ulid, $this->faker->dateTime()],
        ];

        foreach ($branches as [$branch_name, $deleted, $created_by, $created_at, $updated_by, $updated_at]) {

            $branch = new Branch();

            $branch->setName($branch_name);
            $branch->setDeleted($deleted);
            $branch->setCreatedBy($created_by);
            $branch->setCreatedAt($created_at);
            $branch->setUpdatedBy($updated_by);
            $branch->setUpdatedAt($updated_at);

            $manager->persist($branch);
            $manager->flush();
        }
    }

    private function loadCrewData(ObjectManager $manager)
    {
        //first_name
        //last_name
        //middle_name
        //suffix
        //gender
        //date_of_birth
        //location_of_birth
        //phone_number
        //email
        //civil_status
        //company
        //position

        //ship
        //nationality
        //passport_number
        //seaman_book_number

        $gender[1] = 'male';
        $gender[2] = 'female';

        $civil_status[1] = 'single';
        $civil_status[2] = 'married';
        $civil_status[3] = 'seperated';
        $civil_status[4] = 'widowed';

        for($i = 0; $i < 100; $i++){
            $ulid = new Ulid();
            $address = $this->faker->streetAddress() . "" . $this->faker->barangay() . "" . $this->faker->municipality() . "" . $this->faker->province();
            $crew[] = [
                $this->faker->firstName(),//first_name
                $this->faker->lastName(), //last_name
                $this->faker->lastName(),//middle_name
                $this->faker->suffix(),//suffix
                $gender[$this->faker->numberBetween(1, 2)],//gender
                $this->faker->numberBetween(100000, 999999),//passport_number
                $this->faker->dateTime(),//date_of_birth
                $this->faker->address(),//location_ofbirth
                $this->faker->phoneNumber(),//phone_number
                $this->faker->email(),//email
                $this->faker->numberBetween(1, 4),//civil_status
                $this->faker->company(),//company
                $this->faker->jobTitle(),//position
                $address,
                0,
                $ulid,
                $this->faker->dateTime(),
                $ulid,
                $this->faker->dateTime()
            ];
        }

        foreach ($crew as [$first_name,$last_name,$middle_name,$suffix,$gender,$passportNumber,$date_of_birth,$location_of_birth,$phone_number,$email,$civil_status,$company,$position,$address,$deleted, $created_by, $created_at, $updated_by, $updated_at]) {

            $branch = new Crew();

            $branch->setFirstName($first_name);
            $branch->setLastName($last_name);
            $branch->setMiddleName($middle_name);
            $branch->setSuffix($suffix);
            $branch->setGender($gender);
            $branch->setPassportNumber($passportNumber);
            $branch->setDateOfBirth($date_of_birth);
            $branch->setLocationOfBirth($location_of_birth);
            $branch->setPhoneNumber($phone_number);
            $branch->setEmail($email);
            $branch->setCivilStatus($civil_status);
            $branch->setCompany($company);
            $branch->setPosition($position);
            $branch->setAddress($address);
            $branch->setDeleted($deleted);
            $branch->setCreatedBy($created_by);
            $branch->setCreatedAt($created_at);
            $branch->setUpdatedBy($updated_by);
            $branch->setUpdatedAt($updated_at);

            $manager->persist($branch);
            $manager->flush();
        }
    }
}
