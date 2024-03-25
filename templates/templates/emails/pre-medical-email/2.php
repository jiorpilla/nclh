<?php

$choices1 = [' Are you aware of any medical problems,disease, illness?', 'Frequent Ear Infections?', 'Hearing Problem?', 'Gynecological problems?', 'Conjunctivitis? Glaucoma?', 'Do you wear glasses/contact lenses?', 'Eye injury and / or Eye Problems?', 'Suffered COVID-?', 'Tested Positive for COVID-?', 'Frequent Nose bleeds? Colds? Sinus Trouble?', 'Arthritis and / or numbness', 'Swollen Lymph Nodes?', 'Asthma and / or Wheezing?', 'Bronchitis or Tuberculosis?', 'Blood in urine?', 'Pneumonia?', 'Coughing up Blood?', 'Shortness of Breath?', 'Rheumatic Fever?', 'High / Low Blood Pressure?', 'Chest Pain and / or heart attack?', 'Irregular heart beat or Poor Circulation?', 'Kidney Stones and / or cysts?', 'Other Heart Disease?', 'Stroke and/or paralysis?', 'Do you use any Recreational Drugs?', 'Loss of sensation / Tingling?', 'Varicose veins? And/ or Leg Swelling?', 'Deformities ?', 'Stomach Pain/Ulcer/Problems or Disease?', 'Gastric/Duodenal Ulcer?', 'Frequent Diarrhea or Constipation?', 'Indigestion?', 'Bleeding from Stomach or Bowels?', 'Jaundice or Liver Problems?', 'Diabetes?', 'Hemorrhoids?', 'Urinary tract Infection/Blood in Urine/Kidney Stones?', 'Prostate Disease (males)?', 'Sexually Transmitted Disease?', 'Breast Mass/Tenderness?', 'Skin Disease (e.g dermatitis or eczema)?', 'Any types of Allergies? Allergy to Medication?', 'Any bone and/or joint pain,injury and/or problems?', 'Arthritis/Hand or Wrist Problems or Pain?', 'Neck Pain/Neck Injury?', 'Sciatica/Scoliosis/Rheumatism?', 'Degenerative Condition/Disease of the Back/Neck/Muscles/Joints?', 'Do you feel healthy for the duties which you are applying ?', 'Any Sprains, Dislocations and/or Fractures?', 'Any type of back pain and/or injury?', 'Any type of Knee Problems, Pain, and/or Injury?', 'Any type of Leg Problems, Pain and/or Injury?', 'Any type of Elbow Pain/Elbow Injury?', 'Any type of Foot/Ankle pain and/or injury?', 'Any type of Shoulder pain/injury?', 'Any type of Hip pain/injury?', 'Any type of Muscular Weakness?', 'Frequent Headaches and/or Loss of Consciousness?', 'Depression and / or anxiety? Psychological Issues?', 'Seizures and/ or Epilepsy?', 'Nervous Breakdown?', 'Muscular Weakness?', 'Malaria or other Tropical Diseases?', 'Hepatitis A, B or C ? Other type of Hepatitis?', 'Cancer or tumors or cysts?', 'Serious Accidents/Illness?', 'Thyroid Disease or illness?', 'Any Bleeding disorder or Blood Transfusion?', 'Any neurological disorder?', 'Any psychological and / or psychiatric illness/disorder?', 'Immunologic or lymphatic illness?', 'Endocrine Disease or Illness?', 'Any type of renal disease?', 'Any type of gallbladder disease / stones or polyps?', 'Autoimmune disease?', 'Are you currently undergoing dental treatment?', 'Do you have any illnesses today?', 'Any type of hernia and / or rupture?', 'Have you ever been Hospitalized? For What?', 'Have you ever received a blood transfusion?', 'Have you had any operations?', 'Have you ever been repatriated for medical reasons?', 'Have you ever been certified unfit before?', 'Are you taking any medications (incl. vitamins, CBD Oil)?', 'Are you currently undergoing medical treatment?', 'Do you drink Alcohol? How much per day:___week?____', 'Do you smoke? How much per day? ____________', 'Have you ever had an MRI?', 'Have you ever had a CT scan?', 'Do you do Vaping,E-Cigs, Hookah, Dripping or other?', 'Any other conditions not listed above?', 'Females Only: Have you had any pregnancies?miscarriges?', 'Females Only:Are you or do you think you may be pregnant?', 'Females Only: Date of your last menstrual period?', 'Have you ever had lumps, cysts or tumors in your breasts?']

// print_r($choices1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="/css/styles.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center">

    <div class="container">
        <div class="content row gr-5 my-4">

            <div class="col-md-5 information p-5">
                <div class="logo">
                    <img src="https://d1io3yog0oux5.cloudfront.net/_65b0612154af7c22021d82432181367c/nclhltd/files/theme/images/logo-footer.svg" alt="" class="img-fluid">
                </div>
                <div class="reminders mt-5">
                    <ol>
                        <li>All forms must be completed prior to your appointment.</li>
                        <li>Intentional concealment of relevant information or refusal to cooperate by persons affected
                            by a health event or public concern is a crime under the REPUBLIC ACT NO. 11332</li>
                        <li>Please check your information before proceeding to the next page.</li>
                    </ol>

                    <div class="list-group mt-4 mx-3">
                        <a href="/1.php" class="list-group-item list-group-item-action active" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                Patient Information Form
                                <i class="bi bi-check-circle-fill text-success"></i>
                            </div>
                        </a>
                        <a href="/2.php" class="list-group-item list-group-item-action active">
                            <div class="d-flex w-100 justify-content-between">
                                Personal Medical History
                                <i class="bi bi-check-circle-fill text-success"></i>
                            </div>

                        </a>
                        <a href="/3.php" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                Family Medical History
                                <i class="bi bi-circle"></i>
                            </div>

                        </a>
                    </div>

                </div>
            </div>

            <div class="col-md-7">
                <div class="form-wrapper p-5">
                    <form method="POST" action="/2.php">
                        <div class="form-section row">
                            <h2 class="section-heading">Personal Medical History</h2>
                            <ol class="ps-4">
                                <!-- <li class="mb-3">
                                    <div class="question mb-3">
                                        Are you aware of any medical problems,disease, illness?
                                    </div>
                                    <div class="answer">
                                        <textarea class="form-control" ></textarea>
                                       
                                    </div> -->
                                </li>
                                <li>
                                    <div class="question mb-3">
                                        Do you have or have you ever been treated for the following conditions?
                                    </div>
                                    <div class="answer">
                                        <div class="form-check-wrapper row">
                                            <?php foreach ($choices1 as $key => $choice) : ?>
                                                <div class="form-check col-md-6 mb-3">
                                                    <input class="form-check-input" type="checkbox" id="choice<?php echo $key; ?>" value="<?php echo $choice; ?>">
                                                    <label class="form-check-label" for="choice<?php echo $key; ?>">
                                                        <?php echo $choice; ?>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>


                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="question mb-3">
                                        If you've answered yes to any of the items above, please write the details here:
                                    </div>
                                    <div class="answer">
                                        <textarea class="form-control is-invalid"></textarea>
                                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                                            Sample Error Message
                                        </div>
                                    </div>
                                </li>
                            </ol>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <a href="/1.php" class="btn btn-secondary me-md-1" type="button">Back</a>
                                <a href="/3.php" class="btn btn-primary" type="button">Next</a>
                            </div>

                    </form>
                </div>
            </div>

        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>