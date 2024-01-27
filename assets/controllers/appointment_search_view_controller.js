import { Controller } from '@hotwired/stimulus';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ['searchBox',]

    toggleSearchBox()
    {
        this.searchBoxTarget.classList.toggle('d-none');
        // $.ajax({
        //     url: '/crew/find',
        //     method: 'GET',
        //     data: {
        //         ...(this.emailTarget.value !== '' ? { email: this.emailTarget.value } : {}),
        //         ...(this.passportNumberTarget.value !== '' ? { passportNumber: this.passportNumberTarget.value } : {}),
        //         ...(this.seamanBookNumberTarget.value !== '' ? { seamanBookNumber: this.seamanBookNumberTarget.value } : {}),
        //     },
        //     dataType: 'json',
        //     beforeSend: () => {
        //         // This function will be executed before the AJAX request is sent
        //         // You can perform actions like showing a loading spinner or disabling buttons
        //         console.log('Request is being sent...');
        //     },
        //     success: (response) => {
        //
        //     },
        //     error: (xhr, status, error) => {
        //         // Handle errors
        //         console.error('Error fetching data:', status, error);
        //     },
        //     complete: () => {
        //         // This function will be executed after the AJAX request is complete, regardless of success or failure
        //         console.log('Request complete.');
        //         // You can perform actions like hiding loading spinners or enabling buttons
        //     }
        // });
    }

}