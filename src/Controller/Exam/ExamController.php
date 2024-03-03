<?php

namespace App\Controller\Exam;

use App\Controller\BaseController;
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
use App\Form\ExamAudiometryType;
use App\Form\ExamBloodChemistryType;
use App\Form\ExamBloodTypeType;
use App\Form\ExamCBCType;
use App\Form\ExamChestXrayType;
use App\Form\ExamDrugsType;
use App\Form\ExamEKGType;
use App\Form\ExamFecalysisType;
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

#[Route('/medical-history/exam', name: 'exam_')]
class ExamController extends BaseController
{
    private $status = [
        1 => 'Not Started',
        2 => 'In Progress',
        3 => 'Awaiting Results',
        4 => 'Evaluation',
        5 => 'Closed',
    ];
    
    public function __construct(PaginatorInterface $paginator)
    {
        parent::__construct($paginator);
//        $this->breadcrumbs[] = ['name' => 'Crew', 'path' => $this->generateUrl('crew_index')];
    }

    public function createBreadcrumbs(Crew $crew, MedicalHistory $medicalHistory, string $exam_name)
    {
        $this->breadcrumbs[] = ['name' => 'Crew', 'path' => $this->generateUrl('crew_index')];
        $this->breadcrumbs[] = ['name' => $crew->getFullName(), 'path' => $this->generateUrl('crew_show', ['id' => $crew->getId()])];
        $this->breadcrumbs[] = ['name' => 'Medical - ' . $medicalHistory->getStartDate()->format('Y-m-d'), 'path' => $this->generateUrl('medical_history_detail', ['id' => $medicalHistory->getId()])];
        $this->breadcrumbs[] = ['name' => $exam_name];
    }

    #[Route('/audiometry/{id}/', name: 'audiometry')]
    public function ExamAudiometry(ExamAudiometry $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Audiometry';
        $exam_path = 'audiometry';

        $form = $this->createForm(ExamAudiometryType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);

    }

    #[Route('/blood-chemistry/{id}/', name: 'blood_chemistry')]
    public function ExamBloodChemistry(ExamBloodChemistry $exam, Request $request, EntityManagerInterface $entityManager): Response
    {
        $exam_name = 'Blood Chemistry';
        $exam_path = 'blood_chemistry';

        $form = $this->createForm(ExamBloodChemistryType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/blood-type/{id}/', name: 'blood_type')]
    public function ExamBloodType(ExamBloodType $exam, Request $request, EntityManagerInterface $entityManager): Response
    {
        $exam_name = 'Blood Type';
        $exam_path = 'blood_type';

        $form = $this->createForm(ExamBloodTypeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/cbc/{id}/', name: 'cbc')]
    public function ExamCBC(ExamCBC $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'CBC';
        $exam_path = 'cbc';

        $form = $this->createForm(ExamCBCType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/chest-x-ray/{id}/', name: 'chest_xray')]
    public function ExamChestXray(ExamChestXray $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Chest X-ray';
        $exam_path = 'chest_xray';

        $form = $this->createForm(ExamChestXrayType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/drugs/{id}/', name: 'drugs')]
    public function ExamDrugs(ExamDrugs $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Drugs';
        $exam_path = 'drugs';

        $form = $this->createForm(ExamDrugsType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/ekg/{id}/', name: 'drugs')]
    public function ExamEKG(ExamEKG $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'EKG';
        $exam_path = 'ekg';

        $form = $this->createForm(ExamEKGType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/fecalysis/{id}/', name: 'fecalysis')]
    public function ExamFecalysis(ExamFecalysis $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Fecalysis';
        $exam_path = 'fecalysis';

        $form = $this->createForm(ExamFecalysisType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/hbsag/{id}/', name: 'hbsag')]
    public function ExamHbsAG(ExamHbsAG $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'HbsAG';
        $exam_path = 'hbsag';

        $form = $this->createForm(ExamHbsAGType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/HepA/{id}/', name: 'hepa')]
    public function ExamHepA(ExamHepA $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'HepA';
        $exam_path = 'hepa';

        $form = $this->createForm(ExamHepAType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/hiv/{id}/', name: 'hiv')]
    public function ExamHIV(ExamHIV $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'HIV';
        $exam_path = 'hiv';

        $form = $this->createForm(ExamHIVType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/ova-and-parasites/{id}/', name: 'ova_and_parasites')]
    public function ExamOvaAndParasites(ExamOvaAndParasites $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Ova And Parasites';
        $exam_path = 'ova_and_parasites';

        $form = $this->createForm(ExamOvaAndParasitesType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/physical/{id}/', name: 'physical')]
    public function ExamPhysical(ExamPhysical $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Physical';
        $exam_path = 'physical';

        $form = $this->createForm(ExamPhysicalType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/pregnancy-test/{id}/', name: 'pregnancy_test')]
    public function ExamPregnancyTest(ExamPregnancyTest $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Pregnancy Test';
        $exam_path = 'pregnancy_test';

        $form = $this->createForm(ExamPregnancyTestType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/PSA/{id}/', name: 'psa')]
    public function ExamPSA(ExamPSA $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'PSA';
        $exam_path = 'psa';

        $form = $this->createForm(ExamPSAType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/psychological/{id}/', name: 'psychological')]
    public function ExamPsychological(ExamPsychological $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Psychological';
        $exam_path = 'psychological';

        $form = $this->createForm(ExamPsychologicalType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/Riba/{id}/', name: 'riba')]
    public function ExamRiba(ExamRiba $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Riba';
        $exam_path = 'riba';

        $form = $this->createForm(ExamRibaType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/RPR/{id}/', name: 'rpr')]
    public function ExamRPR(ExamRPR $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'RPR';
        $exam_path = 'rpr';

        $form = $this->createForm(ExamRPRType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/stool-culture/{id}/', name: 'stool_culture')]
    public function ExamStoolCulture(ExamStoolCulture $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Stool Culture';
        $exam_path = 'stool_culture';

        $form = $this->createForm(ExamStoolCultureType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/urinalysis/{id}/', name: 'urinalysis')]
    public function ExamUrinalysis(ExamUrinalysis $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Urinalysis';
        $exam_path = 'urinalysis';

        $form = $this->createForm(ExamUrinalysisType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/vaccines/{id}/', name: 'vaccines')]
    public function ExamVaccines(ExamVaccines $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Vaccines';
        $exam_path = 'vaccines';

        $form = $this->createForm(ExamVaccinesType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/visual-acuity/{id}/', name: 'visual_acuity')]
    public function ExamVisualAcuity(ExamVisualAcuity $exam, Request $request, EntityManagerInterface $entityManager)
    {
        $exam_name = 'Visual Acuity';
        $exam_path = 'visual_acuity';

        $form = $this->createForm(ExamVisualAcuityType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->createBreadcrumbs($crew, $medicalHistory, $exam_name);

        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $this->status,
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => $exam_name,
            'exam_path' => $exam_path,
            'form' => $form,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }
}