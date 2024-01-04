<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    .card {
      margin: 2em 0;
      padding: 1em;
    }

    .card-header {
      font-size: 1.5em;
      font-weight: bold;
    }

    .btn-primary,
    .btn-danger {
      margin: 0.5em;
    }
  </style>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <div class="container justify-content-center">
    <div class="row justify-content-center">
      <div class="card">
        <div class="card-header text-center">View</div>
        <table class="table table-striped table-responsive table-hover table-bordered table-condensed">
          <thead>
            <tr>
              <th>Sr</th>
              <th>Job Post</th>
              <th>Client Name</th>
              <th >Work Experience 1 </th>
              <th >Work Experience 2</th>
              <th>TimeLine</th>
              <th>Cost</th>
              <th>Tone</th>
            </tr>
          </thead>
          <tbody>
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif
            @foreach ($data as $data)
            @php
            $work = explode("||", $data->work1);
            $work2 = explode("||", $data->work2);
            @endphp
          
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->post }}</td>
              
              <td>{{ $data->c_name }}</td>
              
              <td>
                @foreach($work as $key => $work11)
                  @if($key == 0 )
                  Title: 
                  @elseif($key == 1 )
                  Type: 
                  @endif
              {{  $work11 }} </br>
              @endforeach
              </td>
              <td> @foreach($work2 as $key => $work12)
                  @if($key == 0 )
                  Title: 
                  @elseif($key == 1 )
                  Type: 
                  @endif
              {{  $work12 }} </br>
              @endforeach</td>
              <td>{{ $data->timeline }}</td>
              <td>{{ $data->cost }}</td>
              <td>{{ $data->tone }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <a name="" id="" class="btn btn-primary" href="{{ route('prompt.create') }}" role="button">Add More</a>
        <!-- @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif -->
      </div>
    </div>
  </div>
</body>

</html>










<!--  -->