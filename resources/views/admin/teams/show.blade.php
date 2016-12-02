@extends('admin.layout.adminlayout') @section('breadcumbs')


<div class="row bg-title">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Profile page</h4>
  </div>
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
      <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
      <li> <a href="{{url('/teams')}}">teams</a></li>
      <li class="active">Show team</li>
    </ol>
  </div>
</div>

@endsection

@section('content')

<style>
.sp {
margin-right: 5px;

}

  </style>
<div class="row">
  <div class="col-md-12 col-xs-12">
    <div class="white-box">

    <h1>team <span id="grp-title-name">{{ $team->name }}</span>
         @if(Auth::user()->id == $team->owner_id)
         {{-- href="{{ url('teams/' . $team->id . '/edit') }}" --}}
        <a  class="btn btn-primary btn-xs" title="Edit team" data-toggle="modal" data-target="#rename-modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['teams', $team->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete team',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
        @endif
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $team->id }}</td>
                </tr>
                <tr><th> team Name </th><td id="grp-name" > {{ $team->name }} </td></tr>
                 <tr><th> Members Count </th><td> {{ $team->users->count() }} </td></tr>
            </tbody>
        </table>
    </div>
  
    







<div class="right-aside2">
                        <div class="right-page-header">
                          <h2>Members</h2>
                          <h4>Add Members </h4>
                         
{!! Form::hidden('team_id', $team->id , ['class' => 'form-control','name' => 'team_id','id' => 'team_id' ]) !!}
<div class="input-team m-t-10 col-lg-9 col-md-9">
   <input id="useremail" type="email" name="email" class="form-control form-control" placeholder="New user email" data-error="Invalid email address" required>
<span class="input-team-btn">


       <button type="button" class="btn btn-info btn-rounded " id="adduser"><span id="spinner" class=""></span>Add New Contact</button>
</span> <div class="help-block with-errors "></div> </div>

                            <div class="col-xs-12 hidden-lg hidden-md" style="height:50px;"></div>      

                    <div class="pull-right"><input type="text" id="demo-input-search2" placeholder="search contacts" class="form-control"></div>
                        </div>
   <div class="col-xs-12 hidden-lg hidden-md" style="height:50px;"></div>
                        <div class="clearfix"></div>
                        <div class="scrollable">
                            <div class="table-responsive">
                                <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                  <thead>
                                    <tr>

                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Type</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($users as $user)
                                    <tr>
                                      <td><a href="users/{{ $user->id}}">
                                      @if($user->avatar == null)
                                      <img src="{{url('uploads/avatars/placeholder.png')}}" alt="user" class="img-circle"/>
                                      @else
                                      <img src="{{url('uploads/avatars/'.$user->avatar)}}" alt="user" class="img-circle"/>
                                      @endif
                                       {{ $user->getname()}}</a></td>
                                      <td>{{ $user->email}}</td>
                                      <td>{{ $user->phone_number}}</td>
                                      <td><span class="label label-danger">{{ $user->type }}</span> </td>
                                        {!! Form::open(['url' => 'teams/removeuser', 'class' => 'form-horizontal', 'Method' => 'POST']) !!}
                                      <td><button type="submit" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td>
                                      <input type="hidden" name="team_id" value="{{ $team->id }}">
                                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                                      {!! Form::close() !!}
                                    </tr>
                                    @endforeach
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                        <td colspan="7"><div class="text-right">
                                            <ul class="pagination">
                                            </ul>
                                          </div></td>
                                      </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>















</div>
</div>
</div>
</div>

<div id="rename-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Rename team</h4>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-team">
                        <label for="recipient-name" class="control-label">New name</label>
                        <input type="text" class="form-control" id="team-name">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button id="rename" type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>







@endsection
@section('js')

<script>


$(document).on('click', '#adduser', function() {
 
  $( "#spinner").addClass("fa fa-spinner fa-spin");
     var email = $( "#useremail").val();
     var team_id = $( "#team_id").val();
        $.ajax({
            type: 'POST',
            url: '/teams/adduser',
            data: {'email':email, 'team_id':team_id},
            success: function(data) {
                 console.log(data.data)
                if(data.status == 'success')
                {

                    var controls = '<form method="POST" action="{{url("teams/removeuser")}} " accept-charset="UTF-8" class="form-horizontal"></form><td><button type="submit" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td><input type="hidden" name="team_id" value="'+team_id+'"><input type="hidden" name="user_id" value="'+data.data.id+'"></form>';


                $('#demo-foo-addrow > tbody ').prepend('<tr><td>'+ data.data.firstname + ' '+ data.data.lastname  + '</td><td>'+ data.data.email +'</td><td>'+ data.data.phone_number +'</td><td>'+ data.data.type +'</td>'            +controls+'</tr>');
                $( "#add-contact").modal('hide');
                $( "#useremail").val('');
                $( "#emptytable").addClass('hidden');
                $( "#pagination").removeClass('hidden');
                }
                else
                {
                    console.log('add name')
                }
                
                $( "#spinner").removeClass("fa fa-spinner fa-spin");
            },
            error: function(data) {
               console.log(data);
                               $( "#spinner").removeClass("fa fa-spinner fa-spin");
            }
        });
        return false;
    });



$(document).on('click', '#rename', function() {

     var name = $( "#team-name").val();
     var gp_id = $( "#team_id").val();

        $.ajax({
            type: 'PATCH',
            url: '/teams/'+gp_id,
            data: {'name':name},
            success: function(data) {
              console.log(data);
              $( "#rename-modal").modal('hide');
               $( "#grp-name").text(data.name);
                $( "#grp-title-name").text(data.name);
            },
            error: function(data) {
               
            }
        });
        return false;
    });






</script>
@endsection