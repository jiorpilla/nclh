<?php

namespace App\Twig\Runtime;

use App\Entity\Appointment;
use App\Entity\Crew;
use App\Entity\MedicalHistory;
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
            case Appointment::STATUS_CHECKED_IN:
                return 'Checked-in';
            default:
                return 'Error';
        }
    }

    public function medicalHistoryStatusToString($status)
    {
        switch ($status) {
            case MedicalHistory::STATUS_NOT_STARTED:
                return '<span class="badge rounded-pill text-bg-secondary">NOT STARTED</span>';
            case MedicalHistory::STATUS_IN_PROGRESS:
                return '<span class="badge rounded-pill text-bg-primary">IN PROGRESS</span>';
            case MedicalHistory::STATUS_AWAITING_RESULTS:
                return '<span class="badge rounded-pill text-bg-info">AWAITING RESULTS</span>';
            case MedicalHistory::STATUS_EVALUATION:
                return '<span class="badge rounded-pill text-bg-success">EVALUATION</span>';
            case MedicalHistory::STATUS_CLOSED_PASS:
                return '<span class="badge rounded-pill text-bg-secondary">CLOSED</span>';
            case MedicalHistory::STATUS_CLOSED_FAIL:
                return '<span class="badge rounded-pill text-bg-danger">CLOSED</span>';
            default:
                return 'Error';
        }
    }

    public function examNameToString($name)
    {
        switch ($name) {
            case "audiometry":
                return "Audiometry";

            case "blood_chemistry":
                return "Blood Chemistry";

            case "blood_type":
                return "Blood Type";

            case "cbc":
                return "CBC";

            case "chest_xray":
                return "Chest X-ray";

            case "drugs":
                return "Drugs";

            case "ekg":
                return "EKG";

            case "fecalysis":
                return "Fecalysis";

            case "hbsag":
                return "HbsAG";

            case "hepa":
                return "HepA";

            case "hiv":
                return "HIV";

            case "ova_and_parasites":
                return "Ova And Parasites";

            case "physical":
                return "Physical";

            case "pregnancy_test":
                return "Pregnancy Test";

            case "psa":
                return "PSA";

            case "psychological":
                return "Psychological";

            case "riba":
                return "Riba";

            case "rpr":
                return "RPR";

            case "stool_culture":
                return "Stool Culture";

            case "urinalysis":
                return "Urinalysis";

            case "vaccines":
                return "Vaccines";

            case "visual_acuity":
                return "Visual Acuity";

            default:
                return "Unknown Exam";

        }
    }
}
