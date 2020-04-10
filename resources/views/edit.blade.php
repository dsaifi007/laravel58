@extends('index')
@section('title', 'Edit Student')
@section('content')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add New User</h4>
      <p class="card-description">  </p>
      @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
      </div>
      @endif
      @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif
      <form action='' class="forms-sample" id='add-user' autocomplete="off" method='post'>
       @csrf
       <div class="form-group">

        <label for="course_id">Select Course</label>
        <select class="form-control" id="course_id" name="course_id" >
          <option value="1">Course1</option>
          <option>Course2</option>
        </select>
      </div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name='name' class="form-control" id="name" placeholder="Name">
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name='email'  class="form-control" id="email" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="number" name='phone' class="form-control" id="phone" placeholder="Phone">
      </div>
      <div class="form-group">
        <label for="exampleInputCity1">City</label>
        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <textarea class="form-control" id="address" name="address"  rows="4"></textarea>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Is Enquiry</label>
        <div class="col-sm-2">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="is_enquiry" id="yes" value="1" > Yes <i class="input-helper"></i></label>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" checked name="is_enquiry" id="no" value="0"> No <i class="input-helper" ></i></label>
              </div>
            </div>
            <div class="col-sm-8"></div>
          </div>
          <div class="form-group payment">
            <label for="phone">Down Payment</label>
            <input type="number" name='payment' class="form-control" id="payment" placeholder="Payment">
          </div>
          <div class="form-group payment">
            <label for="phone">Next Payment Date</label>
            <input type="date" name='next_payment_date' class="form-control" id="next_payment_date" min="<?= date('Y-m-d'); ?>"   placeholder="dd-mm-yyyy">
          </div>

          <input type="submit" class="btn btn-gradient-primary mr-2"  value="submit"  >
        </form>
      </div>
    </div>
  </div>
  @endsection