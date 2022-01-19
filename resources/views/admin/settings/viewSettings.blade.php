@include('admin.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Réglages</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>
    
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body"> 
                    <strong class="text-muted p-t-30 db">Logo:</strong><img src="{{asset('')}}{{$setting->logo1}}" width="20%"><hr>
                    <strong class="text-muted p-t-30 db">Nom de site:</strong><h6>{{$setting->name_fr}}</h6> 
                    <strong class="text-muted p-t-30 db">Description en français:</strong><h6>{{$setting->description_fr}}</h6> 
                    <strong class="text-muted p-t-30 db">Description en anglais:</strong><h6>{{$setting->description_en}}</h6> 
                    <strong class="text-muted p-t-30 db">Email:</strong><h6>{{$setting->email}}</h6> 
                    <strong class="text-muted p-t-30 db">Adresse (France) (Le siège social):</strong><h6>{{$setting->address}}</h6> 
                    <strong class="text-muted p-t-30 db">Adresse (France) (Bureau secondaire):</strong><h6>{{$setting->address2}}</h6> 
                    <strong class="text-muted p-t-30 db">Adresse (Tunisie) (Le siège social):</strong><h6>{{$setting->address_tn}}</h6> 
                    <strong class="text-muted p-t-30 db">Adresse (Tunisie) (Bureau secondaire):</strong><h6>{{$setting->address_tn2}}</h6> 
                    <strong class="text-muted p-t-30 db">Heures d'ouverture (Lun-ven):</strong><h6>{{$setting->date}}</h6> 
                    <strong class="text-muted p-t-30 db">heures d'ouverture (Sam-dim):</strong><h6>{{$setting->date2}}</h6> 
                    <strong class="text-muted p-t-30 db">N° téléphone (France):</strong><h6>{{$setting->phone}}</h6> 
                    <strong class="text-muted p-t-30 db">N° téléphone 2 (France):</strong><h6>{{$setting->phone2}}</h6> 
                    <strong class="text-muted p-t-30 db">N° téléphone (tunisie):</strong><h6>{{$setting->phone_tn}}</h6> 
                    <strong class="text-muted p-t-30 db">N° téléphone 2 (tunisie):</strong><h6>{{$setting->phone_tn2}}</h6>
                    <strong class="text-muted p-t-30 db">Facebook:</strong><h6>{{$setting->facebook}}</h6> 
                    <strong class="text-muted p-t-30 db">Twitter:</strong><h6>{{$setting->twitter}}</h6> 
                    <strong class="text-muted p-t-30 db">Instagram:</strong><h6>{{$setting->instagram}}</h6> 
                    <strong class="text-muted p-t-30 db">Google+:</strong><h6>{{$setting->google}}</h6> 
                    <strong class="text-muted p-t-30 db">Linkedin:</strong><h6>{{$setting->linkedin}}</h6> 
                    <a href="/admin/settings/edit" class="btn btn-warning btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Modifier les paramètres</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@include('admin.footer')
