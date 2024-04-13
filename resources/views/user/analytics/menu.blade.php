<nav class="dashboard-menu">
    <ul class="assessment_menus">
        <li class="@if(Route::is('pharmacy.analytics.medications_monitor')) active @endif">
            <a href="{{route('pharmacy.analytics.medications_monitor',$pharmacy)}}">
                <i class="fas fa-user-injured"></i> <span>Medications Monitor</span>
            </a>
        </li>
        <li class="@if(Route::is('pharmacy.analytics.diagnosis_monitor')) active @endif">
            <a href="{{route('pharmacy.analytics.diagnosis_monitor',$pharmacy)}}">
                <i class="fas fa-user-injured"></i> <span>Diagnosis Monitor</span>
            </a>
        </li>
        <li class="@if(Route::is('pharmacy.analytics.sales_modality')) active @endif ">
            <a href="{{route('pharmacy.analytics.sales_modality',$pharmacy)}}" >
                <i class="fas fa-thermometer-half"></i>
                <span>Sales Modality</span>
            </a>
        </li>
        
        <li class="@if(Route::is('pharmacy.analytics.periodic_sales_monitor')) active @endif ">
            <a href="{{route('pharmacy.analytics.periodic_sales_monitor',$pharmacy)}}" >
                <i class="fas fa-book-medical"></i>
                <span>Periodic Sales Monitor</span>
            </a>
        </li>
        
        <li class="@if(Route::is('pharmacy.analytics.sales_volume_monitor')) active @endif "> 
            <a href="{{route('pharmacy.analytics.sales_volume_monitor',$pharmacy)}}" >
                <i class="fas fa-users"></i>
                <span>Sales Volume Monitor</span>
            </a>
        </li>
        
        <li class="@if(Route::is('pharmacy.analytics.earnings_per_product')) active @endif ">
            <a href="{{route('pharmacy.analytics.earnings_per_product',$pharmacy)}}" >
                <i class="fas fa-diagnoses"></i>
                <span>Earnings Per Product</span>
            </a>
        </li>
        <li class="@if(Route::is('pharmacy.analytics.business_capitalization')) active @endif ">
            <a href="{{route('pharmacy.analytics.business_capitalization',$pharmacy)}}" >
                <i class="fas fa-stethoscope"></i>
                <span>Business Capitalization</span>
            </a>
        </li>
        <li class="@if(Route::is('pharmacy.analytics.expiring_products')) active @endif ">
            <a href="{{route('pharmacy.analytics.expiring_products',$pharmacy)}}" >
                <i class="fas fa-microscope"></i>
                <span>Expiring Products</span>
            </a>
        </li>
        <li class="@if(Route::is('pharmacy.analytics.expired_products')) active @endif ">
            <a href="{{route('pharmacy.analytics.expired_products',$pharmacy)}}" >
                <i class="fas fa-plus-square"></i>
                <span>Expired Products</span>
            </a>
        </li>
        
    </ul>
</nav>