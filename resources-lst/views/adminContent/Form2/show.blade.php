@extends('admin.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper " >
        
      <div class="container">
         

           <button id="copyButton" style="float:right;margin-top:20px" class="btn btn-primary" onclick="copyContent()">Copy</button>
            <div id="copyContent">
@if($data)
<h1>Prompt:</h1>
Write me an Upwork proposal, for the following job post:<br>
"{!! isset($data['post']) ? $data['post'] : '' !!}"<br>
Job Description: {!! isset($data['job_description']) ? $data['job_description'] : '' !!}<br>
@if(isset($data['c_name']) && $data['c_name'])
Client name is: {{ $data['c_name'] }}<br>
@endif
@endif
@if($data1 || $data2)
Use the following as my relevant work experience and relate it to the job post.<br>
@if($data1)
"Project Name: {{ $data1->name }}   Project Type: {{ $data1->type }}   Project Description: {{ $data1->description }}   Project URL: {{ $data1->url }}"<br>
@endif
@if($data2)
"Project Name: {{ $data2->name }}   Project Type: {{ $data2->type }}   Project Description: {{ $data2->description }}   Project URL: {{ $data2->url }}"<br>
@endif
@endif
@if($data)
@if(isset($data['timeline']) && $data['timeline'])
Estimated timeline from my end is: {{ $data['timeline'] }}<br>
@endif
@if(isset($data['cost']) && $data['cost'])
Estimated cost is: {{ $data['cost'] }}<br>
@endif
@if(isset($data['tone']) && $data['tone'])
Write the proposal in {{ $data['tone'] }} tone.<br>
@endif
@if(isset($data['proposal_length']) && $data['proposal_length'])
Length of the proposal is {{ $data['proposal_length'] }}.<br>
@endif
@endif
Mention that I am a Top Rated Freelancer on Upwork with a Perfect Job Success Score of 100%, this highlights my dedication to my projects and the satisfaction from my clients.<br>
My Name is Majid Fazal
</div>
</div>
</div>


    
  
  @endsection
