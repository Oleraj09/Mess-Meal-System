@extends('custom.master')
@section('title', 'Engineer Gang :: Summary of This Month!!')
@section('page')
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <h5 class="card-title fw-semibold mb-4 pt-2">Member Balance </h5>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Amount</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Summary</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($amounts as $t)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $t->name }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $t->amount }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="javascript:void(0)" id="show-user"
                                                data-url="{{ route('showsummary', $t->id) }}"
                                                class="btn btn-info">Summary</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-3">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <h5 class="card-title fw-semibold mb-4 pt-2">Total Expence </h5>
                    </div>
                    <hr>
                    <div class="h6">{{ $totalz[0]->total }} ৳</div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-3">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <h5 class="card-title fw-semibold mb-4 pt-2">Meal Rate </h5>
                    </div>
                    <hr>
                    <div class="h6">
                        {{ empty($expense[0]->exp) && empty($mealrate[0]->meal) ? '0' : number_format($expense[0]->exp / $mealrate[0]->meal, 2, '.', ',') }}
                        ৳</div>
                </div>
            </div>
        </div>
    </div>
    @include('custom.inc.summarymodal')
    <script type="text/javascript">
    $(document).ready(function () {
            $('body').on('click', '#show-user', function () {
              var userURL = $(this).data('url');
              $.get(userURL, function (data) {
                  $('#userShowModal').modal('show');
                  $('#user-name').text(data[1].name);
                  $('#user-meal').text(data[0][0].total);
                  $('#user-cost').text(data[0][0].total *( data[3][0].exp / data[4][0].meal ));
                  $('#user-bal').text(data[2]);
                  $('#user-rtn').text(data[2]-(data[0][0].total *( data[3][0].exp / data[4][0].meal )));
                //   number_format($toalmeal[0]->total * ($expense[0]->exp / $mealrate[0]->meal), 2, '.', ',')
              })
           });
        });  
    </script>
@endsection
