@include('admin.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">ilot: {{$ilot->name}}</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>
    
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body"> 
                    <strong class="text-muted p-t-30 db">Nom:</strong><h6>{{$ilot->name}}</h6>
                    <strong class="text-muted p-t-30 db">Disponible:</strong><h6>{{$ilot->available}}</h6>
                    <strong class="text-muted p-t-30 db">Machines:</strong><ul>
                        @foreach($ilot->machines as $machine)
                        <li><h6>{{$machine->ref}}</h6></li>
                        @endforeach
                    </ul>
                    <a href="/admin/ilots/{{$ilot->id}}/edit" class="btn btn-warning btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Modifier ce ilot</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@include('admin.footer')