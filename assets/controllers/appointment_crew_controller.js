import { Controller } from '@hotwired/stimulus';
import { Toast } from 'bootstrap';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ['email', 'passportNumber', 'seamanBookNumber', 'firstName', 'middleName', 'lastName', 'suffix', 'phoneNumber',
        'civilStatus', 'gender', 'address', 'dateOfBirth', 'locationOfBirth', 'company', 'ship', 'position', 'nationality',
        'autofill']
    #storedResponse = {}; // Variable to store the response data

    findCrew()
    {
        $.ajax({
            url: '/crew/find',
            method: 'GET',
            data: {
                ...(this.emailTarget.value !== '' ? { email: this.emailTarget.value } : {}),
                ...(this.passportNumberTarget.value !== '' ? { passportNumber: this.passportNumberTarget.value } : {}),
                ...(this.seamanBookNumberTarget.value !== '' ? { seamanBookNumber: this.seamanBookNumberTarget.value } : {}),
            },
            dataType: 'json',
            success: (response) => {
                this.#storedResponse = response; // Store the response data

                // Set the content of the Toast
                document.getElementById('toastContent').innerText = `${response.idNumber} : ${response.lastName}, ${response.firstName} ${response.middleName}`;

                const toastElement = document.getElementById('crewMatch');
                const bsToast = new Toast(toastElement);
                bsToast.show();
            },
            error: (xhr, status, error) => {
                // Handle errors
                console.error('Error fetching data:', status, error);
            }
        });
    }

    autofillFields()
    {
        // Access the private property
        const storedResponse = this.#storedResponse;

        // Autofill the form fields based on the stored response data
        this.emailTarget.value              = storedResponse.email || '';
        this.passportNumberTarget.value     = storedResponse.passportNumber || '';
        this.seamanBookNumberTarget.value   = storedResponse.seamanBookNumber || '';
        this.firstNameTarget.value          = storedResponse.firstName || '';
        this.middleNameTarget.value         = storedResponse.middleName || '';
        this.lastNameTarget.value           = storedResponse.lastName || '';
        this.suffixTarget.value             = storedResponse.suffix || '';
        this.phoneNumberTarget.value        = storedResponse.phoneNumber || '';
        this.civilStatusTarget.value        = storedResponse.civilStatus || '';
        this.genderTarget.value             = storedResponse.gender || '';
        this.addressTarget.value            = storedResponse.address || '';
        this.locationOfBirthTarget.value    = storedResponse.locationOfBirth || '';
        this.companyTarget.value            = storedResponse.company || '';
        this.shipTarget.value               = storedResponse.ship || '';
        this.positionTarget.value           = storedResponse.position || '';
        this.nationalityTarget.value        = storedResponse.nationality || '';

        // Autofill dateOfBirth with the correct format
        if (storedResponse.dateOfBirth) {
            const dateOfBirth = new Date(storedResponse.dateOfBirth);
            const formattedDate = dateOfBirth.toISOString().split('T')[0];
            this.dateOfBirthTarget.value = formattedDate;
        } else {
            this.dateOfBirthTarget.value = ''; // Set to empty if dateOfBirth is not provided
        }

    }

}