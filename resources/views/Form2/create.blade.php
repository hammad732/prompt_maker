<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <div class="container">
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
                <label for="">Job Post</label>
                <input type="text" class="form-control" name="post" id="" aria-describedby="helpId" placeholder="Enter Post">
              </div>

              <div class="form-group">
                <label for="">Client Name</label>
                <input type="text" class="form-control" name="c_name" id="" aria-describedby="helpId" placeholder="Enter Name">
              </div>

              <div class="form-group">
                <label for="work1">Select Work Experience 1</label>
                <select id="work1" name="work1" class="form-control">
                  @foreach ($data as $item)
                  <option>{{$item->name }}</option>
                  @endforeach
                </select>

                <label for="work2">Select Work Experience 2</label>
                <select id="work2" name="work2" class="form-control">
                  @foreach ($data as $item)
                  <option>{{$item->name }}</option>
                  @endforeach
                </select>


                <div class="form-group">
                  <label for="">Timeline</label>
                  <input type="text" class="form-control" name="timeline" id="" aria-describedby="helpId" placeholder="Enter Timeline">
                </div>
                <div class="form-group">
                  <label for="">Cost</label>
                  <input type="text" class="form-control" name="cost" id="" aria-describedby="helpId" placeholder="Enter Cost">
                </div>
                <div class="form-group">
                  <label for="">Tone</label>
                  <input type="text" class="form-control" name="tone" id="" aria-describedby="helpId" placeholder="Enter Tone">
                </div>
                <center>
                  <!-- <a href="route(url('Form2.show'))"type="submit" class="btn btn-primary">Submit</a> -->
                  <button type="submit" class="btn btn-primary">Submit</button>
                </center>
              </div>
          </form>
        </div>




</body>

</html>