<?php

namespace App\Test\Controller;

use App\Entity\Crew;
use App\Repository\CrewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CrewControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private CrewRepository $repository;
    private string $path = '/crew/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Crew::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Crew index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'crew[id_number]' => 'Testing',
            'crew[position]' => 'Testing',
            'crew[ship]' => 'Testing',
            'crew[nationality]' => 'Testing',
            'crew[passport_number]' => 'Testing',
            'crew[seaman_book_number]' => 'Testing',
            'crew[company]' => 'Testing',
            'crew[first_name]' => 'Testing',
            'crew[last_name]' => 'Testing',
            'crew[middle_name]' => 'Testing',
            'crew[suffix]' => 'Testing',
            'crew[gender]' => 'Testing',
            'crew[date_of_birth]' => 'Testing',
            'crew[location_of_birth]' => 'Testing',
            'crew[phone_number]' => 'Testing',
            'crew[email]' => 'Testing',
            'crew[civil_status]' => 'Testing',
            'crew[picture]' => 'Testing',
            'crew[deleted]' => 'Testing',
            'crew[created_by]' => 'Testing',
            'crew[updated_by]' => 'Testing',
            'crew[created_at]' => 'Testing',
            'crew[updated_at]' => 'Testing',
            'crew[Address]' => 'Testing',
        ]);

        self::assertResponseRedirects('/crew/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Crew();
        $fixture->setId_number('My Title');
        $fixture->setPosition('My Title');
        $fixture->setShip('My Title');
        $fixture->setNationality('My Title');
        $fixture->setPassport_number('My Title');
        $fixture->setSeaman_book_number('My Title');
        $fixture->setCompany('My Title');
        $fixture->setFirst_name('My Title');
        $fixture->setLast_name('My Title');
        $fixture->setMiddle_name('My Title');
        $fixture->setSuffix('My Title');
        $fixture->setGender('My Title');
        $fixture->setDate_of_birth('My Title');
        $fixture->setLocation_of_birth('My Title');
        $fixture->setPhone_number('My Title');
        $fixture->setEmail('My Title');
        $fixture->setCivil_status('My Title');
        $fixture->setPicture('My Title');
        $fixture->setDeleted('My Title');
        $fixture->setCreated_by('My Title');
        $fixture->setUpdated_by('My Title');
        $fixture->setCreated_at('My Title');
        $fixture->setUpdated_at('My Title');
        $fixture->setAddress('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Crew');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Crew();
        $fixture->setId_number('My Title');
        $fixture->setPosition('My Title');
        $fixture->setShip('My Title');
        $fixture->setNationality('My Title');
        $fixture->setPassport_number('My Title');
        $fixture->setSeaman_book_number('My Title');
        $fixture->setCompany('My Title');
        $fixture->setFirst_name('My Title');
        $fixture->setLast_name('My Title');
        $fixture->setMiddle_name('My Title');
        $fixture->setSuffix('My Title');
        $fixture->setGender('My Title');
        $fixture->setDate_of_birth('My Title');
        $fixture->setLocation_of_birth('My Title');
        $fixture->setPhone_number('My Title');
        $fixture->setEmail('My Title');
        $fixture->setCivil_status('My Title');
        $fixture->setPicture('My Title');
        $fixture->setDeleted('My Title');
        $fixture->setCreated_by('My Title');
        $fixture->setUpdated_by('My Title');
        $fixture->setCreated_at('My Title');
        $fixture->setUpdated_at('My Title');
        $fixture->setAddress('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'crew[id_number]' => 'Something New',
            'crew[position]' => 'Something New',
            'crew[ship]' => 'Something New',
            'crew[nationality]' => 'Something New',
            'crew[passport_number]' => 'Something New',
            'crew[seaman_book_number]' => 'Something New',
            'crew[company]' => 'Something New',
            'crew[first_name]' => 'Something New',
            'crew[last_name]' => 'Something New',
            'crew[middle_name]' => 'Something New',
            'crew[suffix]' => 'Something New',
            'crew[gender]' => 'Something New',
            'crew[date_of_birth]' => 'Something New',
            'crew[location_of_birth]' => 'Something New',
            'crew[phone_number]' => 'Something New',
            'crew[email]' => 'Something New',
            'crew[civil_status]' => 'Something New',
            'crew[picture]' => 'Something New',
            'crew[deleted]' => 'Something New',
            'crew[created_by]' => 'Something New',
            'crew[updated_by]' => 'Something New',
            'crew[created_at]' => 'Something New',
            'crew[updated_at]' => 'Something New',
            'crew[Address]' => 'Something New',
        ]);

        self::assertResponseRedirects('/crew/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getId_number());
        self::assertSame('Something New', $fixture[0]->getPosition());
        self::assertSame('Something New', $fixture[0]->getShip());
        self::assertSame('Something New', $fixture[0]->getNationality());
        self::assertSame('Something New', $fixture[0]->getPassport_number());
        self::assertSame('Something New', $fixture[0]->getSeaman_book_number());
        self::assertSame('Something New', $fixture[0]->getCompany());
        self::assertSame('Something New', $fixture[0]->getFirst_name());
        self::assertSame('Something New', $fixture[0]->getLast_name());
        self::assertSame('Something New', $fixture[0]->getMiddle_name());
        self::assertSame('Something New', $fixture[0]->getSuffix());
        self::assertSame('Something New', $fixture[0]->getGender());
        self::assertSame('Something New', $fixture[0]->getDate_of_birth());
        self::assertSame('Something New', $fixture[0]->getLocation_of_birth());
        self::assertSame('Something New', $fixture[0]->getPhone_number());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getCivil_status());
        self::assertSame('Something New', $fixture[0]->getPicture());
        self::assertSame('Something New', $fixture[0]->getDeleted());
        self::assertSame('Something New', $fixture[0]->getCreated_by());
        self::assertSame('Something New', $fixture[0]->getUpdated_by());
        self::assertSame('Something New', $fixture[0]->getCreated_at());
        self::assertSame('Something New', $fixture[0]->getUpdated_at());
        self::assertSame('Something New', $fixture[0]->getAddress());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Crew();
        $fixture->setId_number('My Title');
        $fixture->setPosition('My Title');
        $fixture->setShip('My Title');
        $fixture->setNationality('My Title');
        $fixture->setPassport_number('My Title');
        $fixture->setSeaman_book_number('My Title');
        $fixture->setCompany('My Title');
        $fixture->setFirst_name('My Title');
        $fixture->setLast_name('My Title');
        $fixture->setMiddle_name('My Title');
        $fixture->setSuffix('My Title');
        $fixture->setGender('My Title');
        $fixture->setDate_of_birth('My Title');
        $fixture->setLocation_of_birth('My Title');
        $fixture->setPhone_number('My Title');
        $fixture->setEmail('My Title');
        $fixture->setCivil_status('My Title');
        $fixture->setPicture('My Title');
        $fixture->setDeleted('My Title');
        $fixture->setCreated_by('My Title');
        $fixture->setUpdated_by('My Title');
        $fixture->setCreated_at('My Title');
        $fixture->setUpdated_at('My Title');
        $fixture->setAddress('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/crew/');
    }
}
