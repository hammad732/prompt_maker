@extends('admin.layouts.master')
@section('section')
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Prompt Form</div>
                    <form action="{{ route('prompt.store') }}" method="POST">
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Job Title</label>
                                <input type="text" class="form-control" name="post" id=""
                                    value="{!! request('title') !!}" aria-describedby="helpId" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label for="">Job Description</label>
                                <textarea class="form-control" name="job_description" id="" aria-describedby="helpId"
                                    placeholder="Enter Description">{!! request('description') !!}</textarea>


                            </div>

                            <div class="form-group">
                                <label for="">Client Name</label>
                                <input type="text" class="form-control" name="c_name" id=""
                                    aria-describedby="helpId" placeholder="Enter Name">
                            </div>

                            <div class="form-group">
                                <label for="work1">Select Work Experience 1</label>
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                    data-target="#addExperienceModal">
                                    Add Experience
                                </button>
                                <select id="work1" name="work1" class="form-control">
                                    <option value="">Please select</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                <label for="work2">Select Work Experience 2</label>
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                    data-target="#addExperienceModal2">
                                    Add Experience
                                </button>
                                <select id="work2" name="work2" class="form-control">
                                    <option value="">Please select</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="">Timeline</label>
                                <input type="text" class="form-control" name="timeline" id=""
                                    aria-describedby="helpId" placeholder="Enter Timeline">
                            </div>
                            <div class="form-group">
                                <label for="">Cost</label>
                                <input type="text" class="form-control" name="cost" id=""
                                    aria-describedby="helpId" placeholder="Enter Cost">
                            </div>
                            <div class="form-group">
                                <label for="tone">Tone</label>
                                <select class="form-control" name="tone" id="tone">
                                    <option value="">Select Tone</option>
                                    <option value="Formal">Formal</option>
                                    <option value="Professional">Professional</option>
                                    <option value="Conversational">Conversational</option>
                                    <option value="Persuasive">Persuasive</option>
                                    <option value="Confident">Confident</option>
                                    <option value="Respectful">Respectful</option>
                                    <option value="Enthusiastic">Enthusiastic</option>
                                    <option value="Informative">Informative</option>
                                    <option value="Empathetic">Empathetic</option>
                                    <option value="Direct and Clear">Direct and Clear</option>
                                    <option value="Funny">Funny</option>
                                    <option value="Business Casual">Business Casual</option>
                                    <option value="Friendly">Friendly</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="proposal_length">Length of a Proposal</label>
                                <select class="form-control" name="proposal_length" id="proposal_length">
                                    <option value="">Select Length</option>
                                    <option value="Short (Concise and focused)">Short (Concise and focused)</option>
                                    <option value="Medium-Length (More detailed)">Medium-Length (More detailed)</option>
                                    <option value="Standard (Thorough examination)">Standard (Thorough examination)</option>
                                    <option value="Long (Comprehensive and detailed)">Long (Comprehensive and detailed)
                                    </option>
                                </select>
                            </div>

                            <center>
                                <button type="submit" class="btn btn-primary">Create Promt</button>
                            </center>
                        </div>
                    </form>
                </div>



                <!-- Popup modal for adding work experience 1 -->
                <div class="modal fade" id="addExperienceModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Work Experience</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Your input fields for adding work experience go here -->

                                <form id="addExperienceForm" action="" method="POST">
                                    @csrf
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Project Title</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                aria-describedby="helpId" placeholder="Enter Project Title" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <input type="text" class="form-control" name="type" id="type"
                                                aria-describedby="helpId" placeholder="Enter Type" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <input type="text" class="form-control" name="description" id="description"
                                                aria-describedby="helpId" placeholder="Enter Description" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">URL</label>
                                            <input type="url" class="form-control" name="url" id="url"
                                                aria-describedby="helpId" placeholder="Enter URL" required>
                                        </div>
                                        {{-- <center>
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                    
                                    </center> --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary close1"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="saveBtn1">Save
                                            Experience</button>
                                    </div>
                                </form>
                                <!-- Example: -->
                                {{-- <label for="newExperience">New Experience:</label>
                                <input type="text" id="newExperience" class="form-control"> --}}
                            </div>

                        </div>
                    </div>
                </div>
                


                <div class="modal fade" id="addExperienceModal2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Work Experience</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Your input fields for adding work experience go here -->

                                <form id="addExperienceForm2" action="{{ route('work.store') }}" method="POST">
                                    @csrf
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Project Title</label>
                                        <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name"
                                                aria-describedby="helpId" placeholder="Enter Project Title" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <input type="text" class="form-control" name="type" id="type"
                                                aria-describedby="helpId" placeholder="Enter Type" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <input type="text" class="form-control" name="description" id="description"
                                                aria-describedby="helpId" placeholder="Enter Description" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">URL</label>
                                            <input type="url" class="form-control" name="url" id="url"
                                                aria-describedby="helpId" placeholder="Enter URL" required>
                                        </div>
                                     
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary close1"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="saveBtn2">Save
                                            Experience</button>
                                    </div>
                                </form>
                            
                            </div>

                        </div>
                    </div>
                </div>



            @endsection

