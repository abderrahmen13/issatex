@include('admin.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tous les ilots</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ilots DataTable</h6>
            <a href="/admin/ilots/create" class="btn btn-success btn-icon-split float-right">
              <span class="icon text-white-50"> <i class="fas fa-check"></i> </span> 
              <span class="text">Ajouter un ilot</span> 
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Disponible</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Disponible</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($ilots as $ilot)
                        <tr>
                            <td>{{$ilot->name}}</td>
                            @if($ilot->available == 1)
                            <td>Oui</td>
                            @else
                            <td>Nom</td>
                            @endif
                            <td>
                                <a href="/admin/ilots/{{$ilot->id}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="/admin/ilots/{{$ilot->id}}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal{{$ilot->id}}"><i class="fas fa-trash"></i></a>
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
  @foreach($ilots as $ilot)
  <div class="modal fade" id="deleteModal{{$ilot->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$ilot->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel{{$ilot->id}}">Supprimer?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">êtes-vous sûr de supprimer cet article?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <a class="btn btn-primary" href="#" onclick="event.preventDefault(); document.getElementById('frm-delete{{$ilot->id}}').submit();">Effacer</a>
          <form id="frm-delete{{$ilot->id}}" action="/admin/ilots/{{$ilot->id}}" method="POST">
            {{ csrf_field() }}
            @method('DELETE')
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@include('admin.footer')
