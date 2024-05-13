<ul class="main-nav">
    <li class="active">
        <a href="{{route('pharmacy.dashboard',$pharmacy)}}">Dashboard</a>
    </li>
    
    <li class="has-submenu">
        <a href="#">PEMR<i class="fas fa-chevron-down"></i></a>
       <ul class="submenu">
            <li><a href="{{route('pharmacy.assessments.create',$pharmacy)}}">New Assessment</a></li>
            <li><a href="{{route('pharmacy.assessments.index',$pharmacy)}}">All Assessments</a></li>
            <li><a href="{{route('pharmacy.patients.index',$pharmacy)}}">All Patient</a></li>
            @if(in_array('Analytics',$pharmacy->activeLicense->type))
            <li class="has-submenu">
                <a href="#">Analytics</a>
                <ul class="submenu">
                    <li><a href="{{route('pharmacy.analytics.diagnosis_monitor',$pharmacy)}}">Diagnosis Monitor</a></li> 
                </ul>
            </li>
            @endif
        </ul>
    </li>
    <li class="has-submenu">
        <a href="#">Prescription <i class="fas fa-chevron-down"></i></a>
        <ul class="submenu">
            <li><a href="{{route('pharmacy.prescriptions.create',$pharmacy)}}">New Prescription</a></li>
            <li><a href="{{route('pharmacy.prescriptions.index',$pharmacy)}}">All Prescriptions</a></li>
            @if(in_array('Analytics',$pharmacy->activeLicense->type))
            <li class="has-submenu">
                <a href="#">Analytics</a>
                <ul class="submenu">
                    <li><a href="{{route('pharmacy.analytics.medications_monitor',$pharmacy)}}">Medication Outcome Monitor</a></li> 
                </ul>
            </li>
            @endif
        </ul>
    </li>
    <li class="has-submenu">
        <a href="#">Inventory <i class="fas fa-chevron-down"></i></a>
        <ul class="submenu">
            <li class="has-submenu">
                <a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Items</a> 
                <ul class="submenu">
                    <li><a href="{{route('pharmacy.inventory.create',$pharmacy)}}">New Inventory</a></li>
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">All Inventory</a></li>
                    <li><a href="{{route('pharmacy.inventory.expired',$pharmacy)}}">Expired Inventory</a></li>
                    <li><a href="{{route('pharmacy.inventory.expiring_soon',$pharmacy)}}">Expiring Inventory</a></li>
                </ul>
            </li>
            @if(in_array('Analytics',$pharmacy->activeLicense->type))
            <li class="has-submenu">
                <a href="#">Analytics</a>
                <ul class="submenu">
                    <li><a href="{{route('pharmacy.analytics.expired_products',$pharmacy)}}">Expired Monitor</a></li>
                    <li><a href="{{route('pharmacy.analytics.business_capitalization',$pharmacy)}}">Business Capitalization</a></li>
                </ul>
            </li>
            @endif
            <li><a href="{{route('pharmacy.purchases.list',$pharmacy)}}">Purchases</a></li>
            <li><a href="{{route('pharmacy.transfer.list',$pharmacy)}}">Transfers</a></li>
            <li><a href="{{route('pharmacy.inventory.settings',$pharmacy)}}">Settings</a></li>
        </ul>
    </li>
    <li class="has-submenu">
        <a href="{{route('pharmacy.sales.index',$pharmacy)}}">Sales <i class="fas fa-chevron-down"></i></a>
        <ul class="submenu">
            <li><a href="{{route('pharmacy.sales.create',$pharmacy)}}">New Sale</a></li>
            <li><a href="{{route('pharmacy.sales.index',$pharmacy)}}">All Sales</a></li>
            @if(in_array('Analytics',$pharmacy->activeLicense->type))
            <li class="has-submenu">
                <a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Analytics</a>
                <ul class="submenu">
                    <li><a href="{{route('pharmacy.analytics.sales_modality',$pharmacy)}}">Modality Plot</a></li>
                    <li><a href="{{route('pharmacy.analytics.periodic_sales_monitor',$pharmacy)}}">Periodic Monitor</a></li>
                    <li><a href="{{route('pharmacy.analytics.sales_volume_monitor',$pharmacy)}}">Per Volume Monitor</a></li>
                    <li><a href="{{route('pharmacy.analytics.earnings_per_product',$pharmacy)}}">Per Products Earnings</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </li>
    {{-- <li class="has-submenu">
        <a href="#">Analytics <i class="fas fa-chevron-down"></i></a>
        <ul class="submenu">
            
            <li class="has-submenu">
                <a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Assessments</a>
                <ul class="submenu">
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Diagnosis</a></li>
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Diseases</a></li>
                    <li><a href="{{route('pharmacy.inventory.index',$pharmacy)}}">Treatments</a></li>
                </ul>
            </li>
        </ul>
    </li> --}}
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