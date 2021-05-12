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
            <div class="navbar-brand"><span id="componentDetailsTitle"> Add Question</span> </div>
        </nav>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.questions.store') }}" enctype="multipart/form-data">
            @csrf


            
            {{-- /////////////////////////////////////////////////////////////////////////////////////////////////
                 **************************************  Options ************************************************ 
                 /////////////////////////////////////////////////////////////////////////////////////////////// --}}



            <div class="row border bg-light">
                <div class="col-12">
                <h4 class="text-center" style="color: green">Question</h4>
            </div>
            <div class="col-12 col-md-2 pl-4">
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="questionTextCheck" checked>
                    <label class="form-check-label" for="questionTextCheck" >Text</label>
                </div>
            </div>
            <div class="col-12 col-md-10">
                <div class="form-group" id="question_text_section" >
                    <textarea class="form-control" id="question" name="question" rows="2" required autofocus>{{ old('question') }}</textarea>
                </div>
            </div>
                <div class="col-12 col-md-2 pl-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="questionImageCheck">
                        <label class="form-check-label" for="questionImageCheck">Image</label>
                    </div>
                </div>
                <div class="col-12 col-md-10">

                    <div class="form-group" id="question_image_section" style="display: none;">
                        <input type="file" class="form-control-file" id="question_image" name="question_image"
                            accept="image/*">
                    </div>
                </div>

                <div class="col-12 col-md-2 pl-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="questionVideoCheck">
                        <label class="form-check-label" for="questionVideoCheck">Video</label>
                    </div>
                </div>
                <div class="col-12 col-md-10">

                    <div class="form-group" id="question_video_section" style="display: none;">
                        <input type="file" class="form-control-file" id="question_video" name="question_video"
                            accept="video/*">
                    </div>
                </div>
                <div class="col-12 col-md-4">

                    <div class="form-group">
                        <label for="category">Category <span style="color: red">*</span></label>
                        <select class="form-control" name="category" id="category" required>
                            <option disabled value selected>-- Select Category --</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md 4">
                    <div class="form-group">
                        <label for="lavel">Level <span style="color: red">*</span></label>
                        <select class="form-control" name="level" id="level" required>
                            <option selected value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md 4">
                    <div class="form-group">
                        <label for="date">Schedule Date <span style="color: red">*</span></label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                </div>
            </div>













            {{-- /////////////////////////////////////////////////////////////////////////////////////////////////
                 **************************************  Options ************************************************ 
                 /////////////////////////////////////////////////////////////////////////////////////////////// --}}

            <div class="row">

            {{-- /////////////////////////////////////////////////////////////////////////////////////////////////
                 **************************************  Option A ************************************************ 
                 /////////////////////////////////////////////////////////////////////////////////////////////// --}}
                <div class="col-12 col-md-6   p-1">
                    <div class="border bg-light">
                    <h4 class="text-center" style="color: green">Option A</h4>
                    <div class="row p-2">
                        
                        <div class="col-12 col-md-3 ">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="OptionATextCheck" checked>
                                <label class="form-check-label" for="OptionATextCheck" >Text</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group" id="option_a_text_section" >
                                <textarea class="form-control" id="option_a" name="option_a" rows="2" required>{{ old('option_a') }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="optionAImageCheck">
                                <label class="form-check-label" for="optionAImageCheck">Image</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group" id="option_a_image_section" style="display: none;">
                                <input type="file" class="form-control-file" id="option_a_image" name="option_a_image"
                                    accept="image/*">
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="optionAVideoCheck">
                                <label class="form-check-label" for="optionAVideoCheck">Video</label>
                            </div>

                        </div>

                        <div class="col-12 col-md-9">
                            <div class="form-group" id="option_a_video_section" style="display: none;">
                                <input type="file" class="form-control-file" id="option_a_video" name="option_a_video"
                                    accept="video/*">
                            </div>
                        </div>


                    </div>
                </div>
                </div>

            {{-- /////////////////////////////////////////////////////////////////////////////////////////////////
                 **************************************  Option B ************************************************ 
                 /////////////////////////////////////////////////////////////////////////////////////////////// --}}
                <div class="col-12 col-md-6 p-1 ">
                    <div class="border bg-light">
                    <h4 class="text-center" style="color: green">Option B</h4>
                    <div class="row p-2">
                        <div class="col-12 col-md-3 ">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="OptionBTextCheck" checked>
                                <label class="form-check-label" for="OptionBTextCheck" >Text</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group" id="option_b_text_section" >
                                <textarea class="form-control" id="option_b" name="option_b" rows="2" required>{{ old('option_b') }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="optionBImageCheck">
                                <label class="form-check-label" for="optionBImageCheck">Image</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group" id="option_b_image_section" style="display: none;">
                                <input type="file" class="form-control-file" id="option_b_image" name="option_b_image"
                                    accept="image/*">
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="optionBVideoCheck">
                                <label class="form-check-label" for="optionBVideoCheck">Video</label>
                            </div>

                        </div>

                        <div class="col-12 col-md-9">
                            <div class="form-group" id="option_b_video_section" style="display: none;">
                                <input type="file" class="form-control-file" id="option_b_video" name="option_b_video"
                                    accept="video/*">
                            </div>
                        </div>
                    </div>

                    </div>
                </div>

            {{-- /////////////////////////////////////////////////////////////////////////////////////////////////
                 **************************************  Option C ************************************************ 
                 /////////////////////////////////////////////////////////////////////////////////////////////// --}}
                <div class="col-12 col-md-6 p-1 ">
                    <div class="border bg-light">
                    <h4 class="text-center" style="color: green">Option C</h4>
                    <div class="row p-2">
                        <div class="col-12 col-md-3 ">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="OptionCTextCheck" checked>
                                <label class="form-check-label" for="OptionCTextCheck" >Text</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group" id="option_c_text_section" >
                                <textarea class="form-control" id="option_c" name="option_c" rows="2" required>{{ old('option_c') }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="optionCImageCheck">
                                <label class="form-check-label" for="optionCImageCheck">Image</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group" id="option_c_image_section" style="display: none;">
                                <input type="file" class="form-control-file" id="option_c_image" name="option_c_image"
                                    accept="image/*">
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="optionCVideoCheck">
                                <label class="form-check-label" for="optionCVideoCheck">Video</label>
                            </div>

                        </div>

                        <div class="col-12 col-md-9">
                            <div class="form-group" id="option_c_video_section" style="display: none;">
                                <input type="file" class="form-control-file" id="option_c_video" name="option_c_video"
                                    accept="video/*">
                            </div>
                        </div>
                    </div>

                    </div>
                </div>

                
            {{-- /////////////////////////////////////////////////////////////////////////////////////////////////
                 **************************************  Option D ************************************************ 
                 /////////////////////////////////////////////////////////////////////////////////////////////// --}}
                <div class="col-12 col-md-6 p-1 ">
                    <div class="border bg-light">
                    <h4 class="text-center" style="color: green">Option D</h4>
                    <div class="row p-2">
                        <div class="col-12 col-md-3 ">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="OptionDTextCheck" checked>
                                <label class="form-check-label" for="OptionDTextCheck" >Text</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group" id="option_d_text_section" >
                                <textarea class="form-control" id="option_d" name="option_d" rows="2" required>{{ old('option_d') }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="optionDImageCheck">
                                <label class="form-check-label" for="optionDImageCheck">Image</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group" id="option_d_image_section" style="display: none;">
                                <input type="file" class="form-control-file" id="option_d_image" name="option_d_image"
                                    accept="image/*">
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="optionDVideoCheck">
                                <label class="form-check-label" for="optionDVideoCheck">Video</label>
                            </div>

                        </div>

                        <div class="col-12 col-md-9">
                            <div class="form-group" id="option_d_video_section" style="display: none;">
                                <input type="file" class="form-control-file" id="option_d_video" name="option_d_video"
                                    accept="video/*">
                            </div>
                        </div>
                    </div>

                    </div>
                </div>

            </div>




            
            {{-- /////////////////////////////////////////////////////////////////////////////////////////////////
                 **************************************  Answer ************************************************ 
                 /////////////////////////////////////////////////////////////////////////////////////////////// --}}

            <div class="row border bg-light">
                <div class="col-12">
                    <h4 class="text-center" style="color: green">Answer</h4>

                </div>
                
                <div class="col-12 ">
                    <div class="form-group">
                        <label for="answer_no">Select Answer <span style="color: red">*</span></label>
                        <select class="form-control "  name="answer_no" id="answer_no" required>
                            <option disabled value selected>-- Select Answer --</option>
                            <option value="A">Option A</option>
                            <option value="B">Option B</option>
                            <option value="C">Option C</option>
                            <option value="D">Option D</option>
                        </select>
                    </div>
                </div>
                
                
                <div class="col-12 col-md-2 pl-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="answerTextCheck" checked>
                        <label class="form-check-label" for="answerTextCheck" >Text</label>
                    </div>
                </div>
                <div class="col-12 col-md-10">
                    <div class="form-group" id="answer_text_section" >
                        <textarea class="form-control" id="answer" name="answer" rows="2" required>{{ old('answer') }}</textarea>
                    </div>
                </div>
                <div class="col-12 col-md-2 pl-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="answerImageCheck">
                        <label class="form-check-label" for="answerImageCheck">Image</label>
                    </div>
                </div>
                <div class="col-12 col-md-10">

                    <div class="form-group" id="answer_image_section" style="display: none;">
                        <input type="file" class="form-control-file" id="answer_image" name="answer_image"
                            accept="image/*">
                    </div>
                </div>

                <div class="col-12 col-md-2 pl-4">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="answerVideoCheck">
                        <label class="form-check-label" for="answerVideoCheck">Video</label>
                    </div>
                </div>
                <div class="col-12 col-md-10">

                    <div class="form-group" id="answer_video_section" style="display: none;">
                        <input type="file" class="form-control-file" id="answer_video" name="answer_video"
                            accept="video/*">
                    </div>
                </div>
                
            </div>





            <button type="submit" class="btn btn-success btn-block mt-2">Submit</button>
        </form>
    </div>
</div>





<script>
    $(document).ready(function () {

        //question
        $('#questionTextCheck').on('input', function () {
            if ($('#questionTextCheck').is(":checked")) {
                $('#question_text_section').show();           
                $('#question').prop('required',true);
            } else {

                $('#question_text_section').hide();     
                $('#question').prop('required',false);
            }
        });
        $('#questionImageCheck').on('input', function () {
            if ($('#questionImageCheck').is(":checked")) {
                $('#question_image_section').show();      
                $('#question_image').prop('required',true);
            } else {

                $('#question_image_section').hide();      
                $('#question_image').prop('required',false);
            }
        });
        $('#questionVideoCheck').on('input', function () {
            if ($('#questionVideoCheck').is(":checked")) {
                $('#question_video_section').show();
                $('#question_video').prop('required',true);
            } else {

                $('#question_video_section').hide();
                $('#question_video').prop('required',false);
            }
        });










        //Option A
        $('#OptionATextCheck').on('input', function () {
            if ($('#OptionATextCheck').is(":checked")) {
                $('#option_a_text_section').show();
                $('#option_a').prop('required',true);
            } else {

                $('#option_a_text_section').hide();
                $('#option_a').prop('required',false);
            }
        });
        $('#optionAImageCheck').on('input', function () {
            if ($('#optionAImageCheck').is(":checked")) {
                $('#option_a_image_section').show();
                $('#option_a_image').prop('required',true);
            } else {

                $('#option_a_image_section').hide();
                $('#option_a_image').prop('required',false);
            }
        });
        $('#optionAVideoCheck').on('input', function () {
            if ($('#optionAVideoCheck').is(":checked")) {
                $('#option_a_video_section').show();
                $('#option_a_video').prop('required',true);
            } else {

                $('#option_a_video_section').hide();
                $('#option_a_video').prop('required',false);
            }
        });













        //Option B
        $('#OptionBTextCheck').on('input', function () {
            if ($('#OptionBTextCheck').is(":checked")) {
                $('#option_b_text_section').show();
                $('#option_b').prop('required',true);
            } else {

                $('#option_b_text_section').hide();
                $('#option_b').prop('required',false);
            }
        });
        $('#optionBImageCheck').on('input', function () {
            if ($('#optionBImageCheck').is(":checked")) {
                $('#option_b_image_section').show();
                $('#option_b_image').prop('required',true);
            } else {

                $('#option_b_image_section').hide();
                $('#option_b_image').prop('required',false);
            }
        });
        $('#optionBVideoCheck').on('input', function () {
            if ($('#optionBVideoCheck').is(":checked")) {
                $('#option_b_video_section').show();
                $('#option_b_video').prop('required',true);
            } else {

                $('#option_b_video_section').hide();
                $('#option_b_video').prop('required',false);
            }
        });














        //Option C
        $('#OptionCTextCheck').on('input', function () {
            if ($('#OptionCTextCheck').is(":checked")) {
                $('#option_c_text_section').show();
                $('#option_c').prop('required',true);
            } else {

                $('#option_c_text_section').hide();
                $('#option_c').prop('required',false);
            }
        });
        $('#optionCImageCheck').on('input', function () {
            if ($('#optionCImageCheck').is(":checked")) {
                $('#option_c_image_section').show();
                $('#option_c_image').prop('required',true);
            } else {

                $('#option_c_image_section').hide();
                $('#option_c_image').prop('required',false);
            }
        });
        $('#optionCVideoCheck').on('input', function () {
            if ($('#optionCVideoCheck').is(":checked")) {
                $('#option_c_video_section').show();
                $('#option_c_video').prop('required',true);
            } else {

                $('#option_c_video_section').hide();
                $('#option_c_video').prop('required',false);
            }
        });












        //Option D
        $('#OptionDTextCheck').on('input', function () {
            if ($('#OptionDTextCheck').is(":checked")) {
                $('#option_d_text_section').show();
                $('#option_d').prop('required',true);
            } else {

                $('#option_d_text_section').hide();
                $('#option_d').prop('required',false);
            }
        });
        $('#optionDImageCheck').on('input', function () {
            if ($('#optionDImageCheck').is(":checked")) {
                $('#option_d_image_section').show();
                $('#answer_image').prop('required',true);
            } else {

                $('#option_d_image_section').hide();
                $('#answer_image').prop('required',false);
            }
        });
        $('#optionDVideoCheck').on('input', function () {
            if ($('#optionDVideoCheck').is(":checked")) {
                $('#option_d_video_section').show();
                $('#answer_video').prop('required',true);
            } else {

                $('#option_d_video_section').hide();
                $('#answer_video').prop('required',false);
            }
        });











        //Answer
        $('#answerTextCheck').on('input', function () {
            if ($('#answerTextCheck').is(":checked")) {
                $('#answer_text_section').show();
                $('#answer').prop('required',true);
            } else {

                $('#answer_text_section').hide();
                $('#answer').prop('required',false);
            }
        });
        $('#answerImageCheck').on('input', function () {
            if ($('#answerImageCheck').is(":checked")) {
                $('#answer_image_section').show();
                $('#answer_image').prop('required',true);
            } else {

                $('#answer_image_section').hide();
                $('#answer_image').prop('required',false);
            }
        });
        $('#answerVideoCheck').on('input', function () {
            if ($('#answerVideoCheck').is(":checked")) {
                $('#answer_video_section').show();
                $('#answer_video').prop('required',true);
            } else {

                $('#answer_video_section').hide();
                $('#answer_video').prop('required',false);
            }
        });



    });

</script>


@endsection
