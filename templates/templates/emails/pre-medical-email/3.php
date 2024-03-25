<?php

$choices1 = [
    'Heart condition / angina?',
    'Blood pressure problems?',
    'Stroke / vascular disease?',
    'Nervous disorder?',
    'Diabetes?',
    'Arthritis?',
    'Kidney / Renal disease?',
    'Immunologic and / or lymphatic disease / illness?',
    'Any type of psychological disorders?',
    'Tuberculosis?',
    'Asthma and / or eczema?',
    'Glaucoma?',
    'Epilepsy, fits, nervous breakdown?',
    'Cancer, tumor, cysts?',
    'Any type of allergies?',
    'Endocrine disease or illness?'
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="/css/styles.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center">

    <div class="container">
        <div class="content row gr-5 my-4">

            <div class="col-md-5 information p-5">
                <div class="logo">
                    <img src="https://d1io3yog0oux5.cloudfront.net/_65b0612154af7c22021d82432181367c/nclhltd/files/theme/images/logo-footer.svg"
                        alt="" class="img-fluid">
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
                        <a href="/3.php" class="list-group-item list-group-item-action active">
                            <div class="d-flex w-100 justify-content-between">
                                Family Medical History
                                <i class="bi bi-check-circle-fill text-success"></i>
                            </div>

                        </a>
                    </div>

                </div>
            </div>

            <div class="col-md-7">
                <div class="form-wrapper p-5">
                    <form method="POST" action="/2.php">
                        <div class="form-section row">
                            <h2 class="section-heading">Family Medical History</h2>
                            <ol class="ps-4">
                                <li class="mb-3">
                                    <div class="question mb-3">
                                    Does any member of your family have or ever had the following medical conditions? 
                                    </div>
                                    <div class="answer">
                                        <div class="form-check-wrapper row">
                                            <?php foreach($choices1 as $key => $choice) :?>
                                            <div class="form-check col-md-6 mb-3">
                                                <input class="form-check-input" type="checkbox" id="choice<?php echo $key;?>" value="<?php echo $choice;?>">
                                                <label class="form-check-label" for="choice<?php echo $key;?>">
                                                    <?php echo $choice;?>
                                                </label>
                                            </div>
                                            <?php endforeach; ?>                       
                                    </div>
                                </li>

                                <li class="mb-3">
                                    <div class="question mb-3">
                                        If you've answered yes to any of the items above, please write the details here:
                                    </div>
                                    <div class="answer">
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </li>
                            </ol>
                            <div class="mb-3 ">

                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <a href="/2.php" class="btn btn-secondary me-md-1" type="button">Back</a>
                                <a href="/finish.php" class="btn btn-primary" type="button">Finish</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>