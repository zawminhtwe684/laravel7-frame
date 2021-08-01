@extends("layouts.app")
@section("title")Profile Page @endsection
@section("content")

<x-bread-crumb>
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
</x-bread-crumb>


<div class="row">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{isset(Auth::user()->photo)?asset('storage/profile/'.Auth::user()->photo) : asset('dashboard/img/default profile photo.jpg')}}" class="w-50 rounded-circle my-3" alt="">
                    <h3>
                        {{Auth::user()->name}}
                    </h3>
                    <small>
                        {{Auth::user()->email}}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
