@extends('layouts.app')

@section('content')


<section class="">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-6 mb-2 fs-5 fw-bold">
          Student Reviews
      </div>
      <div class="col-6 text-end mb-2">
          <a href="#" class="btn btn-outline-primary py-0 px-1 fw-bold" data-bs-toggle="modal" data-bs-target="#Add">Add New</a>
      </div>
      <!-- Add -->
      <div class="modal fade" id="Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:99999;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Create Form</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="afterSubmitForm" action="{{url('studentreviews')}}" method="post" enctype="multipart/form-data"> @csrf
            <div class="modal-body">
              <div class="row">

                  <div class="col-12 mb-3">
                      <label for="name">Name <span class="text-danger fw-bold">*</span></label>
                      <input type="text" name="name" id="name" class="form-control my-2" required>
                  </div>
                  <div class="col-12 mb-3">
                      <label for="image">Image <span class="text-danger fw-bold">*</span></label>
                      <input type="file" name="image" id="image" class="form-control my-2" required>
                  </div>
                  <div class="col-12 mb-3">
                      <label for="review">Review <span class="text-danger fw-bold">*</span></label>
                      <input type="text" name="review" id="review" class="form-control my-2" required>
                  </div>
                  <div class="col-12 mb-3">
                      <label for="college">College <span class="text-danger fw-bold">*</span></label>
                      <input type="text" name="college" id="college" class="form-control my-2" required>
                  </div>
                  <div class="col-12 mb-3">
                      <label for="varsity">University <span class="text-danger fw-bold">*</span></label>
                      <input type="text" name="varsity" id="varsity" class="form-control my-2" required>
                  </div>
                  <div class="col-12 mb-3">
                      <label for="subject">Subject <span class="text-danger fw-bold">*</span></label>
                      <input type="text" name="subject" id="subject" class="form-control my-2" required>
                  </div>
                  
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="afterSubmitBtn1 btn btn-success px-5">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-responsive table-striped table-hover">
            <thead class="table-info">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Review</th>
                <th scope="col">College</th>
                <th scope="col">University</th>
                <th scope="col">Subject</th>
                <th scope="col">Action</th> 
              </tr>
            </thead>
            <tbody>
              @foreach($studentreviews as $data)
              <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td class="nowrap">{{$data->name}}</td>
                <td class="nowrap"><img style="height:60px;width:auto;" src="{{asset('images/studentreviews/'.$data->image)}}" alt="{{$data->title}}"></td>
                <td class="nowrap">{{$data->review}}</td>
                <td class="nowrap">{{$data->college}}</td>
                <td class="nowrap">{{$data->varsity}}</td>
                <td class="nowrap">{{$data->subject}}</td>
                <td class="nowrap">
                   <a href="#" class="btn btn-outline-success py-0 px-1 fw-bold" data-bs-toggle="modal" data-bs-target="#Edit{{$data->id}}">Edit</a> 
                  <a href="#" class="btn btn-outline-danger py-0 px-1 fw-bold" data-bs-toggle="modal" data-bs-target="#Delete{{$data->id}}">Delete</a>
                </td>
              </tr>

              <!-- Edit{{$data->id}} -->
              <div class="modal fade" id="Edit{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:99999;">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Update Form</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="afterSubmitForm2" action="{{url('studentreviews/'.$data->id)}}" method="post" enctype="multipart/form-data"> @csrf @method('put')
                    <div class="modal-body">
                      <div class="row">
        
                          <div class="col-12 mb-3">
                              <label for="name">Name <span class="text-danger fw-bold">*</span></label>
                              <input type="text" name="name" value="{{$data->name}}" id="name" class="form-control my-2" required>
                          </div>
                          <div class="col-12 mb-3">
                              <label for="image">Image <span class="text-danger fw-bold">*</span></label>
                              <img style="height:100px;width:auto;" src="{{asset('images/studentreviews/'.$data->image)}}" alt="{{$data->name}}">
                              <input type="file" name="image" id="image" class="form-control my-2">
                          </div>
                          <div class="col-12 mb-3">
                              <label for="review">Review <span class="text-danger fw-bold">*</span></label>
                              <input type="text" name="review" value="{{$data->review}}" id="review" class="form-control my-2" required>
                          </div>
                          <div class="col-12 mb-3">
                              <label for="college">College <span class="text-danger fw-bold">*</span></label>
                              <input type="text" name="college" value="{{$data->college}}" id="college" class="form-control my-2" required>
                          </div>
                          <div class="col-12 mb-3">
                              <label for="varsity">University <span class="text-danger fw-bold">*</span></label>
                              <input type="text" name="varsity" value="{{$data->varsity}}" id="varsity" class="form-control my-2" required>
                          </div>
                          <div class="col-12 mb-3">
                              <label for="subject">Subject <span class="text-danger fw-bold">*</span></label>
                              <input type="text" name="subject" value="{{$data->subject}}" id="subject" class="form-control my-2" required>
                          </div>

                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="afterSubmitBtn2 btn btn-success">Save Changes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Delete{{$data->id}} -->
              <div class="modal fade" id="Delete{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:99999;">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="afterSubmitForm3" action="{{url('studentreviews/'.$data->id)}}" method="post" enctype="multipart/form-data"> @csrf @method('delete')
                    <div class="modal-body text-center text-danger fs-3">
                      Are you sure ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="afterSubmitBtn3 btn btn-danger">Yes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection