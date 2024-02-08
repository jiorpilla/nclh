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
            case "ExamAudiometry":
                return "Audiometry";

            case "ExamBloodChemistry":
                return "Blood Chemistry";

            case "ExamBloodType":
                return "Blood Type";

            case "ExamCBC":
                return "CBC";

            case "ExamChestXray":
                return "Chest X-ray";

            case "ExamDrugs":
                return "Drugs";

            case "ExamEKG":
                return "EKG";

            case "ExamHbsAG":
                return "HbsAG";

            case "ExamHepA":
                return "HepA";

            case "ExamHIV":
                return "HIV";

            case "ExamOvaAndParasites":
                return "Ova And Parasites";

            case "ExamPhysical":
                return "Physical";

            case "ExamPregnancyTest":
                return "Pregnancy Test";

            case "ExamPSA":
                return "PSA";

            case "ExamPsychological":
                return "Psychological";

            case "ExamRiba":
                return "Riba";

            case "ExamRPR":
                return "RPR";

            case "ExamStoolCulture":
                return "Stool Culture";

            case "ExamUrinalysis":
                return "Urinalysis";

            case "ExamVaccines":
                return "Vaccines";

            case "ExamVisualAcuity":
                return "Visual Acuity";

            default:
                return "Unknown Exam";

        }
    }
}
