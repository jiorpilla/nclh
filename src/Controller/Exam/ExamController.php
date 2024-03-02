<?php

namespace App\Controller\Exam;

use App\Controller\BaseController;
use App\Entity\ExamAudiometry;
use App\Entity\ExamBloodChemistry;
use App\Entity\ExamBloodType;
use App\Form\ExamAudiometryType;
use App\Form\ExamBloodChemistryType;
use App\Form\ExamBloodTypeType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/medical-history/exam', name: 'exam_')]
class ExamController extends BaseController
{
    public function __construct(PaginatorInterface $paginator)
    {
        parent::__construct($paginator);
//        $this->breadcrumbs[] = ['name' => 'Crew', 'path' => $this->generateUrl('crew_index')];
    }

    #[Route('/audiometry/{id}/', name: 'audiometry')]
    public function ExamAudiometry(ExamAudiometry $audiometry, Request $request, EntityManagerInterface $entityManager)
    {


        $form = $this->createForm(ExamAudiometryType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $audiometry->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->breadcrumbs[] = ['name' => 'Crew', 'path' => $this->generateUrl('crew_index')];
        $this->breadcrumbs[] = ['name' => $crew->getFullName(), 'path' => $this->generateUrl('crew_show', ['id' => $crew->getId()])];
        $this->breadcrumbs[] = ['name' => 'Medical - ' . $medicalHistory->getStartDate()->format('Y-m-d'), 'path' => $this->generateUrl('medical_history_detail', ['id' => $medicalHistory->getId()])];
        $this->breadcrumbs[] = ['name' => 'Blood Chemistry', 'path' => 'crew_index'];


        return $this->render('medical_exam/index.html.twig', [
            'test' => $audiometry,
            'status' => $audiometry->getStatus(),
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => 'Audiometry',
            'exam_path' => 'audiometry',
            'form' => $form,
//            'exams' => $exams,
//            'exams_ctr' => $exams_ctr,
            'breadcrumbs' => $this->breadcrumbs
        ]);

    }

    #[Route('/blood-chemistry/{id}/', name: 'blood_chemistry')]
    public function ExamBloodChemistry(ExamBloodChemistry $bloodChemistry, Request $request, EntityManagerInterface $entityManager): Response
    {


        $form = $this->createForm(ExamBloodChemistryType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $bloodChemistry->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->breadcrumbs[] = ['name' => 'Crew', 'path' => $this->generateUrl('crew_index')];
        $this->breadcrumbs[] = ['name' => $crew->getFullName(), 'path' => $this->generateUrl('crew_show', ['id' => $crew->getId()])];
        $this->breadcrumbs[] = ['name' => 'Medical - ' . $medicalHistory->getStartDate()->format('Y-m-d'), 'path' => $this->generateUrl('medical_history_detail', ['id' => $medicalHistory->getId()])];
        $this->breadcrumbs[] = ['name' => 'Blood Chemistry', 'path' => 'crew_index'];


        return $this->render('medical_exam/index.html.twig', [
            'test' => $bloodChemistry,
            'status' => $bloodChemistry->getStatus(),
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => 'Blood Chemistry',
            'exam_path' => 'blood_chemistry',
            'form' => $form,
//            'exams' => $exams,
//            'exams_ctr' => $exams_ctr,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }

    #[Route('/blood-type/{id}/', name: 'blood_type')]
    public function ExamBloodType(ExamBloodType $exam, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExamBloodTypeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('crew_index', [], Response::HTTP_SEE_OTHER);
        }

        $medicalHistory = $exam->getMedicalHistory();
        $crew = $medicalHistory->getCrew();

        $this->breadcrumbs[] = ['name' => 'Crew', 'path' => $this->generateUrl('crew_index')];
        $this->breadcrumbs[] = ['name' => $crew->getFullName(), 'path' => $this->generateUrl('crew_show', ['id' => $crew->getId()])];
        $this->breadcrumbs[] = ['name' => 'Medical - ' . $medicalHistory->getStartDate()->format('Y-m-d'), 'path' => $this->generateUrl('medical_history_detail', ['id' => $medicalHistory->getId()])];
        $this->breadcrumbs[] = ['name' => 'Blood Type'];


        return $this->render('medical_exam/index.html.twig', [
            'test' => $exam,
            'status' => $exam->getStatus(),
            'medicalHistory' => $medicalHistory,
            'crew' => $crew,
            'exam' => 'Blood Type',
            'exam_path' => 'blood_type',
            'form' => $form,
//            'exams' => $exams,
//            'exams_ctr' => $exams_ctr,
            'breadcrumbs' => $this->breadcrumbs
        ]);

    }

    #[Route('/cbc/{id}/', name: 'cbc')]
    public function ExamCBC()
    {

    }

    #[Route('/chest-x-ray/{id}/', name: 'chest_xray')]
    public function ExamChestXray()
    {

    }

    #[Route('/drugs/{id}/', name: 'drugs')]
    public function ExamDrugs()
    {
    }

    #[Route('/drugs/{id}/', name: 'drugs')]
    public function ExamEKG()
    {
    }

    #[Route('/fecalysis/{id}/', name: 'fecalysis')]
    public function ExamFecalysis()
    {
    }

    #[Route('/hbsag/{id}/', name: 'hbsag')]
    public function ExamHbsAG()
    {
    }

    #[Route('/HepA/{id}/', name: 'hepa')]
    public function ExamHepA()
    {
    }

    #[Route('/hiv/{id}/', name: 'hiv')]
    public function ExamHIV()
    {
    }

    #[Route('/ova-and-parasites/{id}/', name: 'ova_and_parasites')]
    public function ExamOvaAndParasites()
    {
    }

    #[Route('/physical/{id}/', name: 'physical')]
    public function ExamPhysical()
    {
    }

    #[Route('/pregnancy-test/{id}/', name: 'pregnancy_test')]
    public function ExamPregnancyTest()
    {
    }

    #[Route('/PSA/{id}/', name: 'psa')]
    public function ExamPSA()
    {
    }

    #[Route('/psychological/{id}/', name: 'psychological')]
    public function ExamPsychological()
    {
    }

    #[Route('/Riba/{id}/', name: 'riba')]
    public function ExamRiba()
    {
    }

    #[Route('/RPR/{id}/', name: 'rpr')]
    public function ExamRPR()
    {
    }

    #[Route('/stool-culture/{id}/', name: 'stool_culture')]
    public function ExamStoolCulture()
    {
    }

    #[Route('/urinalysis/{id}/', name: 'urinalysis')]
    public function ExamUrinalysis()
    {
    }

    #[Route('/vaccines/{id}/', name: 'vaccines')]
    public function ExamVaccines()
    {
    }

    #[Route('/visual-acuity/{id}/', name: 'visual_acuity')]
    public function ExamVisualAcuity()
    {
    }
}