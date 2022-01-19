@include('gerant.header')

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
                              <a href="/gerant/orderFabrications/{{$ordreFabrication->id}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                              <a href="/gerant/orderFabrications/{{$ordreFabrication->id}}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
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

@include('gerant.footer')
