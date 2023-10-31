<?php

namespace App\Test\Controller;

use App\Entity\Branch;
use App\Repository\BranchRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BranchControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private BranchRepository $repository;
    private string $path = '/branch/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Branch::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Branch index');

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
            'branch[name]' => 'Testing',
            'branch[deleted]' => 'Testing',
            'branch[created_by]' => 'Testing',
            'branch[updated_by]' => 'Testing',
            'branch[created_at]' => 'Testing',
            'branch[updated_at]' => 'Testing',
        ]);

        self::assertResponseRedirects('/branch/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Branch();
        $fixture->setName('My Title');
        $fixture->setDeleted('My Title');
        $fixture->setCreated_by('My Title');
        $fixture->setUpdated_by('My Title');
        $fixture->setCreated_at('My Title');
        $fixture->setUpdated_at('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Branch');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Branch();
        $fixture->setName('My Title');
        $fixture->setDeleted('My Title');
        $fixture->setCreated_by('My Title');
        $fixture->setUpdated_by('My Title');
        $fixture->setCreated_at('My Title');
        $fixture->setUpdated_at('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'branch[name]' => 'Something New',
            'branch[deleted]' => 'Something New',
            'branch[created_by]' => 'Something New',
            'branch[updated_by]' => 'Something New',
            'branch[created_at]' => 'Something New',
            'branch[updated_at]' => 'Something New',
        ]);

        self::assertResponseRedirects('/branch/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getDeleted());
        self::assertSame('Something New', $fixture[0]->getCreated_by());
        self::assertSame('Something New', $fixture[0]->getUpdated_by());
        self::assertSame('Something New', $fixture[0]->getCreated_at());
        self::assertSame('Something New', $fixture[0]->getUpdated_at());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Branch();
        $fixture->setName('My Title');
        $fixture->setDeleted('My Title');
        $fixture->setCreated_by('My Title');
        $fixture->setUpdated_by('My Title');
        $fixture->setCreated_at('My Title');
        $fixture->setUpdated_at('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/branch/');
    }
}
