@extends('layout/new')


@section('content')
   
<div class="col-lg-8 col-md-8 col-sm-8" >
  <!--   <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.6 CRUD Example from scratch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Product</a>
            </div>
        </div>
    </div> -->


  
     <div class="single_sidebar" style="margin-bottom: 30px;">
<h2><span>USER LIST</span></h2>
</div>
  @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered responsive">
        <tr>
            <th width="20px">No</th>
            <th>First name</th>
            <th>Middle name</th>
            <th>Last name</th>
            <th width="100px">Email</th>
            <th>Phonenumber</th>
            <th>Role </th>
            <th colspan="2">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->sname }}</td>
            <td> {{ $user->mname }} </td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->mobile }}</td>
            <td>{{ $user->level }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">


                    <!-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> -->
                    <a class="btn btn-primary fa fa-edit" href="{{ route('users.edit',$user->id) }}"></a>

    <!-- <span class="fa fa-plus"id="add-auth" title="Add field"></span> -->
                    <!-- @csrf
                    @method('DELETE') -->
                        {{ method_field('DELETE') }}
       {{ csrf_field() }}

   
                    <button type="submit" class="btn btn-danger fa fa-trash-o"></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>


    {!! $users->links() !!}

</div>
<div class="col-lg-4 col-md-4 col-sm-4">
  <div class="single_sidebar" >
           <h2><span>Manage</span></h2>
              
          </div>
      </br>
           <a href="{{url('manage')}}" ><div class="citation" >
           <h5> PUBLICATIONS FOR APPROVAL</h5>
          </div></a>
 <a href="{{url('approved')}}" ><div class="citation" >
           <h5> APPROVED PUBLICATIONS</h5>
          </div></a>
          <a href="" style="color:white;"><div class="citation" style=" background-color:#2F76A5;">
           <h5> USERS</h5>
          </div></a>
                  <a href="{{url('reportview')}}"><div class="citation">
            <h5>REPORT</h5>
          </div></a>
                   <br><br>
  
</div>

@endsection