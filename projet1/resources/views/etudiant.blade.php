
@extends("layouts.master")

@section("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Liste des étudiants</h3>
   <div>
       <div class="d-flex justify-content-end mb-4">
           <a href="{{route('etudiant.create')}}" class="btn btn-primary">Ajouter un étudiant</a>
       </div>

          <!-- pour la session alert voulez vous vraiment supprimer -->
    @if (session()->has("successDelete"))   
         <div class="alert alert-success">
             <p> {{ session()->get('successDelete')}}</p>
         </div>
    @endif

   <table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">Identifiant</th>
      <th scope="col">NOM</th>
      <th scope="col">PRENOM</th>
      <th scope="col">CLASSE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
      @foreach($liste_etudiant as $etudiant )
    <tr>
      <th scope="row"> {{ $loop->index +1 }} </th>
      <td>{{ $etudiant->nom }}</td>
      <td>{{ $etudiant->prenom }}</td>
      <td>{{ $etudiant->classe->libelle }}</td>
      <td>
          <a href="{{route('etudiant.edit', ['etudiant'=>$etudiant->id])}}" class="btn btn-info">Modifier</a>

          <a href="#" class="btn btn-danger"
          onclick="if(confirm('voulez-vous vraiment supprimer cet étudiant ?')){
          document.getElementById('form-{{$etudiant->id}}').submit()}">Supprimer</a>

          <form id="form-{{$etudiant->id}}" action="{{route('etudiant.supprimer', 
              ['etudiant'=>$etudiant->id])}}" method="post">
              @csrf
              <input type="hidden" name="_method" value="delete">

          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
    {{ $liste_etudiant->links() }}
</table>
   </div>
  </div>
@endsection