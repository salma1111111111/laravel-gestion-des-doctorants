@extends('profs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>gestion statistique</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('profs.create') }}"> Create New prof</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>nom</th>
            <th>prenom</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($profs as $prof)
        <tr>
            <td>{{ $prof->id  }}</td>
            <td>{{ $prof->nom }}</td>
            <td>{{ $prof->prenom }}</td>
            <td>
                <form action="{{ route('profs.destroy',$prof->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('profs.show',$prof->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('profs.edit',$prof->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
   
      
@endsection