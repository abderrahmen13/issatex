@include('admin.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Machine: {{$machine->ref}}</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>
    
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body"> 
                    <strong class="text-muted p-t-30 db">Ref:</strong><h6>{{$machine->ref}}</h6>
                    <strong class="text-muted p-t-30 db">Type:</strong><h6>{{$machine->type}}</h6>
                    <strong class="text-muted p-t-30 db">Marque:</strong><h6>{{$machine->marque}}</h6>
                    <strong class="text-muted p-t-30 db">Ilot:</strong><h6>{{$machine->ilot->name}}</h6>
                    <a href="/admin/machines/{{$machine->id}}/edit" class="btn btn-warning btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Modifier cette machine</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@include('admin.footer')