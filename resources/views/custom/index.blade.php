@extends('custom.master')
@section('title', 'Engineer Gang :: Your Mess Buddy!!')
@section('page')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden">
                <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Notice Board</h5>
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h6 class="fw-semibold mb-3">{{(empty($notice->notice) ? 'No Notice Available' : $notice->notice)}}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden">
                <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Meal Confrimation</h5>
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('mealconf') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-lg-4">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="name"
                                                        value="{{ Auth::user()->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-4">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Lunch</label>
                                                    <select name="lunch" id="" class="form-control">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-4">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Dinner</label>
                                                    <select name="dinner" id="" class="form-control">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 d-flex align-items-strech">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold"> Meal Rate</h5>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="fw-semibold mt-1 me-2">
                                            {{ (empty($expense[0]->exp) || empty($mealrate[0]->meal)) ? 0 : number_format($expense[0]->exp / $mealrate[0]->meal, 2, '.', ',') }} ৳</h5>
                                        <span
                                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-up-left text-success"></i>
                                        </span>
                                    </div>
                                </div>
                                {{-- number_format($number, 2, '.', ','); --}}
                                <!-- <div class="col-4">
                                          <div class="d-flex justify-content-center">
                                            <div id="breakup"></div>
                                          </div>
                                        </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold"> Your Meal</h5>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="fw-semibold mt-1 me-2">
                                            {{ (empty($toalmeal[0]->total)) ? 0 : $toalmeal[0]->total }} টি
                                        </h5>
                                        <span
                                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-up-left text-success"></i>
                                        </span>
                                    </div>
                                </div>
                                <!-- <div class="col-4">
                                          <div class="d-flex justify-content-center">
                                            <div id="breakup"></div>
                                          </div>
                                        </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold"> Your Balance</h5>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="fw-semibold mt-1 me-2">
                                            {{ (empty($bal)) ? 0 : $bal }} ৳</h5>
                                        <span
                                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-up-left text-success"></i>
                                        </span>
                                    </div>
                                </div>
                                <!-- <div class="col-4">
                                          <div class="d-flex justify-content-center">
                                            <div id="breakup"></div>
                                          </div>
                                        </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold"> Current Expense</h5>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="fw-semibold mt-1 me-2">
                                            {{ (empty($expense[0]->exp) || empty($mealrate[0]->meal) || empty($toalmeal[0]->total)) ? 0 : number_format($toalmeal[0]->total * ($expense[0]->exp / $mealrate[0]->meal), 2, '.', ',') }}
                                            ৳</h5>
                                        <span
                                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-up-left text-success"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold"> Balance Left</h5>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="fw-semibold mt-1 me-2">
                                            @php
                                                $y = (empty($bal)) ? 0 : $bal;
                                                $x = (empty($expense[0]->exp) || empty($mealrate[0]->meal) || empty($toalmeal[0]->total)) ? 0 : number_format($toalmeal[0]->total * ($expense[0]->exp / $mealrate[0]->meal), 2, '.', ',');
                                            @endphp
                                            {{number_format($y - $x, 2, '.', ',') }} ৳
                                        </h5>
                                        <span
                                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-up-left text-success"></i>
                                        </span>
                                    </div>
                                </div>
                                <!-- <div class="col-4">
                                          <div class="d-flex justify-content-center">
                                            <div id="breakup"></div>
                                          </div>
                                        </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Mess Lifetime Meal</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3">{{ $totalmeal }} টি</h4>
                                    <div class="d-flex align-items-center mb-3">
                                        <p class="fs-3 mb-0">Year Count</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="me-4">
                                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                            <span class="fs-2">2023</span>
                                        </div>
                                        <div>
                                            <span
                                                class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                            <span class="fs-2">Currents</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-center">
                                        <div id="breakup"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- Monthly Earnings -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row alig n-items-start">
                                <div class="col-8">
                                    <h5 class="card-title mb-9 fw-semibold"> Mess Lifetime Expense </h5>
                                    <h4 class="fw-semibold mb-3">{{ $totalbazars }} ৳</h4>
                                    <div class="d-flex align-items-center pb-1">
                                        <span
                                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-down-right text-danger"></i>
                                        </span>
                                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                        <p class="fs-3 mb-0">last year</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-end">
                                        <div
                                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-currency-dollar fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="earning"></div>
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
                        <h5 class="card-title fw-semibold mb-4 pt-2">Meal List</h5>

                    </div>
                    <p style="font-weight:600">Current Month: <span style="color:rebeccapurple">{{ date('M Y') }}</span>
                    </p>
                    <hr>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Lunch</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Dinner</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Date</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Total</h6>
                                    </th>
                                    @if (Auth::user()->role == 'manager' || Auth::user()->role == 'admin')
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allmeal as $m)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $m->name }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $m->lunch }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $m->dinner }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            {{-- <p class="mb-0 fw-normal">{{ \Carbon\Carbon::parse($m->date)->format('Y-m-d') }}</p> --}}
                                            <p class="mb-0 fw-normal">{{ $m->day . '-' . $m->month . '-' . $m->year }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $m->total }}</h6>
                                        </td>
                                        @if (Auth::user()->role == 'manager' || Auth::user()->role == 'admin')
                                            <td class="border-bottom-0">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#meal{{$m->id}}{{$m->day}}">
                                                    Edit
                                                </button>
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
    @include('custom.inc.mealmodal')
@endsection
