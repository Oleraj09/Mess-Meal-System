@extends('custom.master')
@section('title', 'Engineer Gang :: Customize your Profile Info!!')
@section('page')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-4 align-items-strech">
                <!-- Yearly Breakup -->
                <div class="row">
                    <div class="col-12">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <img src="{{ (!empty($data->photo)) ? url('upload/user/'.$data->photo) : url('upload/no_image.jpg')}}" class="rounded-circle"
                                        style="height: 100px; width: 100px;" alt="">
                                </div>
                                <hr>
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="align-items-center mb-3">
                                            <h5 class="text-center fw-semibold mt-1 me-2">{{$data->name}}</h5>
                                            <p class="text-center">My Life my rule, No one can change what i want in my
                                                dream!!</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="text-center align-items-center mb-3">
                                            <div class="btn btn-outline-indigo rounded-circle mx-1 py-2 px-3"><i
                                                    class="ti ti-brand-facebook"></i></div>
                                            <div class="btn btn-outline-indigo rounded-circle mx-1 py-2 px-3"><i
                                                    class="ti ti-brand-facebook"></i></div>
                                            <div class="btn btn-outline-indigo rounded-circle mx-1 py-2 px-3"><i
                                                    class="ti ti-brand-facebook"></i></div>
                                            <div class="btn btn-outline-indigo rounded-circle mx-1 py-2 px-3"><i
                                                    class="ti ti-brand-facebook"></i></div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Monthly Earnings -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold mb-4">Update Information</h5>
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('profileconf')}}" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{$data->username}}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="exampleInputPassword1" value="{{$data->email}}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Full Name</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{$data->name}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Phone</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="{{$data->phone}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Adress</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="adress" value="{{$data->adress}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Photo</label>
                                                <input type="file" id="show" class="form-control" id="exampleInputPassword1" name="photo">
                                                <img class="mt-3 rounded-circle" style="height: 100px; width:100px" id="image" src="{{ (!empty($data->photo)) ? url('upload/user/'.$data->photo) : url('upload/no_image.jpg')}}" alt="image">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#show').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#image').attr('src',e.target.result)
                }
                reader.readAsDataURL(e.target.files[0])
            })
        });
    </script>
@endsection
