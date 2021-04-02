@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($categories as $category)
        <div class="col-md-12">
            <h2 style="color: blue">{{ $category->name }}</h2>
            <div class="jumbotron">
                <div class="row">
                    @foreach (App\models\Food::where('category_id', $category->id)->get() as $food)
                    <div class="col-md-3">
                        <img src="{{ asset('images') }}/{{ $food->image }}" alt="" width="200" height="155">
                        <p class="text-center">{{ $food->name }}
                            <span>AED {{ $food->price }}</span>
                        </p>

                        <p class="text-center">
                            <a href="{{ route('food.view', [$food->id]) }}">
                            <button type="submit" class="btn btn-outline-danger">View</button>
                            </a>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

<!-- <style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  border-style: ridge !important;
}
</style> -->