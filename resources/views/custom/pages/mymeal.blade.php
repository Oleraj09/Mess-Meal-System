@extends('custom.master')
@section('title', 'Engineer Gang :: My Meal of This Month!!')
@section('page')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <h5 class="card-title fw-semibold mb-4 pt-2">My Meal List</h5>
                       
                            <div class="ms-auto pt-3 btn btn-success rounded-5">Total - {{$totalz[0]->total}}</div>
                        
                    </div>
                    <p style="font-weight:600">Current Month: <span style="color:rebeccapurple">{{date('M Y')}}</span></p>
                    <hr>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Date</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Lunch</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Dinner</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Total</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meal as $m)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $m->name }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $m->day.'/'.$m->month.'/'.$m->year }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $m->lunch }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $m->dinner }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $m->total }}</h6>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-normal mb-0">25/02/0202</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">1</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">1</p>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-normal mb-0">2</h6>
                                </td>
                            </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
