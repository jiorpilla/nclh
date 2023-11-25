import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["webcam", "canvas", "photoContainer", "activateBtn", "deactivateBtn", "captureBtn"];

    activateCamera() {
        // Access the DOM elements using this.targets
        const webcam = this.webcamTarget;
        const activateBtn = this.activateBtnTarget;
        const deactivateBtn = this.deactivateBtnTarget;
        const captureBtn = this.captureBtnTarget;

        // Check if the user's browser supports getUserMedia
        if (navigator.mediaDevices) {

            // Request access to the user's camera
            navigator.mediaDevices
                .getUserMedia({ video: true })
                .then(function (stream) {
                    // Display the video feed in the webcam element
                    webcam.srcObject = stream;
                    // Show the "Webcam Video" button
                    webcam.style.display = 'block';
                    // Show the "Deactivate Camera" button
                    deactivateBtn.style.display = 'block';
                    // Show the "Capture image" button and
                    captureBtn.style.display = 'block';
                    // hide the "Activate Camera" button
                    activateBtn.style.display = 'none';
                })
                .catch(function (error) {
                    alert("Error accessing the camera: " + error);
                });

        } else {
            alert("getUserMedia not supported in this browser.");
        }
    }

    deactivateCamera() {
        // Access the DOM elements using this.targets
        const webcam = this.webcamTarget;
        const activateBtn = this.activateBtnTarget;
        const deactivateBtn = this.deactivateBtnTarget;
        const captureBtn = this.captureBtnTarget;

        // Stop the media stream and hide the webcam
        if (webcam.srcObject) {
            webcam.srcObject.getTracks().forEach((track) => track.stop());
        }
        webcam.style.display = 'none';
        // Show the "Activate Camera" button
        activateBtn.style.display = 'block';
        // Show the "Capture image" button and
        captureBtn.style.display = 'none';
        // hide the "Deactivate Camera" button
        deactivateBtn.style.display = 'none';
    }

    captureImage() {
        // Access the DOM elements using this.targets
        const canvas = this.canvasTarget;
        const photoContainer = this.photoContainerTarget;
        const deactivateBtn = this.deactivateBtnTarget;

        const context = canvas.getContext("2d");
        canvas.width = this.webcamTarget.videoWidth;
        canvas.height = this.webcamTarget.videoHeight;
        context.drawImage(this.webcamTarget, 0, 0, canvas.width, canvas.height);
        canvas.toBlob(function (blob) {
            const imageURL = URL.createObjectURL(blob);

            // Create a new image element
            var imgElement = $('<img>').attr('src', imageURL).attr('alt', 'Captured Photo');

            // Clear the content of the photoContainer and add the new image
            $(photoContainer).html(imgElement);

            // Alternatively, if you want to append the image, use the following:
            // photoContainer.empty(); // Clear the content before appending
            // photoContainer.append(imgElement);


            let fileName = 'image' + new Date().getTime() + '.jpg'; // You can replace with an appropriate file name
            // Create a File object from the blob
            let file = new File([blob], fileName, { type: "image/jpeg"});

            // Get the file input element
            let fileInput = $('#branch_imageFile_file')[0]; // Assuming ID is 'branch_imageFile_file'
            let container = new DataTransfer();
            container.items.add(file);
            fileInput.files = container.files;

            // Trigger a change event on the file input to simulate user selection
            $(fileInput).trigger('change');




            // Clean up the URL.createObjectURL to avoid memory leaks
            URL.revokeObjectURL(imageURL);

        });
    }
}
