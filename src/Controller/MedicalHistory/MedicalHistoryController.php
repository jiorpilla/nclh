<?php

namespace App\Controller\MedicalHistory;

use App\Controller\BaseController;
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
use App\Form\ExamAudiometryType;
use App\Form\ExamBloodChemistryType;
use App\Form\ExamBloodTypeType;
use App\Form\ExamCBCType;
use App\Form\ExamChestXrayType;
use App\Form\ExamDrugsType;
use App\Form\ExamEKGType;
use App\Form\ExamHbsAGType;
use App\Form\ExamHepAType;
use App\Form\ExamHIVType;
use App\Form\ExamOvaAndParasitesType;
use App\Form\ExamPhysicalType;
use App\Form\ExamPregnancyTestType;
use App\Form\ExamPSAType;
use App\Form\ExamPsychologicalType;
use App\Form\ExamRibaType;
use App\Form\ExamRPRType;
use App\Form\ExamStoolCultureType;
use App\Form\ExamUrinalysisType;
use App\Form\ExamVaccinesType;
use App\Form\ExamVisualAcuityType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedicalHistoryController extends BaseController
{
    private $status = [
        1 => 'Not Started',
        2 => 'In Progress',
        3 => 'Awaiting Results',
        4 => 'Evaluation',
        5 => 'Closed',
    ];
    private $ExamPregnancyTest;
    private $ExamPSA;
    private $ExamStoolCulture;
    private $ExamEKG;
    private $ExamChestXray;
    private $ExamBloodChemistry;
    private $ExamUrinalysis;
    private $ExamDrugs;
    private $ExamCBC;
    private $ExamBloodType;
    private $ExamHepA;
    private $ExamRiba;
    private $ExamRPR;
    private $ExamHIV;
    private $ExamHbsAG;
    private $ExamVisualAcuity;
    private $ExamPhysical;
    private $ExamAudiometry;
    private $ExamVaccines;
    private $ExamPsychological;
    private $ExamOvaAndParasites;

    public function __construct(PaginatorInterface $paginator)
    {
        parent::__construct($paginator);
//        $this->breadcrumbs[] = ['name' => 'Crew', 'path' => $this->generateUrl('crew_index')];
    }

    #[Route('/medical-history/{id}', name: 'medical_history_detail', methods: ['GET', 'POST'])]
    public function index(MedicalHistory $medicalHistory, EntityManagerInterface $entityManager): Response
    {
        $crew = $medicalHistory->getCrew();
        dump($medicalHistory);
        $this->breadcrumbs[] = ['name' => 'Crew', 'path' => $this->generateUrl('crew_index')];
        $this->breadcrumbs[] = ['name' => $crew->getFullName(), 'path' => $this->generateUrl('crew_show', ['id' => $crew->getId()])];
        $this->breadcrumbs[] = ['name' => 'Medical - ' . $medicalHistory->getStartDate()->format('Y-m-d'), 'path' => 'crew_index'];


        $exams = $this->fetchExams($medicalHistory, $entityManager);
        $exams_ctr = [
            'total' => 0,
            'completed' => 0,
        ];
        foreach($exams AS $exam_name => $exam){
            if(!is_null($exam)){
                $exams_ctr['total']++;
                if($exam->getStatus() == 5){
                    $exams_ctr['completed']++;
                }
            }else{
                unset($exams[$exam_name]);
            }
        }

        dump($exams);
        return $this->render('medical_history/index.html.twig', [
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exams' => $exams,
            'exams_ctr' => $exams_ctr,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/medical-history/{id}/{exam}', name: 'medical_history_exam')]
    public function medicalExam(MedicalHistory $medicalHistory, string $exam, Request $request): Response
    {
        $crew = $medicalHistory->getCrew();
        $this->breadcrumbs[] = ['name' => 'Crew', 'path' => $this->generateUrl('crew_index')];
        $this->breadcrumbs[] = ['name' => $crew->getFullName(), 'path' => $this->generateUrl('crew_show', ['id' => $crew->getId()])];
        $this->breadcrumbs[] = ['name' => 'Medical - ' . $medicalHistory->getStartDate()->format('Y-m-d'), 'path' => $this->generateUrl('medical_history_detail', ['id' => $medicalHistory->getId()])];
        $this->breadcrumbs[] = ['name' => $exam, 'path' => 'crew_index'];
//        $exam = new $exam();




        switch ($exam) {
            case "ExamAudiometry":
                $form = $this->createForm(ExamAudiometryType::class);
                break;
            case "ExamBloodChemistry":
                $form = $this->createForm(ExamBloodChemistryType::class);
                break;
            case "ExamBloodType":
                $form = $this->createForm(ExamBloodTypeType::class);
                break;
            case "ExamCBC":
                $form = $this->createForm(ExamCBCType::class);
                break;
            case "ExamChestXray":
                $form = $this->createForm(ExamChestXrayType::class);
                break;
            case "ExamDrugs":
                $form = $this->createForm(ExamDrugsType::class);
                break;
            case "ExamEKG":
                $form = $this->createForm(ExamEKGType::class);
                break;
            case "ExamHbsAG":
                $form = $this->createForm(ExamHbsAGType::class);
                break;
            case "ExamHepA":
                $form = $this->createForm(ExamHepAType::class);
                break;
            case "ExamHIV":
                $form = $this->createForm(ExamHIVType::class);
                break;
            case "ExamOvaAndParasites":
                $form = $this->createForm(ExamOvaAndParasitesType::class);
                break;
            case "ExamPhysical":
                $form = $this->createForm(ExamPhysicalType::class);
                break;
            case "ExamPregnancyTest":
                $form = $this->createForm(ExamPregnancyTestType::class);
                break;
            case "ExamPSA":
                $form = $this->createForm(ExamPSAType::class);
                break;
            case "ExamPsychological":
                $form = $this->createForm(ExamPsychologicalType::class);
                break;
            case "ExamRiba":
                $form = $this->createForm(ExamRibaType::class);
                break;
            case "ExamRPR":
                $form = $this->createForm(ExamRPRType::class);
                break;
            case "ExamStoolCulture":
                $form = $this->createForm(ExamStoolCultureType::class);
                break;
            case "ExamUrinalysis":
                $form = $this->createForm(ExamUrinalysisType::class);
                break;
            case "ExamVaccines":
                $form = $this->createForm(ExamVaccinesType::class);
                break;
            case "ExamVisualAcuity":
                $form = $this->createForm(ExamVisualAcuityType::class);
                break;
            default:
                $form = $this->createForm(ExamPSAType::class);
                break;
        }
        $form->handleRequest($request);


        return $this->render('medical_exam/index.html.twig', [
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam,
            'form' => $form,
//            'exams' => $exams,
//            'exams_ctr' => $exams_ctr,
            'breadcrumbs' => $this->breadcrumbs
        ]);

    }


    public function fetchExams(MedicalHistory $medicalHistory, EntityManagerInterface $entityManager)
    {
        return [
            'audiometry' => $entityManager->getRepository(ExamAudiometry::class)->findByMedicalHistoryField($medicalHistory),
            'blood_chemistry' => $entityManager->getRepository(ExamBloodChemistry::class)->findByMedicalHistoryField($medicalHistory),
            'blood_type' => $entityManager->getRepository(ExamBloodType::class)->findByMedicalHistoryField($medicalHistory),
            'cbc' => $entityManager->getRepository(ExamCBC::class)->findByMedicalHistoryField($medicalHistory),
            'chest_xray' => $entityManager->getRepository(ExamChestXray::class)->findByMedicalHistoryField($medicalHistory),
            'drugs' => $entityManager->getRepository(ExamDrugs::class)->findByMedicalHistoryField($medicalHistory),
            'ekg' => $entityManager->getRepository(ExamEKG::class)->findByMedicalHistoryField($medicalHistory),
            'fecalysis' => $entityManager->getRepository(ExamFecalysis::class)->findByMedicalHistoryField($medicalHistory),
            'hbsag' => $entityManager->getRepository(ExamHbsAG::class)->findByMedicalHistoryField($medicalHistory),
            'hepa' => $entityManager->getRepository(ExamHepA::class)->findByMedicalHistoryField($medicalHistory),
            'hiv' => $entityManager->getRepository(ExamHIV::class)->findByMedicalHistoryField($medicalHistory),
            'ova_and_parasites' => $entityManager->getRepository(ExamOvaAndParasites::class)->findByMedicalHistoryField($medicalHistory),
            'physical' => $entityManager->getRepository(ExamPhysical::class)->findByMedicalHistoryField($medicalHistory),
            'pregnancy_test' => $entityManager->getRepository(ExamPregnancyTest::class)->findByMedicalHistoryField($medicalHistory),
            'psa' => $entityManager->getRepository(ExamPSA::class)->findByMedicalHistoryField($medicalHistory),
            'psychological' => $entityManager->getRepository(ExamPsychological::class)->findByMedicalHistoryField($medicalHistory),
            'riba' => $entityManager->getRepository(ExamRiba::class)->findByMedicalHistoryField($medicalHistory),
            'rpr' => $entityManager->getRepository(ExamRPR::class)->findByMedicalHistoryField($medicalHistory),
            'stool_culture' => $entityManager->getRepository(ExamStoolCulture::class)->findByMedicalHistoryField($medicalHistory),
            'urinalysis' => $entityManager->getRepository(ExamUrinalysis::class)->findByMedicalHistoryField($medicalHistory),
            'vaccines' => $entityManager->getRepository(ExamVaccines::class)->findByMedicalHistoryField($medicalHistory),
            'visual_acuity' => $entityManager->getRepository(ExamVisualAcuity::class)->findByMedicalHistoryField($medicalHistory),
        ];
    }
}
