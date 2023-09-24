@extends('custom.master')
@section('title', 'Engineer Gang :: Submit Bazar list of This Month!!')
@section('page')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <h5 class="card-title fw-semibold mb-4 pt-2">Bazar List Submission</h5>
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                            <div class="ms-auto pb-3"><a href="" class="btn btn-success rounded-5"><i
                                        class="ti ti-pencil-plus"></i> Add</a></div>
                        @endif

                    </div>
                    <p style="font-weight:600">Current Month: <span style="color:rebeccapurple">{{ date('M Y') }}</span>
                    </p>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('listsubmitconf')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="name" value="{{Auth::user()->name}}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Amount</label>
                                    <input type="text" class="form-control" name="amount" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Item List</label><br>
                                    <textarea style="white-space: pre-wrap;" class="form-control" name="items" id="items" cols="30" rows="10" placeholder="Ja Ja kena hoyece sei list"></textarea>
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
