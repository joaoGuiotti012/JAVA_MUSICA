@extends('layouts.app')


@section('content')

@if (session('success'))
<div id="alert" class="alert alert-success">
    <p>{{ session('success') }} </p>
</div>
@endif
@if (session('primary'))
    <div id="alert" class="alert alert-primary">
        <p>{{ session('primary') }}  </p>
    </div>
@endif


    <div class="container">

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($ramais as $ls)
                 <tr>
                <th scope="row">1</th>
                <td>Mark</td>
            
              </tr>
            @endforeach
             
            </tbody>
          </table>


    </div>



@endsection