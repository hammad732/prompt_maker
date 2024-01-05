<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      margin-top: 50px;
      background-color: #f4f4f4;
      line-height: 2em;
    }

    .container {
      padding-top: 50px;
      padding-bottom: 50px;
      margin-top: 20px;
      width: 80%;
      margin: auto;
      overflow: hidden;
    }

    div {
      
      background: #fff;
      color: #333;
      margin: 20px 0;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px #ccc;
    }

    strong {
      color: #5a5a5a;
      font-size: 1em;
    }

    p {
      line-height: 2em;
    }
  </style>
</head>

<body>
  <div class="container">
    <div>

    <center><h1><span>Job Post:</span><span>{{ isset($data['post']) ? $data['post'] : '' }}</span></h1></center>
      Client Name is:<b>{{ isset($data['c_name']) ? $data['c_name'] : '' }}</b>  &nbsp;&nbsp; Work Experience 1: &nbsp; Name:{{ $data1 ? $data1->name : '' }} &nbsp; Type:{{ $data1 ? $data1->type : ''}} &nbsp; Description:{{ $data1 ? $data1->description : ''}} &nbsp; URL:{{ $data1 ? $data1->url : ''}} &nbsp; &  &nbsp; Work Experience 2:&nbsp;  Name:{{ $data2 ? $data2->name : '' }} &nbsp; Type:{{ $data2 ? $data2->type : ''}} &nbsp; Description:{{ $data2 ? $data2->description : ''}} &nbsp; URL:{{ $data2 ? $data2->url : ''}} &nbsp;&nbsp; Estimated Timeline:{{ isset($data['timeline']) ? $data['timeline'] : '' }}&nbsp;&nbsp; Estimated Cost:<b> {{isset($data['cost']) ? $data['cost'] : '' }}</b>&nbsp;&nbsp; Tone:{{isset($data['tone'])? $data['tone'] : ''}}


    </div>
  </div>
</body>

</html>