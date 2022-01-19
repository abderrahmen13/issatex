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
        <!-- Column -->
        <div class="col-lg-12 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body"> 
                    <strong class="text-muted p-t-30 db">Ref:</strong><h6>{{$ordreFabrication->ref}}</h6>
                    <strong class="text-muted p-t-30 db">Type:</strong><h6>{{$ordreFabrication->type}}</h6>
                    <strong class="text-muted p-t-30 db">Description:</strong><h6>{{$ordreFabrication->description}}</h6>
                    <strong class="text-muted p-t-30 db">Date:</strong><h6>{{$ordreFabrication->date}}</h6>
                    <strong class="text-muted p-t-30 db">Temps estimé:</strong><h6>{{$ordreFabrication->estimatedTime}}</h6>
                    <strong class="text-muted p-t-30 db">Prix unitaire:</strong><h6>{{$ordreFabrication->unitPrice}}</h6>
                    @if($ordreFabrication->type == "Urgent")
                    <strong class="text-muted p-t-30 db">Coût additionnel:</strong><h6>{{$ordreFabrication->additionalCost}}</h6>
                    @endif
                    <strong class="text-muted p-t-30 db">Status:</strong><h6>{{$ordreFabrication->status}}</h6>
                    <strong class="text-muted p-t-30 db">Article:</strong><h6>{{$ordreFabrication->article->ref}}</h6>
                    <a href="/client/orderFabrications/{{$ordreFabrication->id}}/edit" class="btn btn-warning btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Modifier cet order de fabrications</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@include('client.footer')