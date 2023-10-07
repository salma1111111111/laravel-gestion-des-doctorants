@extends('doctorants.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>gestion statistique</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('doctorants.create') }}"> Create New doctorant</a>
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
        @foreach ($doctorants as $doctorant)
        <tr>
            <td>{{ $doctorant->id }}</td>
            <td>{{ $doctorant->nom }}</td>
            <td>{{ $doctorant->prenom }}</td>
            <td>{{ $doctorant->prof->nom }}</td>
            <td>
                <form action="{{ route('doctorants.destroy',$doctorant->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('doctorants.show',$doctorant->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('doctorants.edit',$doctorant->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
   
      
@endsection