import { Controller } from '@hotwired/stimulus';
import { Html5Qrcode } from 'html5-qrcode';


/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ['reader', 'result']

    startScanner() {
        Html5Qrcode.getCameras().then(devices => {
            if (devices && devices.length) {
                //todo : do a check on camera code for multiple device. for now it's working on a laptop
                const cameraId = devices.length === 1 ? devices[0].id : null;

                if (devices.length > 1) {
                    const cameraOptions = devices.map(device => ({
                        value: device.id,
                        label: device.label || `Camera ${device.id}`
                    }));

                    const selectedCameraId = prompt("Select a camera:", cameraOptions[0].value);
                    this.cameraId = selectedCameraId || cameraOptions[0].value;
                } else {
                    this.cameraId = cameraId;
                }

                if (this.cameraId) {
                    //pass the readerTarget 'id' as argument
                    this.html5QrCode = new Html5Qrcode(this.readerTarget.id);
                    this.html5QrCode.start(
                        this.cameraId,
                        {
                            fps: 10,
                            qrbox: 300
                        },
                        (decodedText, decodedResult) => {
                            this.resultTarget.textContent = decodedText;
                        },
                        (errorMessage) => {
                            // parse error, ignore it.
                        })
                        .catch((err) => {
                            alert("Can't start due to some unknown reasons. Contact DEV");
                        });
                } else {
                    alert("No camera selected.");
                }
            }
        }).catch(err => {
            console.log("No cameras installed");
        });
    }

    stopScanner() {
        if (this.html5QrCode) {
            this.html5QrCode.stop().then(() => {
                console.log('Scanner stopped');
            }).catch((err) => {
                console.error('Error stopping scanner', err);
            });
        }
    }
}