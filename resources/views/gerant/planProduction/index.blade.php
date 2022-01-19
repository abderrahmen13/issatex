@include('gerant.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tous les plans de production</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Plans de production DataTable</h6>
            <a href="/gerant/planProduction/create" class="btn btn-success btn-icon-split float-right">
              <span class="icon text-white-50"> <i class="fas fa-check"></i> </span> 
              <span class="text">Ajouter un plan de production</span> 
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ref</th>
                            <th>Qte planifiée</th>
                            <th>Qte fabriquée 1er choix</th>
                            <th>Qte fabriquée 2ème choix</th>
                            <th>Observation</th>
                            <th>date</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ref</th>
                            <th>Qte planifiée</th>
                            <th>Qte fabriquée 1er choix</th>
                            <th>Qte fabriquée 2ème choix</th>
                            <th>Observation</th>
                            <th>date</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($planProduction as $plan)
                        <tr>
                            <td>{{$plan->ref}}</td>
                            <td>{{$plan->qtePlanned}}</td>
                            <td>{{$plan->qteFabricated1}}</td>
                            <td>{{$plan->qteFabricated2}}</td>
                            <td>{{$plan->observation}}</td>
                            <td>{{$plan->date}}</td>
                            <td>{{$plan->status}}</td>
                            <td>
                                <a href="/gerant/planProduction/{{$plan->id}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="/gerant/planProduction/{{$plan->id}}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal{{$plan->id}}"><i class="fas fa-trash"></i></a>
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
  @foreach($planProduction as $plan)
  <div class="modal fade" id="deleteModal{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$plan->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel{{$plan->id}}">Supprimer?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">êtes-vous sûr de supprimer cet plan?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <a class="btn btn-primary" href="#" onclick="event.preventDefault(); document.getElementById('frm-delete{{$plan->id}}').submit();">Effacer</a>
          <form id="frm-delete{{$plan->id}}" action="/gerant/planProduction/{{$plan->id}}" method="POST">
            {{ csrf_field() }}
            @method('DELETE')
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@include('gerant.footer')
