<ul class="main-nav">
    <li class="active">
        <a href="{{route('pharmacy.dashboard',$pharmacy)}}">Dashboard</a>
    </li>
    
    <li class="has-submenu">
        <a href="#">Patient Electronic Record<i class="fas fa-chevron-down"></i></a>
       <ul class="submenu">
            <li><a href="{{route('pharmacy.assessments.create',$pharmacy)}}">New Assessment</a></li>
            <li><a href="{{route('pharmacy.assessments.index',$pharmacy)}}">All Assessments</a></li>
            <li><a href="{{route('pharmacy.patients.index',$pharmacy)}}">All Patient</a></li>
            <li><a href="{{route('pharmacy.assessments.index',$pharmacy)}}">Analytics</a></li> 
        </ul>
    </li>
    <li class="has-submenu">
        <a href="#">Prescription <i class="fas fa-chevron-down"></i></a>
        <ul class="submenu">
            <li><a href="{{route('pharmacy.prescriptions.create',$pharmacy)}}">New Prescription</a></li>
            <li><a href="{{route('pharmacy.prescriptions.index',$pharmacy)}}">All Prescriptions</a></li>
        </ul>
    </li>
    <li class="has-submenu">
        <a href="#">Inventory <i class="fas fa-chevron-down"></i></a>
        <ul class="submenu">
            <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Items</a> </li>
            <li><a href="{{route('pharmacy.inventory.purchases.list',$pharmacy)}}">Purchases</a></li>
            <li><a href="{{route('pharmacy.inventory.transfers.list',$pharmacy)}}">Transfers</a></li>
            <li><a href="{{route('pharmacy.inventory.settings',$pharmacy)}}">Settings</a></li>

            <li class="has-submenu">
                <a href="{{route('pharmacy.sales.index',$pharmacy)}}">Sales</a>
                <ul class="submenu">
                    <li><a href="{{route('pharmacy.sales.create',$pharmacy)}}">New Sale</a></li>
                    <li><a href="{{route('pharmacy.sales.index',$pharmacy)}}">All Sales</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="has-submenu">
        <a href="#">Analytics <i class="fas fa-chevron-down"></i></a>
        <ul class="submenu">
            <li><a href="{{route('pharmacy.inventory.start',$pharmacy)}}">Business</a></li>
            <li class="has-submenu">
                <a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Assessments</a>
                <ul class="submenu">
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Diagnosis</a></li>
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Diseases</a></li>
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}"></a>Treatments</li>
                </ul>
            </li>
            
            <li class="has-submenu">
                <a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Inventory</a>
                <ul class="submenu">
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Expiring</a></li>
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Expired</a></li>
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Volume Monitor</a></li>
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Products Monitor</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Sales</a>
                <ul class="submenu">
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Modality Plot</a></li>
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Periodic Monitor</a></li>
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Per Volume Monitor</a></li>
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Per Products Monitor</a></li>
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