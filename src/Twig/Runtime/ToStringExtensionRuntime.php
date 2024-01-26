<?php

namespace App\Twig\Runtime;

use App\Entity\Appointment;
use App\Entity\Crew;
use Twig\Extension\RuntimeExtensionInterface;

class ToStringExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // Inject dependencies if needed
    }

    public function personCivilStatusToString($civilStatus)
    {
        switch ($civilStatus) {
            case Crew::CIVIL_STATUS_SINGLE:
                return 'Single';
            case Crew::CIVIL_STATUS_MARRIED:
                return 'Married';
            case Crew::CIVIL_STATUS_DIVORCED:
                return 'Divorced';
            case Crew::CIVIL_STATUS_WIDOWED:
                return 'Widowed';
            default:
                return 'Error';
        }
    }

    public function genderToString($status)
    {
        switch ($status) {
            case Crew::GENDER_MALE:
                return 'Male';
            case Crew::GENDER_FEMALE:
                return 'Female';
            default:
                return 'Error';
        }
    }

    public function appointmentStatusToString($status)
    {
        switch ($status) {
            case Appointment::STATUS_PENDING:
                return 'Pending';
            case Appointment::STATUS_CONFIRMED:
                return 'Confirmed';
            default:
                return 'Error';
        }
    }
}
