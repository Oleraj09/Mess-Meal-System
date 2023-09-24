@extends('custom.master')
@section('title', 'Engineer Gang :: Bazar List of This Month!!')
@section('page')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <h5 class="card-title fw-semibold mb-4 pt-2">Bazar List</h5>
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
                                        <h6 class="fw-semibold mb-0">List</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Amount</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bazar as $b)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $b->name }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $b->day .'/'. $b->month .'/'. $b->year }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-0">{{ $b->list  }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $b->amount }}</p>
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
