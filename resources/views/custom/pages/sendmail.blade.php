@extends('custom.master')
@section('title', 'Engineer Gang :: Send Notice to specific User!!')
@section('page')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <h5 class="card-title fw-semibold mb-4 pt-2">Send Mail</h5>
                    </div>
                    </p>
                    <hr>
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('sendemailconf') }}">
                                @csrf
                                <label for="recipient">Recipient:</label>
                                <select name="recipient" id="" class="form-control">
                                    <option value="" disabled selected>Select a user...</option>
                                    @foreach ($users as $u)
                                        <option value="{{ $u->email }}">{{ $u->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="email" name="recipient" class="form-control" required> --}}
                                <br>
                                <label for="subject">Subject:</label>
                                <input type="text" name="subject" class="form-control" required>
                                <br>
                                <label for="message">Message:</label>
                                <textarea name="message" class="form-control" required></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">Send Email</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
