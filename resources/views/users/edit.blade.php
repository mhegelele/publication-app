@extends('layout/new')


@section('content')
<div class="col-lg-8 col-md-8 col-sm-8" >
    <div class="row">
        <div class="col-lg-8 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('users.update',$user->id) }}" method="POST">
        
               <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="name" value="{{ $user->name }} " class="form-control" placeholder="Name">
                </div>
            </div>
<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Middle Name:</strong>
                    <input type="text" name="mname" value="{{ $user->mname }} " class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="sname" value="{{ $user->sname }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                </div>
            </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Phonenumber:</strong>
                    <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control" placeholder="Phonenumber">
                </div>
            </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>User role (1 for admin, 0 for user): </strong>
                    <input type="text" name="level" value="{{ $user->level }}" class="form-control" placeholder="Role">
                </div>
            </div>
             {{ method_field('PUT') }}
       {{ csrf_field() }}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>


    </form>

</div>
@endsection