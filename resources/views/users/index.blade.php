@extends('layout/new')


@section('content')
    <header class="section2 background-dark" style="margin-left:30px;">
  <div class="line">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
  <a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{ url('manage')}}"> Manage</a>
  &nbsp;&nbsp;/&nbsp;&nbsp; <a href="" style="color:#2F76A5;">Users</a></h5>
  </div>
  <div class="pull-left">
                         
    
            </div>
</header> 
<div class="col-lg-8 col-md-8 col-sm-8" >
     <div class="single_sidebar" style="margin-bottom: 30px;">
<h2><span>USER LIST</span></h2>
</div>
  @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered table-striped responsive" width="50%">
        <tr>
            <th width="20px">No</th>
            <th>First name</th>
            <th>Middle name</th>
            <th>Last name</th>
            <th width="100px">Email</th>
            <th>Phonenumber</th>
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
          <a href="{{url('setting')}}" ><div class="citation">
           <h5>SETTINGS</h5>
          </div></a>
                   <br><br>
  
</div>

@endsection