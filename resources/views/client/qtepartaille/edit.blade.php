@include('client.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order de fabrication: {{$ordreFabrication->ref}}</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    @foreach($qteParTailles as $qteParTaille)
                        {{DB::table('tailles')->where('id', $qteParTaille->tailleId)->value('name')}}: {{$qteParTaille->qte}} {{$qteParTaille->id}}
                        <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal{{$qteParTaille->id}}"><i class="fas fa-trash"></i></a><br>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>
<!-- /.container-fluid -->
  <!-- Delete Modal-->
  @foreach($qteParTailles as $qteParTaille)
  <div class="modal fade" id="deleteModal{{$qteParTaille->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$qteParTaille->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel{{$qteParTaille->id}}">Supprimer?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">êtes-vous sûr de supprimer cet article?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <a class="btn btn-primary" href="#" onclick="event.preventDefault(); document.getElementById('frm-delete{{$qteParTaille->id}}').submit();">Effacer</a>
          <form id="frm-delete{{$qteParTaille->id}}" action="/client/quantity/{{$qteParTaille->id}}?qtepartaille={{$qteParTaille->id}}" method="POST">
            {{ csrf_field() }}
            @method('DELETE')
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@include('client.footer')
