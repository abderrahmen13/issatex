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
        <div class="col-lg-12 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="/admin/machines/{{$machine->id}}" method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-md-12">Ref:</label>
                            <div class="col-md-12">
                                <input type="text" id="ref" name="ref" value="{{old('ref', $machine->ref)}}"
                                    class="form-control{{ $errors->has('ref') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Type:</label>
                            <div class="col-md-12">
                                <input type="text" id="type" name="type" value="{{old('type', $machine->type)}}"
                                    class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }} form-control-line" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Marque:</label>
                            <div class="col-md-12">
                                <input type="text" id="marque" name="marque" value="{{old('marque', $machine->marque)}}"
                                    class="form-control{{ $errors->has('marque') ? ' is-invalid' : '' }} form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Ilot</label>
                            <div class="col-sm-12">
                                <select name="ilotId" class="form-control{{ $errors->has('ilotId') ? ' is-invalid' : '' }} form-control-line" required>
                                    @foreach($ilots as $ilot)
                                        @if($ilot->id == $machine->ilotId)
                                        <option value="{{$ilot->id}}" selected>{{$ilot->name}}</option>
                                        @else
                                        <option value="{{$ilot->id}}">{{$ilot->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="submit" class="btn btn-success">Modifier la machine</button>
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
