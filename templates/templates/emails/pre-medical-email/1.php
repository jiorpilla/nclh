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
                        <a href="/2.php" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                Personal Medical History
                                <i class="bi bi-circle"></i>
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
                            <h2 class="section-heading">Primary Details</h2>
                            <div class="mb-3 col-md-6 ">
                                <label for="exampleInputEmail1" class="form-label">First name</label>
                                <input type="text" class="form-control" value="Querwin">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Last name</label>
                                <input type="text" class="form-control" value="Guron">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Middle name</label>
                                <input type="text" class="form-control" value="Pogi">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Suffix</label>
                                <input type="text" class="form-control" value="-">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Gender</label>
                                <select name="nationality" class="form-select">
                                    <option value="yemenite">Male</option>
                                    <option value="zambian">Female</option>
                                </select>
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Date of birth</label>
                                <input type="date" class="form-control" value="1987-03-01">
                            </div>
                            <div class="mb-3 col-md-6 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Location of birth</label>
                                <input type="text" class="form-control" value="Pasig City">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Nationality</label>

                                <select name="nationality" class="form-select">
                                    <option value="">-- select one --</option>
                                    <option value="afghan">Afghan</option>
                                    <option value="albanian">Albanian</option>
                                    <option value="algerian">Algerian</option>
                                    <option value="american">American</option>
                                    <option value="andorran">Andorran</option>
                                    <option value="angolan">Angolan</option>
                                    <option value="antiguans">Antiguans</option>
                                    <option value="argentinean">Argentinean</option>
                                    <option value="armenian">Armenian</option>
                                    <option value="australian">Australian</option>
                                    <option value="austrian">Austrian</option>
                                    <option value="azerbaijani">Azerbaijani</option>
                                    <option value="bahamian">Bahamian</option>
                                    <option value="bahraini">Bahraini</option>
                                    <option value="bangladeshi">Bangladeshi</option>
                                    <option value="barbadian">Barbadian</option>
                                    <option value="barbudans">Barbudans</option>
                                    <option value="batswana">Batswana</option>
                                    <option value="belarusian">Belarusian</option>
                                    <option value="belgian">Belgian</option>
                                    <option value="belizean">Belizean</option>
                                    <option value="beninese">Beninese</option>
                                    <option value="bhutanese">Bhutanese</option>
                                    <option value="bolivian">Bolivian</option>
                                    <option value="bosnian">Bosnian</option>
                                    <option value="brazilian">Brazilian</option>
                                    <option value="british">British</option>
                                    <option value="bruneian">Bruneian</option>
                                    <option value="bulgarian">Bulgarian</option>
                                    <option value="burkinabe">Burkinabe</option>
                                    <option value="burmese">Burmese</option>
                                    <option value="burundian">Burundian</option>
                                    <option value="cambodian">Cambodian</option>
                                    <option value="cameroonian">Cameroonian</option>
                                    <option value="canadian">Canadian</option>
                                    <option value="cape verdean">Cape Verdean</option>
                                    <option value="central african">Central African</option>
                                    <option value="chadian">Chadian</option>
                                    <option value="chilean">Chilean</option>
                                    <option value="chinese">Chinese</option>
                                    <option value="colombian">Colombian</option>
                                    <option value="comoran">Comoran</option>
                                    <option value="congolese">Congolese</option>
                                    <option value="costa rican">Costa Rican</option>
                                    <option value="croatian">Croatian</option>
                                    <option value="cuban">Cuban</option>
                                    <option value="cypriot">Cypriot</option>
                                    <option value="czech">Czech</option>
                                    <option value="danish">Danish</option>
                                    <option value="djibouti">Djibouti</option>
                                    <option value="dominican">Dominican</option>
                                    <option value="dutch">Dutch</option>
                                    <option value="east timorese">East Timorese</option>
                                    <option value="ecuadorean">Ecuadorean</option>
                                    <option value="egyptian">Egyptian</option>
                                    <option value="emirian">Emirian</option>
                                    <option value="equatorial guinean">Equatorial Guinean</option>
                                    <option value="eritrean">Eritrean</option>
                                    <option value="estonian">Estonian</option>
                                    <option value="ethiopian">Ethiopian</option>
                                    <option value="fijian">Fijian</option>
                                    <option value="filipino">Filipino</option>
                                    <option value="finnish">Finnish</option>
                                    <option value="french">French</option>
                                    <option value="gabonese">Gabonese</option>
                                    <option value="gambian">Gambian</option>
                                    <option value="georgian">Georgian</option>
                                    <option value="german">German</option>
                                    <option value="ghanaian">Ghanaian</option>
                                    <option value="greek">Greek</option>
                                    <option value="grenadian">Grenadian</option>
                                    <option value="guatemalan">Guatemalan</option>
                                    <option value="guinea-bissauan">Guinea-Bissauan</option>
                                    <option value="guinean">Guinean</option>
                                    <option value="guyanese">Guyanese</option>
                                    <option value="haitian">Haitian</option>
                                    <option value="herzegovinian">Herzegovinian</option>
                                    <option value="honduran">Honduran</option>
                                    <option value="hungarian">Hungarian</option>
                                    <option value="icelander">Icelander</option>
                                    <option value="indian">Indian</option>
                                    <option value="indonesian">Indonesian</option>
                                    <option value="iranian">Iranian</option>
                                    <option value="iraqi">Iraqi</option>
                                    <option value="irish">Irish</option>
                                    <option value="israeli">Israeli</option>
                                    <option value="italian">Italian</option>
                                    <option value="ivorian">Ivorian</option>
                                    <option value="jamaican">Jamaican</option>
                                    <option value="japanese">Japanese</option>
                                    <option value="jordanian">Jordanian</option>
                                    <option value="kazakhstani">Kazakhstani</option>
                                    <option value="kenyan">Kenyan</option>
                                    <option value="kittian and nevisian">Kittian and Nevisian</option>
                                    <option value="kuwaiti">Kuwaiti</option>
                                    <option value="kyrgyz">Kyrgyz</option>
                                    <option value="laotian">Laotian</option>
                                    <option value="latvian">Latvian</option>
                                    <option value="lebanese">Lebanese</option>
                                    <option value="liberian">Liberian</option>
                                    <option value="libyan">Libyan</option>
                                    <option value="liechtensteiner">Liechtensteiner</option>
                                    <option value="lithuanian">Lithuanian</option>
                                    <option value="luxembourger">Luxembourger</option>
                                    <option value="macedonian">Macedonian</option>
                                    <option value="malagasy">Malagasy</option>
                                    <option value="malawian">Malawian</option>
                                    <option value="malaysian">Malaysian</option>
                                    <option value="maldivan">Maldivan</option>
                                    <option value="malian">Malian</option>
                                    <option value="maltese">Maltese</option>
                                    <option value="marshallese">Marshallese</option>
                                    <option value="mauritanian">Mauritanian</option>
                                    <option value="mauritian">Mauritian</option>
                                    <option value="mexican">Mexican</option>
                                    <option value="micronesian">Micronesian</option>
                                    <option value="moldovan">Moldovan</option>
                                    <option value="monacan">Monacan</option>
                                    <option value="mongolian">Mongolian</option>
                                    <option value="moroccan">Moroccan</option>
                                    <option value="mosotho">Mosotho</option>
                                    <option value="motswana">Motswana</option>
                                    <option value="mozambican">Mozambican</option>
                                    <option value="namibian">Namibian</option>
                                    <option value="nauruan">Nauruan</option>
                                    <option value="nepalese">Nepalese</option>
                                    <option value="new zealander">New Zealander</option>
                                    <option value="ni-vanuatu">Ni-Vanuatu</option>
                                    <option value="nicaraguan">Nicaraguan</option>
                                    <option value="nigerien">Nigerien</option>
                                    <option value="north korean">North Korean</option>
                                    <option value="northern irish">Northern Irish</option>
                                    <option value="norwegian">Norwegian</option>
                                    <option value="omani">Omani</option>
                                    <option value="pakistani">Pakistani</option>
                                    <option value="palauan">Palauan</option>
                                    <option value="panamanian">Panamanian</option>
                                    <option value="papua new guinean">Papua New Guinean</option>
                                    <option value="paraguayan">Paraguayan</option>
                                    <option value="peruvian">Peruvian</option>
                                    <option value="polish">Polish</option>
                                    <option value="portuguese">Portuguese</option>
                                    <option value="qatari">Qatari</option>
                                    <option value="romanian">Romanian</option>
                                    <option value="russian">Russian</option>
                                    <option value="rwandan">Rwandan</option>
                                    <option value="saint lucian">Saint Lucian</option>
                                    <option value="salvadoran">Salvadoran</option>
                                    <option value="samoan">Samoan</option>
                                    <option value="san marinese">San Marinese</option>
                                    <option value="sao tomean">Sao Tomean</option>
                                    <option value="saudi">Saudi</option>
                                    <option value="scottish">Scottish</option>
                                    <option value="senegalese">Senegalese</option>
                                    <option value="serbian">Serbian</option>
                                    <option value="seychellois">Seychellois</option>
                                    <option value="sierra leonean">Sierra Leonean</option>
                                    <option value="singaporean">Singaporean</option>
                                    <option value="slovakian">Slovakian</option>
                                    <option value="slovenian">Slovenian</option>
                                    <option value="solomon islander">Solomon Islander</option>
                                    <option value="somali">Somali</option>
                                    <option value="south african">South African</option>
                                    <option value="south korean">South Korean</option>
                                    <option value="spanish">Spanish</option>
                                    <option value="sri lankan">Sri Lankan</option>
                                    <option value="sudanese">Sudanese</option>
                                    <option value="surinamer">Surinamer</option>
                                    <option value="swazi">Swazi</option>
                                    <option value="swedish">Swedish</option>
                                    <option value="swiss">Swiss</option>
                                    <option value="syrian">Syrian</option>
                                    <option value="taiwanese">Taiwanese</option>
                                    <option value="tajik">Tajik</option>
                                    <option value="tanzanian">Tanzanian</option>
                                    <option value="thai">Thai</option>
                                    <option value="togolese">Togolese</option>
                                    <option value="tongan">Tongan</option>
                                    <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                    <option value="tunisian">Tunisian</option>
                                    <option value="turkish">Turkish</option>
                                    <option value="tuvaluan">Tuvaluan</option>
                                    <option value="ugandan">Ugandan</option>
                                    <option value="ukrainian">Ukrainian</option>
                                    <option value="uruguayan">Uruguayan</option>
                                    <option value="uzbekistani">Uzbekistani</option>
                                    <option value="venezuelan">Venezuelan</option>
                                    <option value="vietnamese">Vietnamese</option>
                                    <option value="welsh">Welsh</option>
                                    <option value="yemenite">Yemenite</option>
                                    <option value="zambian">Zambian</option>
                                    <option value="zimbabwean">Zimbabwean</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Civil status</label>
                                <select name="nationality" class="form-select">
                                    <option value="yemenite">Single</option>
                                    <option value="zambian">Married</option>
                                    <option value="zambian">Divorced</option>
                                    <option value="zambian">Widowed</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Passport Number</label>
                                <input type="text" class="form-control" value="A4SKN132V">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Seaman book number</label>
                                <input type="text" class="form-control is-invalid" value="00038FJE4">
                                <div id="invalidCheck3Feedback" class="invalid-feedback">
                                    Sample Error Message
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Company</label>
                                <input type="text" class="form-control" value="NCLH">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Ship</label>
                                <input type="text" class="form-control" value="Super Ferry">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Position</label>
                                <input type="text" class="form-control" value="Web Developer">
                            </div>
                        </div>
                        <div class="form-section row">
                            <h2 class="section-heading">Contact Details</h2>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Phone number</label>
                                <input type="text" class="form-control" value="0015-4805">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" value="querwin@test.com">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                <textarea row="3" class="form-control">020 2ksk39sbsal lka80dahioaE9 82HKLASDLK</textarea>
                            </div>

                        </div>

                        <div class="alert alert-light mb-3 " role="alert">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">I confirm that all information
                                    supplied above is correct and accurate.</label>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                            <button class="btn btn-secondary me-md-1" type="button">Back</button>
                            <button type="submit" class="btn btn-primary" type="button">Next</button>
                        </div>

                    </form>
                </div>

            </div>




        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>