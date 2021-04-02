@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">All Food
                    <span class="float-right">
                        <a href="{{ route('food.create') }}">
                            <button class="btn btn-outline-secondary">Add food</button>
                        </a>
                    </span>
                </div>

                <div class="card-body">
                    <!-- @forelse ($foods as $food)
                    <p>{{ $food->name }}</p>
                    @empty
                    No Food found.
                    @endforelse -->
                    <!-- @foreach ($foods as $food)
                      <p>{{ $food->name }}</p>
                    @endforeach -->
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($foods) > 0)
                            @foreach ($foods as $key=>$food)
                            <tr>
                                <td><img src="{{ asset('images') }}/{{ $food->image }}" width="100" alt="Food"></td>
                                <td>{{ $food->name }}</td>
                                <td>{{ $food->description }}</td>
                                <td>AED {{ $food->price }}</td>
                                <td>{{ $food->category->name }}</td>
                                <td>
                                    <a href="{{ route('food.edit', [$food->id]) }}">
                                        <button class="btn btn-outline-success">Edit</button>
                                    </a>
                                </td>
                                <td>

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $food->id }}">
                                        Delete
                                    </button>





                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $food->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('food.destroy', [$food->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @endforeach

                            @else
                            <p>No Food to display.</p>
                            @endif
                        </tbody>
                    </table>
                    {{ $foods->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection