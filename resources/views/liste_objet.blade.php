@include('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@include('navbar3')



<body style="">
 <div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center ">
        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <center>{{ session('success') }}</center>
                            </div>
                        @endif
      <div class="cold-md-2 ml-6 ">
       <div class="card " style="" >

    <table id="myTable" class="table"  style="margin-right:50px;margin-left:150px;width: 75% !important;">
        <thead>
            <tr>
            	<th>Nom</th>
                <th>Categorie</th>
                <th>Etat</th>
                <th>Modify</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($Objets as $objet)
                <tr>
                    <td>{{ $objet->nom_objet }}</td>
                    <td>{{ $objet->categorie->nom_categorie }}</td>
                    <td>{{ $objet->etat_c }}</td>
                    <td><form method="GET" action="{{ route('showModObjetForm', ['id' => $objet->id]) }}">
    <button class="btn btn-dark btn-sm w-60" type="submit">Modifier</button>
</form>
</td>
<td>
<form action="{{ route('Delete', ['id' => $objet->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-orange btn-sm w-60" type="submit">Supprimer</button>
</form>
</td>
                </tr>
            @endforeach
 		</tbody>
 	</table>
</div>
</div>
</div>
</div>

@include('footer')