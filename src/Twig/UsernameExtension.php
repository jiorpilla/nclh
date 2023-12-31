<?php

namespace App\Twig;

use App\Repository\UsersRepository;
use Symfony\Component\Uid\Ulid;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class UsernameExtension extends AbstractExtension
{
    public function __construct(
        private UsersRepository $userRepository
    )
    {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_username', [$this, 'getUsername']),
        ];
    }

    public function getUsername(Ulid $id):string
    {
        $user = $this->userRepository->find($id);
        if ($user) {
            return $user->getUsername();
        }
        return 'Unknown User';
    }
}