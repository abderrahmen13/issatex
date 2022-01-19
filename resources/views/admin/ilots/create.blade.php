@include('admin.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajouter un ilots</h1>
        <a href="#" download class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> télécharger cette page</a>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="/admin/ilots" method="POST">
                        {{ csrf_field() }}                       
                        <div class="form-group">
                            <label class="col-md-12">Nom:</label>
                            <div class="col-md-12">
                                <input type="text" id="name" name="name" value="{{old('name')}}"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Disponible</label>
                            <div class="col-sm-12">
                                <select name="available" class="form-control{{ $errors->has('available') ? ' is-invalid' : '' }} form-control-line" required>
                                    <option value="1" selected>Oui</option>
                                    <option value="0">Non</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="submit" class="btn btn-success">Ajouter l'ilot</button>
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

@include('admin.footer')
