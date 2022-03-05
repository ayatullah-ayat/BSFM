@extends('backend.layouts.master')

@section('title', 'Manage Gateway')

@section('content')
<div class="container card p-4">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <h4 class="text-dark f-2x">Payment Gateway Option</h4>
            </div>
            {{-- <div id="exTab1" class="container">
                <ul class="nav">
                    <li class="active mr-1 p-2 bg-dark">
                        <a class="text-white text-decoration-none" href="#1a" data-toggle="tab">Wise</a>
                    </li>
                    <li class="mr-1 p-2 bg-dark">
                        <a class="text-white text-decoration-none" href="#2a" data-toggle="tab">Payneer</a>
                    </li>
                    <li class="mr-1 p-2 bg-dark">
                        <a class="text-white text-decoration-none" href="#3a" data-toggle="tab">Paypal</a>
                    </li>
                    <li class="mr-1 p-2  bg-dark">
                        <a class="text-white text-decoration-none" href="#4a" data-toggle="tab">sslCommerce</a>
                    </li>
                </ul>
        
                <div class="tab-content clearfix">
                    <div class="tab-pane active" id="1a">
                        <h3>
                            this is wise payment option 
                        </h3>
                    </div>
                    <div class="tab-pane" id="2a">
                        <h3>
                            this is payneer option 
                        </h3>
                    </div>
                    <div class="tab-pane" id="3a">
                        <h3>
                            this is paypal option
                        </h3>
                    </div>
                    <div class="tab-pane" id="4a">
                        <h3>
                            this is sllcommerce option
                        </h3>
                    </div>
                </div>
            </div> --}}
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Payneer</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Paypal</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">SllCommerce</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    this is payneer section 
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    this paypal section 
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    this is sllecommerce section 
                </div>
              </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="{{ asset('assets/backend/css/settings/managegateway.css')}}" rel="stylesheet">
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
@endpush
