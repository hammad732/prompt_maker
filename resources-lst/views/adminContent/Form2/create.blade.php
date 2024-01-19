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
          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif
          <div class="card-body">
            <div class="form-group">
              <label for="">Job Title</label>
<input type="text" class="form-control" name="post" id="" value="{!! request('title') !!}" aria-describedby="helpId" placeholder="Enter Title">
            </div>
            <div class="form-group">
              <label for="">Job Description</label>
<textarea class="form-control" name="job_description" id="" aria-describedby="helpId" placeholder="Enter Description">{!! request('description') !!}</textarea>


            </div>

            <div class="form-group">
              <label for="">Client Name</label>
              <input type="text" class="form-control" name="c_name" id="" aria-describedby="helpId" placeholder="Enter Name">
            </div>

            <div class="form-group">
              <label for="work1">Select Work Experience 1</label>
              <select id="work1" name="work1" class="form-control">
                <option value="">Please select</option>
                @foreach ($data as $item)
                <option value="{{ $item->id }}">{{$item->name }}</option>
                @endforeach
              </select>

              <label for="work2">Select Work Experience 2</label>
              <select id="work2" name="work2" class="form-control">
                <option value="">Please select</option>
                @foreach ($data as $item)
                <option value="{{ $item->id }}">{{$item->name }}</option>
                @endforeach
              </select>

            </div>

            <div class="form-group">
              <label for="">Timeline</label>
              <input type="text" class="form-control" name="timeline" id="" aria-describedby="helpId" placeholder="Enter Timeline">
            </div>
            <div class="form-group">
              <label for="">Cost</label>
              <input type="text" class="form-control" name="cost" id="" aria-describedby="helpId" placeholder="Enter Cost">
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
    <option value="Long (Comprehensive and detailed)">Long (Comprehensive and detailed)</option>
  </select>
</div>
          
            <center>
              <button type="submit" class="btn btn-primary">Create Promt</button>
            </center>
          </div>
        </form>
      </div>


      @endsection