<nav class="dashboard-menu">
    <ul class="assessment_menus">
        {{-- <li class="patient">
            <a href="{{route('pharmacy.assessments.vitals',[$pharmacy,$assessment])}}">
                <i class="fas fa-user-injured"></i> <span>Patient</span>
            </a>
        </li> --}}
        <li class="active vitals">
            <a href="{{route('pharmacy.assessments.vitals',[$pharmacy,$assessment])}}" >
                <i class="fas fa-thermometer-half"></i>
                <span>Vitals</span>
            </a>
        </li>
        
        <li class="past_medical_history">
            <a href="{{route('pharmacy.assessments.medical_medication',[$pharmacy,$assessment])}}" >
                <i class="fas fa-book-medical"></i>
                <span>Medical & Medication History</span>
            </a>
        </li>
        
        <li class="family_social_history"> 
            <a href="{{route('pharmacy.assessments.family_history',[$pharmacy,$assessment])}}" >
                <i class="fas fa-users"></i>
                <span>Family & Social History</span>
            </a>
        </li>
        
        <li class="review">
            <a href="{{route('pharmacy.assessments.vitals',[$pharmacy,$assessment])}}" >
                <i class="fas fa-diagnoses"></i>
                <span>System Review</span>
            </a>
        </li>
        <li class="provisional_diagnosis">
            <a href="{{route('pharmacy.assessments.vitals',[$pharmacy,$assessment])}}" >
                <i class="fas fa-stethoscope"></i>
                <span>Provisional Diagnosis</span>
            </a>
        </li>
        <li class="laboratory">
            <a href="{{route('pharmacy.assessments.vitals',[$pharmacy,$assessment])}}" >
                <i class="fas fa-microscope"></i>
                <span>Laboratory</span>
            </a>
        </li>
        <li class="final_diagnosis">
            <a href="{{route('pharmacy.assessments.vitals',[$pharmacy,$assessment])}}" >
                <i class="fas fa-plus-square"></i>
                <span>Final Diagnosis</span>
            </a>
        </li>
        
    </ul>
</nav>