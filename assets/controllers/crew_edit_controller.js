import { Controller } from '@hotwired/stimulus';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ['editButton','updateButton','formGroup']

    formEditable(){
        var formFields = this.formGroupTarget.querySelectorAll('input[type="text"]');
        for (var i = 0; i < formFields.length; i++) {
            formFields[i].toggleAttribute('disabled');
        }
        this.editButtonTarget.classList.toggle('d-none');
        this.updateButtonTarget.classList.toggle('d-none');
    }

}