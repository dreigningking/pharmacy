<ul class="main-nav">
    <li class="active">
        <a href="{{route('dashboard')}}">Home</a>

    </li>
    <li class="has-submenu">
        <a href="#">Pharmacies <i class="fas fa-chevron-down"></i></a>
        <ul class="submenu">
            @foreach (auth()->user()->pharmacies as $pharmacy)
            <li><a href="{{route('pharmacy.dashboard',$pharmacy)}}">{{$pharmacy->name}}</a></li>
            @endforeach
        </ul>
    </li>
    <li>
        <a href="{{route('subscription')}}">Subscription</a>
    </li>
    <li>
        <a href="{{route('pricing')}}">Plans</a>
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