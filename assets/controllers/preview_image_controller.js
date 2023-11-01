import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['input', 'preview']

    img_preview() {
        const fileInput = this.inputTarget
        const preview = this.previewTarget

        const file = fileInput.files[0]
        const reader = new FileReader()

        reader.onloadend = () => {
            preview.src = reader.result
        }

        if (file) {
            reader.readAsDataURL(file)
        } else {
            preview.src = ""
        }
    }
}