@extends('custom.master')
@section('title', 'Engineer Gang :: Available member of the mess!!')
@section('page')
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <h5 class="card-title fw-semibold mb-4 pt-2">Available Mess Member </h5>
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                            <div class="ms-auto pb-3"><a type="button" data-toggle="modal" data-target="#addmember"
                                    class="btn btn-success rounded-5"><i class="ti ti-pencil-plus"></i> Add</a></div>
                        @endif
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Photo</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Email</h6>
                                    </th>
                                    @if (Auth::user()->role == 'manager' || Auth::user()->role == 'admin')
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>
                                    @endif
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Phone</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Adress</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $m)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"><img
                                                    src="{{ !empty($data->photo) ? url('upload/' . $data->photo) : url('upload/no_image.jpg') }}"
                                                    class="rounded-circle" style="height: 60px; width: 60px;"
                                                    alt=""></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $m->name }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $m->email }}</p>
                                        </td>
                                        @if (Auth::user()->role == 'manager' || Auth::user()->role == 'admin')
                                            <td class="border-bottom-0">
                                                <a href="{{ route('delete', $m->id) }}">
                                                    <button class="btn text-danger rounded-5">
                                                        <i class="fa-solid fa-trash fa-xl"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('makemanager', $m->id) }}">
                                                    @if ($m->role == 'member')
                                                        <button class="btn btn-primary rounded-5">
                                                            Make Manager
                                                        </button>
                                                    @else
                                                        <button class="btn btn-secondary rounded-5">
                                                            Member
                                                        </button>
                                                    @endif

                                                </a>
                                            </td>
                                        @endif
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $m->phone }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $m->adress }}</h6>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <h5 class="card-title fw-semibold mb-4 pt-2">Inactive Mess Member </h5>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Photo</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Email</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Phone</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Adress</h6>
                                    </th>
                                    @if (Auth::user()->role == 'manager' || Auth::user()->role == 'admin')
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $m)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"><img
                                                    src="{{ !empty($data->photo) ? url('upload/' . $data->photo) : url('upload/no_image.jpg') }}"
                                                    class="rounded-circle" style="height: 60px; width: 60px;"
                                                    alt=""></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $m->name }}</h6>
                                            <span class="fw-normal">{{ $m->name }}</span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $m->email }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <span
                                                    class="badge {{ $m->status == 'in' ? 'bg-primary' : 'bg-warning' }} rounded-3 fw-semibold">{{ $m->status == 'in' ? 'Available' : 'Not Avaiable' }}</span>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $m->phone }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $m->adress }}</h6>
                                        </td>
                                        @if (Auth::user()->role == 'manager' || Auth::user()->role == 'admin')
                                            <td class="border-bottom-0">
                                                <a href="{{ route('delete', $m->id) }}">
                                                    <button class="btn btn-primary rounded-5">
                                                        Active
                                                    </button>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('custom.inc.addmembermodal')
@endsection
