@extends('layout.config')
@extends('layout.custom_navbar')
<section class="vh-100" style="background-color: #9de2ff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-md-9 col-lg-7 col-xl-5">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-4">
              <div class="d-flex text-black">
                {{-- <div class="flex-shrink-0">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                    alt="Generic placeholder image" class="img-fluid"
                    style="width: 490px; border-radius: 10px;">
                </div> --}}
                <div class="flex-grow-1 ms-3">
                  <h5 class="mb-1 text-center">{{$profile->name}} Details</h5>
                  {{-- <p class="mb-2 pb-1" style="color: #2b2a2a;">{{$profile->role}}</p> --}}
                  <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                    style="background-color: #efefef;">
                    <div>
                      <p class="small text-muted mb-1">Name</p>
                      <p class="mb-0">{{$profile->name}}</p>
                    </div>
                    <div class="px-3">
                      <p class="small text-muted mb-1">Email</p>
                      <p class="mb-0">{{$profile->email}}</p>
                    </div>
                    <div>
                      <p class="small text-muted mb-1">Role</p>
                      <p class="mb-0">{{$profile->role}}</p>
                    </div>
                  </div>
                  <div class="d-flex pt-1">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>{{-- <button type="button" class="btn btn-primary flex-grow-1">Edit</button> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>