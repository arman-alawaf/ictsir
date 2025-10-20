@extends('layouts.app')

@section('content')


<section class="">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12">

        <form class="afterSubmitForm2 form-control p-4" action="{{url('apps/'.$app->id)}}" method="post" enctype="multipart/form-data"> @csrf @method('put')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="logo">Logo <span class="text-danger fw-bold"></span></label>
                    <img style="height:100px;width:auto;" src="{{asset('images/apps/'.$app->logo)}}" alt="{{$app->title}}">
                    <input type="file" name="logo" id="logo" class="form-control my-2">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="favicon">Favicon <span class="text-danger fw-bold"></span></label>
                    <img style="height:100px;width:auto;" src="{{asset('images/apps/'.$app->favicon)}}" alt="{{$app->title}}">
                    <input type="file" name="favicon" id="favicon" class="form-control my-2">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="title">title <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="title" value="{{$app->title}}" id="title" class="form-control my-2" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone">phone <span class="text-danger fw-bold"></span></label>
                    <input type="text" name="phone" value="{{$app->phone}}" id="phone" class="form-control my-2" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email">email <span class="text-danger fw-bold"></span></label>
                    <input type="text" name="email" value="{{$app->email}}" id="email" class="form-control my-2" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="whatsapp">whatsapp <span class="text-danger fw-bold"></span></label>
                    <input type="text" name="whatsapp" value="{{$app->whatsapp}}" id="whatsapp" class="form-control my-2" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="facebook">facebook <span class="text-danger fw-bold"></span></label>
                    <input type="text" name="facebook" value="{{$app->facebook}}" id="facebook" class="form-control my-2" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="facebook_page">facebook_page <span class="text-danger fw-bold"></span></label>
                    <input type="text" name="facebook_page" value="{{$app->facebook_page}}" id="facebook_page" class="form-control my-2" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="youtube">youtube <span class="text-danger fw-bold"></span></label>
                    <input type="text" name="youtube" value="{{$app->youtube}}" id="youtube" class="form-control my-2" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="linkedin">linkedin <span class="text-danger fw-bold"></span></label>
                    <input type="text" name="linkedin" value="{{$app->linkedin}}" id="linkedin" class="form-control my-2" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="instagram">instagram <span class="text-danger fw-bold"></span></label>
                    <input type="text" name="instagram" value="{{$app->instagram}}" id="instagram" class="form-control my-2" >
                </div>
                <div class="col-md-12">
                    <button type="submit" class="afterSubmitBtn2 btn btn-success">Save Changes</button>
                </div>

            </div>

        </form>

      </div>
    </div>
  </div>
</section>

@endsection