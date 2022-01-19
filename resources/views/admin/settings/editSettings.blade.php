@include('admin.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Settings</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>

    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="/admin/settings/edit" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-12">Logo:</label>
                            <div class="col-md-12">
                                <img src="{{asset('')}}{{$setting->logo1}}" style=" width: 200px; ">
                                <input type="file" id="logo1" name="logo1"
                                    class="form-control{{ $errors->has('logo1') ? ' is-invalid' : '' }} form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Nom de site:</label>
                            <div class="col-md-12">
                                <input type="text" id="name_fr" name="name_fr" value="{{$setting->name_fr}}"
                                    class="form-control{{ $errors->has('name_fr') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Description en français:</label>
                            <div class="col-md-12">
                                <textarea id="description_fr" name="description_fr" rows="6" 
                                    class="form-control{{ $errors->has('description_fr') ? ' is-invalid' : '' }} form-control-line" required>{{$setting->description_fr}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Description en anglais:</label>
                            <div class="col-md-12">
                                <textarea id="description_en" name="description_en" rows="6" 
                                    class="form-control{{ $errors->has('description_en') ? ' is-invalid' : '' }} form-control-line" required>{{$setting->description_en}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Email:</label>
                            <div class="col-md-12">
                                <input type="email" id="email" name="email" value="{{$setting->email}}"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Adresse (Le siège social) (France):</label>
                            <div class="col-md-12">
                                <input type="text" id="address" name="address" value="{{$setting->address}}"
                                    class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Adresse (Bureau secondaire) (France):</label>
                            <div class="col-md-12">
                                <input type="text" id="address2" name="address2" value="{{$setting->address2}}"
                                    class="form-control{{ $errors->has('address2') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Adresse (Le siège social) (Tunisie):</label>
                            <div class="col-md-12">
                                <input type="text" id="address_tn" name="address_tn" value="{{$setting->address_tn}}"
                                    class="form-control{{ $errors->has('address_tn') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Adresse (Bureau secondaire) (Tunisie):</label>
                            <div class="col-md-12">
                                <input type="text" id="address_tn2" name="address_tn2" value="{{$setting->address_tn2}}"
                                    class="form-control{{ $errors->has('address_tn2') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Heures d'ouverture (Lun-ven):</label>
                            <div class="col-md-12">
                                <input type="text" id="date" name="date" value="{{$setting->date}}"
                                    class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">heures d'ouverture (Sam-dim):</label>
                            <div class="col-md-12">
                                <input type="text" id="date2" name="date2" value="{{$setting->date2}}"
                                    class="form-control{{ $errors->has('date2') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">N° téléphone (France):</label>
                            <div class="col-md-12">
                                <input type="text" id="phone" name="phone" value="{{$setting->phone}}"
                                    class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">N° téléphone 2 (France):</label>
                            <div class="col-md-12">
                                <input type="text" id="phone2" name="phone2" value="{{$setting->phone2}}"
                                    class="form-control{{ $errors->has('phone2') ? ' is-invalid' : '' }} form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">N° téléphone (Tunisie):</label>
                            <div class="col-md-12">
                                <input type="text" id="phone_tn" name="phone_tn" value="{{$setting->phone_tn}}"
                                    class="form-control{{ $errors->has('phone_tn') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">N° téléphone 2 (Tunisie):</label>
                            <div class="col-md-12">
                                <input type="text" id="phone_tn2" name="phone_tn2" value="{{$setting->phone_tn2}}"
                                    class="form-control{{ $errors->has('phone_tn2') ? ' is-invalid' : '' }} form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Facebook:</label>
                            <div class="col-md-12">
                                <input type="url" id="facebook" name="facebook" value="{{$setting->facebook}}"
                                    class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }} form-control-line"  placeholder="https://..." >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Twitter:</label>
                            <div class="col-md-12">
                                <input type="url" id="twitter" name="twitter" value="{{$setting->twitter}}"
                                    class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }} form-control-line" placeholder="https://...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Instagram:</label>
                            <div class="col-md-12">
                                <input type="url" id="instagram" name="instagram" value="{{$setting->instagram}}"
                                    class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }} form-control-line" placeholder="https://..." >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Google+:</label>
                            <div class="col-md-12">
                                <input type="url" id="google" name="google" value="{{$setting->google}}"
                                    class="form-control{{ $errors->has('google') ? ' is-invalid' : '' }} form-control-line" placeholder="https://..." >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Linkedin:</label>
                            <div class="col-md-12">
                                <input type="url" id="linkedin" name="linkedin" value="{{$setting->linkedin}}"
                                    class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }} form-control-line" placeholder="https://..." required>
                            </div>
                        </div>
                        @foreach ($errors->all() as $error)
                            <div class="card mb-4 py-3 border-bottom-danger"><div class="card-body">{{ $error }}</div></div>
                        @endforeach
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="submit" class="btn btn-success">mettre à jour les paramètres</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>
<!-- /.container-fluid -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@if (session('success'))
    <script>swal("{{trans('app.Success!')}}", "{{session('success')}}", "success");</script>
@endif

@include('admin.footer')
