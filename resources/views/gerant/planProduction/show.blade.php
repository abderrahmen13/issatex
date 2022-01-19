@include('gerant.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Plan de production: {{$planProduction->ref}}</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>
    
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body"> 
                    <strong class="text-muted p-t-30 db">Ref:</strong><h6>{{$planProduction->ref}}</h6>
                    <strong class="text-muted p-t-30 db">Ilot:</strong><h6>{{$planProduction->ilot->name}}</h6>
                    <strong class="text-muted p-t-30 db">Order de fabrication:</strong><h6>{{$planProduction->orderFabrication->ref}}</h6>
                    <strong class="text-muted p-t-30 db">Order de fabrication:</strong><h6>{{$planProduction->orderFabrication->description}}</h6>
                    <strong class="text-muted p-t-30 db">Temps unit:</strong><h6>{{$planProduction->orderFabrication->estimatedTime}}</h6>
                    <strong class="text-muted p-t-30 db">Qte planifiée:</strong><h6>{{$planProduction->qtePlanned}}</h6>
                    <strong class="text-muted p-t-30 db">Qte fabriquée 1er choix:</strong><h6>{{$planProduction->qteFabricated1}}</h6>
                    <strong class="text-muted p-t-30 db">Qte fabriquée 2ème choix:</strong><h6>{{$planProduction->qteFabricated2}}</h6>
                    <strong class="text-muted p-t-30 db">Observation:</strong><h6>{{$planProduction->observation}}</h6>
                    <a href="/gerant/planProduction/{{$planProduction->id}}/edit" class="btn btn-warning btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Modifier ce plan de production</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@include('gerant.footer')