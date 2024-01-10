@extends('admin.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper " >
      <div class="container">
      <h1>Prompt:</h1>
      Write me an Upwork proposal, for the following job post:<br>
      "{{ isset($data['post']) ? $data['post'] : '' }}"<br>
      Client name is: {{ isset($data['c_name']) ? $data['c_name'] : '' }}<br>
      @if($data1 || $data2)
      Use the following as my relevant work experience and relate it to the job post.<br>
      @if($data1)
      "Project Name: {{ $data1->name }}   Project Type: {{ $data1->type }}   Project Description: {{ $data1->description }}   Project URL: {{ $data1->url }}"<br>
      @endif
      @if($data2)
      "Project Name: {{ $data2->name }}   Project Type: {{ $data2->type }}   Project Description: {{ $data2->description }}   Project URL: {{ $data2->url }}"<br>
      @endif
      @endif
      Estimated timeline from my end is: {{ isset($data['timeline']) ? $data['timeline'] : '' }}<br>
      Estimated cost is: {{ isset($data['cost']) ? $data['cost'] : '' }}<br>
      Write the proposal in {{ isset($data['tone']) ? $data['tone'] : '' }} tone.
    </div>
    </div>
  @endsection
