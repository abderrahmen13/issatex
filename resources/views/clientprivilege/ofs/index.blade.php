@include('clientprivilege.header')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tous les Order de fabrications</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">OFs DataTable</h6>
            <a href="/clientprivilege/orderFabrications/create" class="btn btn-success btn-icon-split float-right">
              <span class="icon text-white-50"> <i class="fas fa-check"></i> </span> 
              <span class="text">Ajouter un order de fabrication</span> 
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th>Type</th>
                          <th>Ref</th>
                          <th>Description</th>
                          <th>Date</th>
                          <th>Prix unitaire</th>
                          <th>status</th>
                          <th>Quantité</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <th>Type</th>
                          <th>Ref</th>
                          <th>Description</th>
                          <th>Date</th>
                          <th>Prix unitaire</th>
                          <th>status</th>
                          <th>Quantité</th>
                          <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($ordreFabrications as $ordreFabrication)
                        <tr>
                          <td>{{$ordreFabrication->type}}</td>
                          <td>{{$ordreFabrication->ref}}</td>
                          <td>{{$ordreFabrication->description}}</td>
                          <td>{{$ordreFabrication->date}}</td>
                          <td>{{$ordreFabrication->unitPrice}}</td>
                          <td>{{$ordreFabrication->status}}</td>
                          <td>
                            @if($ordreFabrication->tailles()->count() > 0)
                              @foreach(DB::table('qte_par_tailles')->where('ofId', $ordreFabrication->id)->get() as $tailles)
                              {{DB::table('tailles')->where('id', $tailles->tailleId)->value('name')}}: {{$tailles->qte}} <br>
                              @endforeach
                            @else
                              0
                            @endif
                          </td>
                          <td>
                              <a href="/clientprivilege/quantity/create?of={{$ordreFabrication->id}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-plus"></i></a>
                              <a href="/clientprivilege/orderFabrications/{{$ordreFabrication->id}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                              <a href="/clientprivilege/orderFabrications/{{$ordreFabrication->id}}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                              @if($ordreFabrication->status != "Confirmé")
                              <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal{{$ordreFabrication->id}}"><i class="fas fa-trash"></i></a>
                              @endif
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
@foreach($ordreFabrications as $ordreFabrication)
  <div class="modal fade" id="deleteModal{{$ordreFabrication->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$ordreFabrication->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel{{$ordreFabrication->id}}">Supprimer?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">êtes-vous sûr de supprimer cet ordreFabrication?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <a class="btn btn-primary" href="#" onclick="event.preventDefault(); document.getElementById('frm-delete{{$ordreFabrication->id}}').submit();">Effacer</a>
          <form id="frm-delete{{$ordreFabrication->id}}" action="/clientprivilege/orderFabrications/{{$ordreFabrication->id}}" method="POST">
            {{ csrf_field() }}
            @method('DELETE')
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@include('clientprivilege.footer')
