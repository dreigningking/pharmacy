<ul class="main-nav">
    <li class="active">
        <a href="{{route('pharmacy.dashboard',$pharmacy)}}">Dashboard</a>
    </li>
    <li class="has-submenu">
        <a href="#">Patients <i class="fas fa-chevron-down"></i></a>
        <ul class="submenu">
            <li><a href="{{route('pharmacy.patients.index',$pharmacy)}}">All Patient</a></li>
            <li><a href="{{route('pharmacy.patients.create',$pharmacy)}}">New Patient</a></li>
            
            {{-- <li><a href="booking.html">Transfer Patient</a></li> --}}
        </ul>
    </li>
    <li class="has-submenu">
        <a href="#">Health Care <i class="fas fa-chevron-down"></i></a>
        <ul class="submenu">
            <li class="has-submenu">
                <a href="#">Assessments</a>
                <ul class="submenu">
                    <li><a href="{{route('pharmacy.assessments.index',$pharmacy)}}">All Assessments</a></li>
                    <li><a href="{{route('pharmacy.assessments.create',$pharmacy)}}">New Assessment</a></li>
                    <li><a href="{{route('pharmacy.assessments.create',$pharmacy)}}">Appointments</a></li>
                    
                </ul>
            </li>
            <li class="has-submenu">
                <a href="invoices.html">Prescriptions</a>
                <ul class="submenu">
                    <li><a href="invoices.html">New Prescription</a></li>
                    <li><a href="invoice-view.html">All Prescriptions</a></li>
                </ul>
            </li>
            <li><a href="search.html">Errors</a></li>
            <li><a href="doctor-profile.html">Messages</a></li>
        </ul>
    </li>
    <li class="has-submenu">
        <a href="#">Inventory <i class="fas fa-chevron-down"></i></a>
        <ul class="submenu">
            <li><a href="doctor-profile.html">Upload Items</a></li>
            <li class="has-submenu">
                <a href="invoices.html">Items</a>
                <ul class="submenu">
                    <li><a href="invoices.html">Drugs</a></li>
                    <li><a href="invoice-view.html">Non-Drugs</a></li>
                </ul>
            </li>
            <li><a href="search.html">Shelves</a></li>
            <li><a href="search.html">Transfer Items</a></li>
            <li><a href="search.html">Suppliers</a></li>
            <li class="has-submenu">
                <a href="doctor-profile.html">Sales</a>
                <ul class="submenu">
                    <li><a href="invoices.html">New Sale</a></li>
                    <li><a href="invoice-view.html">All Sales</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">Help </a>
        
    </li>
    <li>
        <a href="#abc">Contact</a>
    </li>
    <li class="login-link">
        <a href="{{route('login')}}">Login / Signup</a>
    </li>
</ul>