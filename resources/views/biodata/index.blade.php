@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-10">
                <h3> List of Biodata</h3>
            </div>

            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{route('biodata.create')}}">Create New</a>
            </div>
        </div>


        @if($message=Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif


        <table class="table table-hover table-sm">
            <tr>
                <th width="50px">No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>image</th>
                <th>Action</th>



            @foreach($biodatas as $biodata)

                <tr>
                    <td><b>{{$biodata->id}}</b></td>
                    <td>{{$biodata->first_name}}</td>
                    <td>{{$biodata->last_name}}</td>
                    <td><img src="{{URL::to('/')}}/images/{{$biodata->image}}" class="img-thumbnail" width="75" alt=""></td>
                    <td>
                        <form action="{{route('biodata.destroy',$biodata->id)}}" method="post">
                            <a class="btn btn-warning" href="{{route('biodata.edit',$biodata->id)}}">edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="d-flex justify-content-center">
        {!! $biodatas->links('vendor.pagination.bootstrap-4') !!}
        </div>


    </div>

@endsection
