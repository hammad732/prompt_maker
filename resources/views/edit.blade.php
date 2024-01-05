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
                    <div class="card-header">Update</div>
                  <form action="{{ route('work.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="card-body">
                     <div class="form-group">
                       <label for="">Project Title</label>
                       <input type="text"
                         class="form-control" name="name" id="" aria-describedby="helpId" placeholder="" value="{{ $data->name }}">
                     </div>

                     <div class="form-group">
                       <label for="">Type</label>
                       <input type="text"
                         class="form-control" name="type" id="" aria-describedby="helpId" placeholder="" value="{{ $data->type }}">
                     </div>

                     <div class="form-group">
                       <label for="">Description</label>
                       <input type="text"
                         class="form-control" name="description" id="" aria-describedby="helpId" placeholder="" value="{{ $data->description }}">
                     </div>
                     <div class="form-group">
                       <label for="">URL</label>
                       <input type="text"
                         class="form-control" name="url" id="" aria-describedby="helpId" placeholder="" value="{{ $data->url }}">
                     </div>
                    <center>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </center>
                    </div>
                </form>
    </div>




  </body>
</html>
