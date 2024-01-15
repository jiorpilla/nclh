import { Controller } from '@hotwired/stimulus';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ["webcam", "canvas", "photoContainer", "activateBtn", "deactivateBtn", "captureBtn"];

    activateCamera()
    {
        // Check if the user's browser supports getUserMedia
        if (navigator.mediaDevices) {

            // Request access to the user's camera
            navigator.mediaDevices
                .getUserMedia({ video: true })
                .then((stream) => {
                    // Display the video feed in the webcam element
                    this.webcamTarget.srcObject = stream;
                    // Show the "Webcam Video" button
                    this.webcamTarget.style.display = 'block';
                    // Show the "Deactivate Camera" button
                    this.deactivateBtnTarget.style.display = 'block';
                    // Show the "Capture image" button and
                    this.captureBtnTarget.style.display = 'block';
                    // hide the "Activate Camera" button
                    this.activateBtnTarget.style.display = 'none';
                })
                .catch((error) => {
                    alert("Error accessing the camera: " + error);
                });

        } else {
            alert("getUserMedia not supported in this browser.");
        }
    }

    deactivateCamera()
    {
        // Stop the media stream and hide the webcam
        if (this.webcamTarget.srcObject) {
            this.webcamTarget.srcObject.getTracks().forEach((track) => track.stop());
        }
        this.webcamTarget.style.display = 'none';
        // Show the "Activate Camera" button
        this.activateBtnTarget.style.display = 'block';
        // Show the "Capture image" button and
        this.captureBtnTarget.style.display = 'none';
        // hide the "Deactivate Camera" button
        this.deactivateBtnTarget.style.display = 'none';
    }

    captureImage()
    {

        const context = this.canvasTarget.getContext("2d");
        this.canvasTarget.width = this.webcamTarget.videoWidth;
        this.canvasTarget.height = this.webcamTarget.videoHeight;
        context.drawImage(this.webcamTarget, 0, 0, this.canvasTarget.width, this.canvasTarget.height);
        this.canvasTarget.toBlob((blob) => {
            const imageURL = URL.createObjectURL(blob);

            // // Create a new image element
            // const  imgElement = $('<img>').attr('src', imageURL).attr('alt', 'Captured Photo');
            //
            // // Clear the content of the photoContainer and add the new image
            // $(this.photoContainerTarget).html(imgElement);

            // Find the existing img tag within the photoContainer
            const existingImgElement = $(this.photoContainerTarget).find('img');

            // If an img tag already exists, update its src attribute; otherwise, create a new img tag
            if (existingImgElement.length) {
                existingImgElement.attr('src', imageURL).attr('alt', 'Captured Photo').attr('class', 'img-fluid');
            } else {
                // If no img tag exists, create a new one and add it to the photoContainer
                const imgElement = $('<img>').attr('src', imageURL).attr('alt', 'Captured Photo');
                $(this.photoContainerTarget).html(imgElement);
            }

            // set filename based on date
            const  fileName = 'image' + new Date().getTime() + '.jpg';
            // Create a File object from the blob
            const  file = new File([blob], fileName, { type: "image/jpeg"});

            // Get the file input element
            const  fileInput = document.querySelector('.vich-image input[type="file"]');
            const  container = new DataTransfer();
            container.items.add(file);
            fileInput.files = container.files;

            // Trigger a change event on the file input to simulate user selection
            $(fileInput).trigger('change');

            // Clean up the URL.createObjectURL to avoid memory leaks
            URL.revokeObjectURL(imageURL);

        });
    }
}
