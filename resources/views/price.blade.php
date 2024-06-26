@extends('layouts.main.app')
@push('styles')
<link rel="stylesheet" href="{{asset('plugins/fancybox/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<style>
    
    .title {
    height: 150px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-size: contain;
    }
    .title .hide {
    display: none;
    }
    .title h1 {
    margin: 0.3em;
    }
    .title h3 {
    font-size: 1.1em;
    color: #858fad;
    font-weight: 600;
    margin: 0;
    }

    .container {
    background-color: white;
    border-radius: 8px;
    margin: 50px 0 50px;
    box-shadow: 0px 0px 20px 0px rgba(133, 143, 173, 0.1);
    position: relative;
    }
    .container .upper {
    padding: 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 1em;
    color: #858fad;
    font-weight: 800;
    }
    .container .upper .left {
    text-transform: uppercase;
    letter-spacing: 1.5px;
    }
    .container .upper .right {
    align-items: center;
    display: flex;
    }
    .container .upper .right .price {
    color: #293356;
    font-size: 2.7em;
    margin-right: 5px;
    }
    .container .toggle-container {
    text-align: center;
    color: #858fad;
    font-size: 0.95em;
    padding: 40px;
    }
    .container .toggle-container .show {
    display: none;
    }
    .container .toggle-container .switch {
    position: relative;
    display: inline-block;
    width: 38px;
    height: 20px;
    margin: 0 15px;
    }
    .container .toggle-container .switch .slide {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #cdd7ee;
    transition: 0.2s;
    }
    .container .toggle-container .switch .slide:hover {
    background-color: #a5f3eb;
    }
    .container .toggle-container .switch .slide:before {
    position: absolute;
    content: "";
    height: 14px;
    width: 14px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    -webkit-transition: 0.4s;
    transition: 0.4s;
    }
    .container .toggle-container .switch .slide.round {
    border-radius: 34px;
    }
    .container .toggle-container .switch .slide.round:before {
    border-radius: 50%;
    }
    .container .toggle-container .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }
    .container .toggle-container .switch input:checked + .slide {
    background-color: #10d5c2;
    }
    .container .toggle-container .switch input:focus + .slide {
    box-shadow: 0 0 1px #10d5c2;
    }
    .container .toggle-container .switch input:checked + .slide:before {
    transform: translateX(18px);
    }
    .container .toggle-container .discount {
    background-color: #feece7;
    color: #ff8c66;
    font-size: 0.85em;
    padding: 1px 8px;
    border-radius: 15px;
    margin-left: 6px;
    }
    .container .bottom {
    padding: 20px 40px 20px 20px;
    border-top: 2px solid rgba(133, 143, 173, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    }
    .container .bottom ul li {
    color: #858fad;
    margin: 10px 0;
    list-style-image: url(https://raw.githubusercontent.com/milenig/fend-mentor_pricing-component/3ccfd6b18e87377a950915288ef64c896969bf62/images/icon-check.svg);
    }
    .container .bottom ul li span {
    margin-left: 10px;
    }
    .container .bottom button {
    padding: 0;
    border: none;
    outline: none;
    font: inherit;
    color: inherit;
    background: none;
    background-color: #293356;
    color: #bdccff;
    padding: 15px 50px;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.2s;
    }
    .container .bottom button:hover {
    color: white;
    }

    .slider {
    width: 100%;
    padding: 0 40px;
    }
    .slider input {
    background: linear-gradient(to right, #10d5c2 0%, #10d5c2 50%, #eaeefb 50%, #eaeefb 100%);
    border-radius: 8px;
    height: 8px;
    width: 100%;
    border-radius: 4px;
    outline: none;
    transition: all 450ms ease-in;
    -webkit-appearance: none;
    }
    .slider input::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: url(https://raw.githubusercontent.com/milenig/fend-mentor_pricing-component/3ccfd6b18e87377a950915288ef64c896969bf62/images/icon-slider.svg) #10d5c2 center no-repeat;
    box-shadow: 0px 10px 20px 0px rgba(16, 213, 194, 0.7);
    cursor: pointer;
    position: relative;
    transition: all 0.2s;
    }
    .slider input::-webkit-slider-thumb:hover {
    background: url(https://raw.githubusercontent.com/milenig/fend-mentor_pricing-component/3ccfd6b18e87377a950915288ef64c896969bf62/images/icon-slider.svg) #1be6d1 center no-repeat;
    }
    .slider input::-webkit-slider-thumb:active {
    cursor: grabbing;
    background: url(https://raw.githubusercontent.com/milenig/fend-mentor_pricing-component/3ccfd6b18e87377a950915288ef64c896969bf62/images/icon-slider.svg) #0dbead center no-repeat;
    }

    @media only screen and (max-width: 610px) {
    .title {
        text-align: center;
    }
    .title .hide {
        display: block;
    }

    .container .upper {
        flex-direction: column;
    }

    .container .slider {
        width: 100%;
    }

    .discount .hide {
        display: none;
    }

    .bottom {
        flex-direction: column;
    }
    .bottom ul {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0;
    }
    .bottom button {
        width: 200px;
    }
    }
    @media only screen and (max-width: 400px) {
    .container .toggle-container {
        text-align: center;
    }
    .container .toggle-container .show {
        display: block;
    }
    }
</style>
@endpush
@section('main')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Pricing</h2>
            </div>
           
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            
            
            <div class="col-md-6">

                <div class="title" style="background: url({{asset('assets/img/pattern-circles.svg')}}) center no-repeat;">
                    <h1>Subscription </h1>
                    <h3>Sign-up for our 30-day trial. No credit card required.</h3>
                  </div>
                  
                  <div class="container">
                    <div class="upper">
                      <div class="left">
                        <span id="pageviews"></span> Months
                      </div>
                      <div class="right">
                        <span class="price">$<span id="price">16.00</span></span> / <span id="period">month</span>
                      </div>
                    </div>
                  
                    <div class="slider">
                      <input type="range" min="1" max="5" value="3" id="slider">
                    </div>
                  
                    <div class="toggle-container">
                      Without Analysis 
                      <label class="switch">
                        <input type="checkbox" id="toggle" onclick="discount()">
                        <span class="slide round"></span>
                      </label>
                      <br class="show">
                  
                      With Analysis
                      <a href="#" target="_blank" class="discount"> <span class="hide">view more</span></a>
                    </div>
                  
                    <div class="bottom">
                      <ul>
                        <li><span>Unlimited websites</span></li>
                        <li><span>100% data ownership</span></li>
                        <li><span>Email reports</span></li>
                      </ul>
                  
                      <button>Start my trial</button>
                    </div>
                  
                  </div>
                
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection
@push('scripts')
<script>
    let slider = document.getElementById("slider");
let price = document.getElementById("price");
let pageviews = document.getElementById("pageviews");

let toggle = document.getElementById("toggle");
// let text = document.getElementById("period");

const DISCOUNT = 0.25;

var prices = [8, 12, 16, 24, 36];

pageviews.innerHTML = "100K";

function discount() {
//   text.innerHTML = "";

  if (toggle.checked) {
    // text.innerHTML = "year";
    for (let i = 0; i < prices.length; i++) {
      prices[i] = prices[i] - prices[i] * DISCOUNT;
    }
    listener();
  } else {
    // text.innerHTML = "month";
    prices = [8, 12, 16, 24, 36];
    listener();
  }
}

var listener = function () {
  window.requestAnimationFrame(function () {
    switch (slider.value) {
      case "1":
        price.innerHTML = Number(prices[0]).toFixed(2);
        pageviews.innerHTML = "10K";
        break;
      case "2":
        price.innerHTML = Number(prices[1]).toFixed(2);
        pageviews.innerHTML = "50K";
        break;
      case "3":
        price.innerHTML = Number(prices[2]).toFixed(2);
        pageviews.innerHTML = "100K";
        break;
      case "4":
        price.innerHTML = Number(prices[3]).toFixed(2);
        pageviews.innerHTML = "500K";
        break;
      case "5":
        price.innerHTML = Number(prices[4]).toFixed(2);
        pageviews.innerHTML = "1M";
    }
  });
};

slider.addEventListener("mousedown", function () {
  listener();
  slider.addEventListener("mousemove", listener);
});

slider.addEventListener("mouseup", function () {
  slider.removeEventListener("mousemove", listener);
});

slider.addEventListener("keydown", listener);

slider.oninput = function () {
  var value = ((this.value - this.min) / (this.max - this.min)) * 100;
  this.style.background =
    "linear-gradient(to right, #10d5c2 0%, #10d5c2 " +
    value +
    "%, #eaeefb " +
    value +
    "%, #eaeefb 100%)";
};
</script>
    
@endpush