<nav class="dashboard-menu">
    <ul class="assessment_menus">
        {{-- <li class="patient">
            <a href="{{route('pharmacy.assessments.vitals',[$pharmacy,$assessment])}}">
                <i class="fas fa-user-injured"></i> <span>Patient</span>
            </a>
        </li> --}}
        <li class="@if(Route::is('pharmacy.assessments.vitals')) active @endif vitals">
            <a href="{{route('pharmacy.assessments.vitals',[$pharmacy,$assessment])}}" >
                <i class="fas fa-thermometer-half"></i>
                <span>Vitals</span>
            </a>
        </li>
        
        <li class="@if(Route::is('pharmacy.assessments.medical_medication')) active @endif past_medical_history">
            <a href="{{route('pharmacy.assessments.medical_medication',[$pharmacy,$assessment])}}" >
                <i class="fas fa-book-medical"></i>
                <span>Medical & Medication History</span>
            </a>
        </li>
        
        <li class="@if(Route::is('pharmacy.assessments.family_history')) active @endif family_social_history"> 
            <a href="{{route('pharmacy.assessments.family_history',[$pharmacy,$assessment])}}" >
                <i class="fas fa-users"></i>
                <span>Family & Social History</span>
            </a>
        </li>
        
        <li class="@if(Route::is('pharmacy.assessments.system_review')) active @endif review">
            <a href="{{route('pharmacy.assessments.system_review',[$pharmacy,$assessment])}}" >
                <i class="fas fa-diagnoses"></i>
                <span>System Review</span>
            </a>
        </li>
        <li class="@if(Route::is('pharmacy.assessments.provisional_diagnosis')) active @endif provisional_diagnosis">
            <a href="{{route('pharmacy.assessments.provisional_diagnosis',[$pharmacy,$assessment])}}" >
                <i class="fas fa-stethoscope"></i>
                <span>Provisional Diagnosis</span>
            </a>
        </li>
        <li class="@if(Route::is('pharmacy.assessments.laboratory_test')) active @endif laboratory">
            <a href="{{route('pharmacy.assessments.laboratory_test',[$pharmacy,$assessment])}}" >
                <i class="fas fa-microscope"></i>
                <span>Laboratory</span>
            </a>
        </li>
        <li class="@if(Route::is('pharmacy.assessments.final_diagnosis')) active @endif final_diagnosis">
            <a href="{{route('pharmacy.assessments.final_diagnosis',[$pharmacy,$assessment])}}" >
                <i class="fas fa-plus-square"></i>
                <span>Final Diagnosis</span>
            </a>
        </li>
        
    </ul>
</nav>