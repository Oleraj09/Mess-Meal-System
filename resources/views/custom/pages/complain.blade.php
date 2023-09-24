@extends('custom.master')
@section('title', 'Engineer Gang :: Complain Cell of This Month!!')
@section('page')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <h5 class="card-title fw-semibold mb-4 pt-2">Complain Box</h5>
                    </div>
                    </p>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('complainconf')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Victim</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="name" value="{{Auth::user()->name}}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Gulty</label>
                                    <select name="guilty" id="" class="form-control">
                                        @foreach ($user as $u)
                                            <option value="{{$u->id}}" class="form-control my-2 py-3">{{$u->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Reason</label><br>
                                    <textarea style="white-space: pre-wrap;" class="form-control" name="reason" id="items" cols="30" rows="10" placeholder="Ja Ja kena hoyece sei list"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
