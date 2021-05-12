@extends('admin.layouts.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session()->has('success'))
<div class="alert alert-success">
    @if(is_array(session('success')))
    <ul>
        @foreach (session('success') as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
    @else
    {{ session('success') }}
    @endif
</div>
@endif




<!-- Begin Page Content -->
<div class="collapse" id="createNewForm">
    <div class="card mb-4 shadow">

        <div class="card-header py-3  bg-techbot-dark ">
            <nav class="navbar navbar-dark">
                <a class="navbar-brand text-light"> Add Group </a>
            </nav>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.groups.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4 form-group">
                        <label for="name">Name <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn bg-techbot-dark mt-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>








<div class="card shadow mb-4">

    <div class="card-header py-3 bg-techbot-dark">
        <nav class="navbar  ">

            <div class="navbar-brand"><span id="componentDetailsTitle"> Groups</span> </div>
            <div id="AddNewFormButtonDiv"><button type="button" class="btn btn-success btn-lg" id="AddNewFormButton"
                    data-toggle="collapse" data-target="#createNewForm" aria-expanded="false"
                    aria-controls="collapseExample"><i class="fas fa-plus" id="PlusButton"></i></button></div>


        </nav>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-techbot-dark">

                    <tr>

                        <th> #</th>
                        <th>Name</th>
                        <th>Admin</th>
                        <th>Sub Admin</th>
                        <th>Students</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot class="bg-techbot-dark">
                    <tr>

                        <th> #</th>
                        <th>Name</th>
                        <th>Admin</th>
                        <th>Sub Admin</th>
                        <th>Students</th>
                        <th>Action</th>

                    </tr>

                </tfoot>

                <tbody>
                    <?php $itr = 0; ?>
                    @foreach ($groups as $group)

                    @php
                    $itr = $itr+1;
                    @endphp
                    <tr class="data-row">





                        <td>{{ $itr }}</td>
                        <td>{{ $group->name }}</td>
                       <td >  <a  href="{{ route('admin.group-admins',$group->id) }}">{{ $group->admins()->count() }} </a></td>
                        <td> <a  href="{{ route('admin.group-sub-admins',$group->id) }}">{{ $group->sub_admins()->count() }} </a></td>
                        <td> <a  href="{{ route('admin.group-students',$group->id) }}">{{ $group->students()->count() }}</a></td>


                        <td class="align-middle">
                            <button title="Edit" type="button" class="dataEditItemClass btn btn-success btn-sm"
                                id="data-edit-button" data-item-id={{ $group->id }}> <i class="fa fa-edit" aria-hidden="false">
                                </i></button>


                            <form method="POST" action="{{ route('admin.groups.destroy',$group->id) }}" id="delete-form-{{ $group->id }}" style="display:none; ">
                                {{csrf_field() }}
                                {{ method_field("delete") }}
                            </form>




                            <button title="Delete" class="dataDeleteItemClass btn btn-danger btn-sm" onclick="if(confirm('are you sure to delete this')){
				document.getElementById('delete-form-{{ $group->id }}').submit();
			}
			else{
				event.preventDefault();
			}
			" class="btn btn-danger btn-sm btn-raised">
                                <i class="fa fa-trash" aria-hidden="false">

                                </i>
                            </button>




                        </td>

                    </tr>


                    @endforeach

                </tbody>


            </table>
        </div>
    </div>
</div>












<!-- Attachment Modal -->
<div class="modal fade" id="data-edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-techbot-dark">
                <h5 class="modal-title " id="edit-modal-label ">
                    Edit Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
                <form id="data-edit-form" class="form-horizontal" method="POST" action="">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="col-form-label" for="modal-update-hidden-id">Id</label>
                        <input type="text" name="id" class="form-control" id="modal-update-hidden-id" required readonly>
                    </div>


                    <div class="form-group">
                        <label class="col-form-label" for="modal-update-name">Name</label>
                        <input type="text" name="name" class="form-control" id="modal-update-name" required >
                    </div>



                    <div class="form-group">

                        <input type="submit" id="submit-button" value="Submit" class="form-control btn btn-success">
                    </div>




                </form>
            </div>

        </div>
    </div>
</div>
<!-- /Attachment Modal -->




<script>
    $(document).ready(function () {

        var groups = @json($groups);
        console.log(groups);

        $('body').on('click', '#AddNewFormButton', function () {
            $('#PlusButton').toggleClass('fa-plus').toggleClass('fa-minus');

        });

        $('#dataTable').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });





        $(document).on('click', "#data-edit-button", function () {

            $(this).addClass(
            'edit-item-trigger-clicked'); 
            var options = {
                'backdrop': 'static'
            };
            $('#data-edit-modal').modal(options)
        });


        // on modal show
        $('#data-edit-modal').on('show.bs.modal', function () {

            var el = $(".edit-item-trigger-clicked"); 

            // get the data
            var itemId = el.data('item-id');

            
            $.each(groups, function (key) {
                if(groups[key].id == itemId){
                    $("#modal-update-name").val(groups[key].name);
                    return false; 
                }
                

            });

            $("#modal-update-hidden-id").val(itemId);


            var link = "{{route('admin.groups.index')}}";
             var action =  link.trim() + '/' + itemId;
             $("#data-edit-form").attr('action', action);
        });


        
        // on modal hide
        $('#data-edit-modal').on('hide.bs.modal', function () {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#edit-form").trigger("reset");
        });




    });

</script>





@endsection
