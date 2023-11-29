<?php

namespace App\Form\DataTransformer;

use App\Entity\Crew;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class CrewToIdTransformer implements DataTransformerInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
    }

    /**
     * Transforms an object (crew) to a string (ulid).
     *
     * @param  Crew|null $crew
     */
    public function transform($crew): string
    {
        if (null === $crew) {
            return '';
        }

        return $crew->getId();
    }

    /**
     * Transforms a string (number) to an object (issue).
     *
     * @param  string $crewId
     * @throws TransformationFailedException if object (issue) is not found.
     */
    public function reverseTransform($crewId): ?Crew
    {
        // no issue number? It's optional, so that's ok
        if (!$crewId) {
            return null;
        }

        $crew = $this->entityManager
            ->getRepository(Crew::class)
            // query for the issue with this id
            ->find($crewId)
        ;

        if (null === $crew) {
            // causes a validation error

            $privateErrorMessage = sprintf('An issue with number "%s" does not exist!', $crewId);
            $publicErrorMessage = 'The given "{{ value }}" value is not a valid issue number.';

            $failure = new TransformationFailedException($privateErrorMessage);
            $failure->setInvalidMessage($publicErrorMessage, [
                '{{ value }}' => $crewId,
            ]);

            throw $failure;
        }

        return $crew;
    }

}