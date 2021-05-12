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










<div class="card shadow mb-4">

    <div class="card-header  bg-techbot-dark">
        <nav class="navbar  ">

            <div class="navbar-brand"><span id="componentDetailsTitle"> Questions
                    ({{ Carbon\Carbon::parse($date)->format('d, F Y') }})</span> </div>
            <a href="{{ route('admin.questions.create') }}">
            <div id="AddNewFormButtonDiv"><button type="button" class="btn btn-success btn-lg" id="AddNewFormButton"><i
                        class="fas fa-plus" id="PlusButton"></i></button></div>
                    </a>

        </nav>
        <nav class="navbar  ">

            <div class="navbar-brand"><span id="componentDetailsTitle"> Filter </span> </div>

            <div>
                <form method="get" id="filterForm">
                    <div class="form-row align-items-center">
                        <div class="col-auto">{{ __("Select A Date") }} </div>
                        <div class="col-auto"> <input type="date" name="date" class="form-control mb-2"
                                id="filterInput" required>
                        </div>
                    </div>
                </form>
            </div>

        </nav>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-techbot-dark">

                    <tr>

                        <th> #</th>
                        <th>Schedule</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot class="bg-techbot-dark">
                    <tr>

                        <th> #</th>
                        <th>Schedule</th>
                        <th>Action</th>

                    </tr>

                </tfoot>

                <tbody>
                    <?php $itr = 0; ?>
                    @foreach ($questions as $question)

                    @php
                    $itr = $itr+1;
                    @endphp
                    <tr class="data-row">





                        <td>{{ $itr }}</td>
                        <td>{{ Carbon\Carbon::parse(($question->date))->format('d F, Y') }}</td>


                        <td class="align-middle">
                            <a href="{{ route('admin.questions.edit',$question->id) }}"><button title="Edit"
                                    type="button" class="dataEditItemClass btn btn-success btn-sm"
                                    id="data-edit-button"> <i class="fa fa-edit" aria-hidden="false">
                                    </i></button></a>


                            <form method="POST" action="{{ route('admin.questions.destroy',$question->id) }}"
                                id="delete-form-{{ $question->id }}" style="display:none; ">
                                {{csrf_field() }}
                                {{ method_field("delete") }}
                            </form>




                            <button title="Delete" class="dataDeleteItemClass btn btn-danger btn-sm" onclick="if(confirm('are you sure to delete this')){
				document.getElementById('delete-form-{{ $question->id }}').submit();
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













<script>
    $(document).ready(function () {


        $('#dataTable').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $('#filterInput').on('input',function(){
            $('#filterForm').submit();
        });



    });

</script>





@endsection
