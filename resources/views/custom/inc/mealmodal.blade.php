@if ((!empty($m->id)) && (!empty($m->day)))
        <!-- Modal -->
        <div class="modal fade" id="meal{{$m->id}}{{$m->day}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form method="POST" action="{{route('mealupdate',$m->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Update Meal</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <label for="" class="pt-2">Name</label>
                                    <input type="text" class="form-control" value="{{$m->name}}" disabled>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="px-3">
                                        <label for="" class="pt-2">Lunch</label>
                                        <input type="text" class="form-control" name="lunch" value="{{$m->lunch}}">
                                    </div>
                                    <div class="px-3">
                                        <label for="" class="pt-2">Dinner</label>
                                        <input type="text" class="form-control" name="dinner" value="{{$m->dinner}}">
                                    </div>
                                    <input type="hidden" name="day" value="{{$m->day}}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>    
@endif