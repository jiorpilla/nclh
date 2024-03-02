import { Controller } from '@hotwired/stimulus';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ['glucose','glucoseField','bun','bunField','result']

    alertGlucose(){
        var glucose = this.glucoseFieldTarget.value;
        let word = (glucose >= 85.5 && glucose <= 110) ? "Normal" : "Abnormal";
        this.resultTarget.append('Glucose : ' + word + '\r\n');
    }
    alertBun(){
        var bun = this.bunFieldTarget.value;
        let word = (bun >= 5.97 && bun <= 15.9) ? "Normal" : "Abnormal";
        this.resultTarget.append('BUN : ' + word + '\r\n');
    }

    // Glucose     85.5 – 110 mg/dL
    // BUN    5.97 – 15.9 mg/dL
    // Creatinine    0.63 – 1.19 mg/dL
    // Total Bilirubin    0.23 – 1.02 mg/dL
    // SGOT (AST)    0 – 57 U/L
    // SGPT (ALT)    0 – 55 U/L
    // Total Cholesterol    <200mg/dL
    // Triglycerides    <200mg/dL

}