<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\ToStringExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class ToStringExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('civilStatusToString', [ToStringExtensionRuntime::class, 'personCivilStatusToString'], ['is_safe' => ['html']] ),
            new TwigFilter('genderToString', [ToStringExtensionRuntime::class, 'genderToString'], ['is_safe' => ['html']] ),
            new TwigFilter('appointmentStatusToString', [ToStringExtensionRuntime::class, 'appointmentStatusToString'], ['is_safe' => ['html']] ),
            new TwigFilter('medicalHistoryStatusToString', [ToStringExtensionRuntime::class, 'medicalHistoryStatusToString'], ['is_safe' => ['html']] ),
            new TwigFilter('examNameToString', [ToStringExtensionRuntime::class, 'examNameToString'], ['is_safe' => ['html']] ),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('function_name', [ToStringExtensionRuntime::class, 'doSomething']),
        ];
    }
}
