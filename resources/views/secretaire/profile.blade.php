@include('secretaire.header')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>

    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="m-t-30" style="text-align: center;"> <img src="/images/user.png" class="rounded-circle" width="150" />
                        <h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
                        <h6 class="card-subtitle">{{Auth::user()->role}}</h6>
                    </div>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body"> <small class="text-muted">Adresse email</small>
                    <h6>{{Auth::user()->email}}</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="/secretaire/profile" method="POST">
                    {{ csrf_field() }}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="col-md-12">Nom complet</label>
                            <div class="col-md-12">
                                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" value="{{Auth::user()->email}}" class="form-control form-control-line" name="email" id="example-email" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Mot de passe</label>
                            <div class="col-md-12">
                                <input type="password" name="password" placeholder="Mot de passe" class="form-control form-control-line" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Confirmer le mot de passe</label>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" name="password" placeholder="Confirmer le mot de passe" class="form-control form-control-line" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">mettre à jour le profil</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>

@include('secretaire.footer')
