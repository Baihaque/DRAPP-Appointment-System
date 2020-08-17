@extends('layouts.admin')
@section('title', 'Doctors Detail')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Doctor {{ $doctor->id }}</div>
                <div class="card-body">
                    <form action="/admin/doctors/update" method="post" enctype = "multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $doctor->id }}">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <img src ="{{URL::to('/upload_images/') }}{{'/'.$doctor->picture }}" id="preview" class="img-thumbnail">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $doctor->name }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="specialism">Specialism</label>
                                            <input type="text" name="specialism" id="specialism" class="form-control" value="{{ $doctor->specialism }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="picture">Upload Picture</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="picture" accept="image/*">
                                                <label class="custom-file-label" for="customFile">{{ $doctor->picture }}</label>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="stutus" class="form-control">
                                                <option value="0" @if ($doctor->status == 0) selected="selected" @endif >Inactive</option>
                                                <option value="1" @if ($doctor->status == 1) selected="selected" @endif >Active</option>
                                            </select>
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