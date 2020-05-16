@extends('index')
@section('title', __('institution.title') )
@push('style')
<link rel="stylesheet" href="{{ URL::asset('admin/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/vendors/dropify/dropify.min.css') }}">
@endpush
@section('content')
<div class="page-header">
  <h3 class="page-title"> {{ __('institution.heading') }}</h3>
  
  <div class="template-demo">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home"></i>` <a href="#">{{ __('institution.home') }}</a></li>
        <li class="breadcrumb-item"><a href="#">{{ __('institution.heading') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('institution.add_institution') }}</li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ __('institution.add_institution') }} </h4>
        <hr>
        <form class="forms-sample" id="inspiration_form" action="{{ route('institution.store') }}" method='post'>
          @csrf
          <!--<p class="card-description">{{ __('institution.add_institution') }}  </p>-->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputName1">{{ __('institution.institution_name') }}*</label>
                <input type="text" name='institution_name' class="form-control" id="institution_name" placeholder="{{ __('institution.institution_name') }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputName1">{{ __('institution.institution_email') }}*</label>
                <input type="text" name='email' class="form-control" id="email" placeholder="{{ __('institution.institution_email') }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputName1">{{ __('institution.institution_direct_number') }}*</label>
                <input type="number" name='direct_number' class="form-control" id="direct_number" placeholder="{{ __('institution.institution_name') }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputName1">{{ __('institution.institution_alternative_number') }}</label>
                <input type="number" name='alternative_number' class="form-control" id="alternative_number" placeholder="{{ __('institution.institution_email') }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputName1">{{ __('institution.contact_person') }}*</label>
                <input type="text" name='contact_person' class="form-control" id="contact_person" placeholder="{{ __('institution.institution_name') }}">
              </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                  <label for="exampleInputName1">{{ __('institution.institution_code') }}*</label>
                  <input type="text" name='instution_code' class="form-control" id="instution_code" placeholder="{{ __('institution.institution_code') }}">
                  <label for="exampleInputName1">{{ __('institution.institution_code_text') }}</label>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
             <div class="form-group" >
              <label>{{ __('institution.country_name') }}*</label>
              <select class="js-example-basic-single" name='country_id' id='country_id' style="width:100%">
                <option value="">{{ __('institution.no_country') }}</option>
                @foreach(country_list() AS $country)
                <option value="{{ $country->country_id }}">{{ $country->country }}</option>
                @endforeach
              </select>
              <span id='country_name_error'>  </span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>{{ __('institution.currency_type') }}*</label>
              <select class="js-example-basic-single" name='currency_type' id='currency_type' style="width:100%">
                <option value="AL">Alabama</option>
                <option value="WY">Wyoming</option>
                <option value="AM">America</option>
                <option value="CA">Canada</option>
                <option value="RU">Russia</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>{{ __('institution.city') }}*</label>
              <select class="js-example-basic-single" name='city_id' id='city_id' style="width:100%" >
                <option value="">{{ __('institution.no_city') }}</option>
              </select>
              <span id='city_name_error'>  </span>
            </div>
          </div>
          <div class="col-md-6">
           <div class="form-group">
              <label>{{ __('institution.timezone') }}*</label>
              <select class="js-example-basic-single" name='timezone_id' id='timezone_id' style="width:100%">
                <option value="AL">Alabama</option>
                <option value="WY">Wyoming</option>
                <option value="AM">America</option>
                <option value="CA">Canada</option>
                <option value="RU">Russia</option>
              </select>
              <span id='timezone_error'>  </span>
            </div>
          </div>
            </div>
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="cas">
                    <label for="exampleTextarea1">{{ __('institution.institution_img') }}*</label>
                    <input type="file" class="dropify" name='institution_img'  id='institution_img' /><!-- data-default-file="../../images/samples/1280x768/2.jpg" -->
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleTextarea1">{{ __('institution.institution_add') }}*</label>
                  <textarea class="form-control" id="institution_address" name='institution_address' rows="4" spellcheck="false"></textarea>
  
                </div>
                <input type="submit" class="btn btn-gradient-primary mr-2" name='submit' id='submit' value="{{ __('institution.submit') }}">
                <button class="btn btn-light">{{ __('institution.cancel') }}</button>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @push('scripts')
  <script src="{{ URL::asset('admin/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ URL::asset('admin/vendors/select2/select2.min.js') }}"></script>
  <script src="{{ URL::asset('admin/vendors/select2/select2.js') }}"></script>
  <script src="{{ URL::asset('admin/vendors/dropify/dropify.min.js') }}"></script>
  <script src="{{ URL::asset('admin/js/dropify.js') }}"></script>
  <script src="{{ URL::asset('admin/language/institution_form_lang.js') }}"></script>
  <script src="{{ URL::asset('admin/js/institution_form.js') }}"></script>
  @endpush