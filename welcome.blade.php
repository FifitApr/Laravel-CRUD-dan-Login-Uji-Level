@extends('layout1')

@section('isi1')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1></h1>

    <div class="container mt-5">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-9">
           <div class="p-3 border bg-danger bg-opacity-75" style="height: 150px">
            <a href="/guru"class="nav-link text-white fs-3 mt-4">Data Guru</a>
            </div>
          </div>
          <p>
            <div class="col-9">
                <div class="p-3 border bg-success bg-opacity-75" style="height: 150px">
                 <a href="/kelas"class="nav-link text-white fs-3 mt-4">Data Kelas</a>
                 </div>
               </div>
          </p>
          <div class="col-9">
            <div class="p-3 border bg-primary bg-opacity-75" style="height: 150px">
             <a href="/agenda"class="nav-link text-white fs-3 mt-4">Data Agenda</a>
             </div>
           </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
@endsection
