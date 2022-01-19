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
        <div class="col-lg-12 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="/secretaire/employes/{{$employe->id}}" method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-md-12">Name:</label>
                            <div class="col-md-12">
                                <input type="text" id="name" name="name" value="{{old('name', $employe->name)}}"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Email:</label>
                            <div class="col-md-12">
                                <input type="email" id="email" name="email" value="{{old('email', $employe->email)}}"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-line" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Address:</label>
                            <div class="col-md-12">
                                <input type="text" id="address" name="address" value="{{old('address', $employe->address)}}"
                                    class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Matricule:</label>
                            <div class="col-md-12">
                                <input type="text" id="matricule" name="matricule" value="{{old('matricule', $employe->matricule)}}"
                                    class="form-control{{ $errors->has('matricule') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Categorie:</label>
                            <div class="col-md-12">
                                <input type="text" id="categorie" name="categorie" value="{{old('categorie', $employe->categorie)}}"
                                    class="form-control{{ $errors->has('categorie') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Date de recrutement:</label>
                            <div class="col-md-12">
                                <input type="date" id="recruitDate" name="recruitDate" value="{{old('recruitDate', $employe->recruitDate)}}"
                                    class="form-control{{ $errors->has('recruitDate') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Valid</label>
                            <div class="col-sm-12">
                                <select name="valid" class="form-control{{ $errors->has('valid') ? ' is-invalid' : '' }} form-control-line" required>
                                @if($employe->valid == 1)
                                    <option value="1" selected>Oui</option>
                                    <option value="0">Non</option>
                                @else
                                    <option value="1">Oui</option>
                                    <option value="0"selected >Non</option>
                                @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="submit" class="btn btn-success">Modifier l'employe</button>
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

@include('secretaire.footer')
