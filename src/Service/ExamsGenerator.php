<?php

namespace App\Service;

use App\Entity\Crew;
use App\Entity\ExamAudiometry;
use App\Entity\ExamBloodChemistry;
use App\Entity\ExamBloodType;
use App\Entity\ExamCBC;
use App\Entity\ExamChestXray;
use App\Entity\ExamDrugs;
use App\Entity\ExamEKG;
use App\Entity\ExamFecalysis;
use App\Entity\ExamHbsAG;
use App\Entity\ExamHepA;
use App\Entity\ExamHIV;
use App\Entity\ExamOvaAndParasites;
use App\Entity\ExamPhysical;
use App\Entity\ExamPregnancyTest;
use App\Entity\ExamPSA;
use App\Entity\ExamPsychological;
use App\Entity\ExamRiba;
use App\Entity\ExamRPR;
use App\Entity\ExamStoolCulture;
use App\Entity\ExamUrinalysis;
use App\Entity\ExamVaccines;
use App\Entity\ExamVisualAcuity;
use App\Entity\MedicalHistory;
use Doctrine\ORM\EntityManagerInterface;

class ExamsGenerator
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createExams(Crew $crew, MedicalHistory $medicalHistory, bool $isFoodHandler = false)
    {
        $ExamAudiometry = new ExamAudiometry();
        $ExamAudiometry->setMedicalHistory($medicalHistory);
        $ExamAudiometry->setStatus(1);

        $ExamBloodChemistry = new ExamBloodChemistry();
        $ExamBloodChemistry->setMedicalHistory($medicalHistory);
        $ExamBloodChemistry->setStatus(1);

        $ExamBloodType = new ExamBloodType();
        $ExamBloodType->setMedicalHistory($medicalHistory);
        $ExamBloodType->setStatus(1);

        $ExamCBC = new ExamCBC();
        $ExamCBC->setMedicalHistory($medicalHistory);
        $ExamCBC->setStatus(1);

        $ExamChestXray = new ExamChestXray();
        $ExamChestXray->setMedicalHistory($medicalHistory);
        $ExamChestXray->setStatus(1);

        $ExamDrugs = new ExamDrugs();
        $ExamDrugs->setMedicalHistory($medicalHistory);
        $ExamDrugs->setStatus(1);

        $ExamFecalysis = new ExamFecalysis();
        $ExamFecalysis->setMedicalHistory($medicalHistory);
        $ExamFecalysis->setStatus(1);

        $ExamHbsAG = new ExamHbsAG();
        $ExamHbsAG->setMedicalHistory($medicalHistory);
        $ExamHbsAG->setStatus(1);

        $ExamHepA = new ExamHepA();
        $ExamHepA->setMedicalHistory($medicalHistory);
        $ExamHepA->setStatus(1);

        $ExamHIV = new ExamHIV();
        $ExamHIV->setMedicalHistory($medicalHistory);
        $ExamHIV->setStatus(1);

        $ExamPhysical = new ExamPhysical();
        $ExamPhysical->setMedicalHistory($medicalHistory);
        $ExamPhysical->setStatus(1);

        $ExamPsychological = new ExamPsychological();
        $ExamPsychological->setMedicalHistory($medicalHistory);
        $ExamPsychological->setStatus(1);

        $ExamRiba = new ExamRiba();
        $ExamRiba->setMedicalHistory($medicalHistory);
        $ExamRiba->setStatus(1);

        $ExamRPR = new ExamRPR();
        $ExamRPR->setMedicalHistory($medicalHistory);
        $ExamRPR->setStatus(1);

        $ExamUrinalysis = new ExamUrinalysis();
        $ExamUrinalysis->setMedicalHistory($medicalHistory);
        $ExamUrinalysis->setStatus(1);

        $ExamVaccines = new ExamVaccines();
        $ExamVaccines->setMedicalHistory($medicalHistory);
        $ExamVaccines->setStatus(1);

        $ExamVisualAcuity = new ExamVisualAcuity();
        $ExamVisualAcuity->setMedicalHistory($medicalHistory);
        $ExamVisualAcuity->setStatus(1);


        if ($crew->getAge() >= 50 && $crew->getGender() == 'male') {
            $ExamPSA = new ExamPSA();
            $ExamPSA->setMedicalHistory($medicalHistory);
            $ExamPSA->setStatus(1);
            $this->entityManager->persist($ExamPSA);
        }
        if ($crew->getAge() >= 40) {
            $ExamEKG = new ExamEKG();
            $ExamEKG->setMedicalHistory($medicalHistory);
            $ExamEKG->setStatus(1);
            $this->entityManager->persist($ExamEKG);
        }

        if ($crew->getGender() == 'female') {
            $ExamPregnancyTest = new ExamPregnancyTest();
            $ExamPregnancyTest->setMedicalHistory($medicalHistory);
            $ExamPregnancyTest->setStatus(1);
            $this->entityManager->persist($ExamPregnancyTest);
        }

        $foodHandlersPosition = [
            'Food Handlers',
            'Housekeeping',
            'Bar Waiter',
            'Waiter',
        ];

        if (in_array($crew->getPosition(), $foodHandlersPosition) || $isFoodHandler) {
            $ExamOvaAndParasites = new ExamOvaAndParasites();
            $ExamOvaAndParasites->setMedicalHistory($medicalHistory);
            $ExamOvaAndParasites->setStatus(1);
            $this->entityManager->persist($ExamOvaAndParasites);
            $ExamStoolCulture = new ExamStoolCulture();
            $ExamStoolCulture->setMedicalHistory($medicalHistory);
            $ExamStoolCulture->setStatus(1);
            $this->entityManager->persist($ExamStoolCulture);
        }

        $this->entityManager->persist($ExamAudiometry);
        $this->entityManager->persist($ExamBloodChemistry);
        $this->entityManager->persist($ExamBloodType);
        $this->entityManager->persist($ExamCBC);
        $this->entityManager->persist($ExamChestXray);
        $this->entityManager->persist($ExamDrugs);
        $this->entityManager->persist($ExamFecalysis);
        $this->entityManager->persist($ExamHbsAG);
        $this->entityManager->persist($ExamHepA);
        $this->entityManager->persist($ExamHIV);
        $this->entityManager->persist($ExamPhysical);
        $this->entityManager->persist($ExamPsychological);
        $this->entityManager->persist($ExamRiba);
        $this->entityManager->persist($ExamRPR);
        $this->entityManager->persist($ExamUrinalysis);
        $this->entityManager->persist($ExamVaccines);
        $this->entityManager->persist($ExamVisualAcuity);

        $this->entityManager->flush();
    }
}
