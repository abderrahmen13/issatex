@include('gerant.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tous les articles</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Articles DataTable</h6>
            <a href="/gerant/articles/create" class="btn btn-success btn-icon-split float-right">
              <span class="icon text-white-50"> <i class="fas fa-check"></i> </span> 
              <span class="text">Ajouter un article</span> 
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ref</th>
                            <th>Designation</th>
                            <th>Composition</th>
                            <th>Disponible</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Designation</th>
                            <th>Composition</th>
                            <th>Disponible</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{$article->ref}}</td>
                            <td>{{$article->designation}}</td>
                            <td>{{$article->composition}}</td>
                            @if($article->available == 1)
                            <td>Oui</td>
                            @else
                            <td>Nom</td>
                            @endif
                            <td>
                                <a href="/gerant/articles/{{$article->id}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="/gerant/articles/{{$article->id}}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal{{$article->id}}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
  <!-- Delete Modal-->
  @foreach($articles as $article)
  <div class="modal fade" id="deleteModal{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$article->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel{{$article->id}}">Supprimer?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">êtes-vous sûr de supprimer cet article?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <a class="btn btn-primary" href="#" onclick="event.preventDefault(); document.getElementById('frm-delete{{$article->id}}').submit();">Effacer</a>
          <form id="frm-delete{{$article->id}}" action="/gerant/articles/{{$article->id}}" method="POST">
            {{ csrf_field() }}
            @method('DELETE')
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@include('gerant.footer')
