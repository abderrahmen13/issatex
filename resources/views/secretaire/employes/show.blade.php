@include('secretaire.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employe: {{$employe->name}}</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>
    
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body"> 
                    <strong class="text-muted p-t-30 db">Nom:</strong><h6>{{$employe->name}}</h6>
                    <strong class="text-muted p-t-30 db">Email:</strong><h6>{{$employe->email}}</h6>
                    <strong class="text-muted p-t-30 db">Address:</strong><h6>{{$employe->address}}</h6>
                    <strong class="text-muted p-t-30 db">Matricule:</strong><h6>{{$employe->matricule}}</h6>
                    <strong class="text-muted p-t-30 db">Date de recrutement:</strong><h6>{{$employe->recruitDate}}</h6>
                    <strong class="text-muted p-t-30 db">Role:</strong><h6>{{$employe->role}}</h6>
                    <strong class="text-muted p-t-30 db">Valid:</strong><h6>@if($employe->valid == 1) Oui @else Non @endif</h6>
                    <a href="/secretaire/employes/{{$employe->id}}/edit" class="btn btn-warning btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Modifier cet employe</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@include('secretaire.footer')