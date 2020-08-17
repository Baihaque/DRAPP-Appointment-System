@extends('layouts.admin')
@section('title', 'Doctors Add')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Add Doctor</div>
                <div class="card-body">
                    <form action="/admin/doctors/store" method="post" enctype = "multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <img src="https://placehold.it/150x200" id="preview" class="img-thumbnail">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="specialism">Specialism</label>
                                            <input type="text" name="specialism" id="specialism" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="picture">Upload Picture</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="picture" accept="image/*">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" name="status" id="status" class="form-control" value="Active" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info"><span class="cil-save btn-icon mr-2"></span>Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection

@section('javascript')
<script>
    $(document).on("click", ".browse", function () {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $(".custom-file-label").html(fileName);

        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection