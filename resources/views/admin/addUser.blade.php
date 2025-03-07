@extends('layouts.header')

@section('title')
    @parent
    JFS | Add User
@endsection

<link href="{{ asset('theme') }}/style.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="{{ asset('theme') }}/style.css" rel="stylesheet" />


@section('content')
    @parent
    <div id="content">
        <div class="container-fluid">
             <div class="container"> 
                <div class="row mb-3">
                </div>
                <form id="createJix">
                    @csrf
                    <!-- Title -->
                    <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row mt-3">
                        <h2 class="h5 mb-3 mb-lg-0"><a href="#" class="text-muted"><i class="bi bi-arrow-left-square me-2"></i></a> Create New JiX</h2>

                        <div class="hstack gap-3">
                            <button class="btn btn-light btn-sm btn-icon-text"><i class="bi bi-x"></i> <span
                                    class="text">Cancel</span></button>
                            {{-- <button type="submit" class="btn btn-primary btn-sm btn-icon-text"><i class="bi bi-save"></i> <span class="text">Save</span></button> --}}
                            <input type="submit" class="btn btn-primary btn-sm btn-icon-text" value="Save">
                        </div>
                    </div>


                    <input type="hidden" name="creator_id" value=" {{ Session::get('user_id') }}" />
                    <input type="hidden" name="lat" id="latitude" value="" />
                    <input type="hidden" name="lng" id="longitude" value="" />

                    <!-- Main content -->
                    <div class="row">
                        <!-- Left side -->
                        <div class="col-lg-8">
                            <!-- Basic information -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="h6 mb-4">Basic information</h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name of this JiX</label>
                                                <input type="text" class="form-control" name="title"
                                                    placeholder="Name of this JiX" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Sub-headline</label>
                                                <textarea name="subHeading" class="form-control" rows="2" style="resize:none" maxlength="250"
                                                    placeholder="Complete the notification message with a sub-headline" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Start Date & Time</label>
                                                <input type="datetime-local" class="form-control" id="sdate"
                                                    name="sdate" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">End Date & Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="end_date" id="end_date" /> No Expiration Date</label>
                                                <input type="datetime-local" class="form-control" id="edate" name="edate">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           

                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="map" class="google-map jumbotron"></div>
                                </div>
                            </div>


                            <!--Jix links -->
                            <div class="card mb-4" style="padding:3%">
                                <div class="row">
                                    <h3 class="h6 mb-4">Link information</h3>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">1st JiX Display link Name</label>
                                            <input type="text" class="form-control jixname1" name="jixname1"
                                                placeholder="1st JiX link Display Name">
                                            <span class="text-danger error-text jixname1_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">1st JiX link URL</label>
                                            <input type="url" class="form-control jixlink1" name="jixlink1"
                                                placeholder="1st Jix link URL">
                                            <span class="text-danger error-text jixlink1_err"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">2nd JiX Display link Name</label>
                                            <input type="text" class="form-control jixname2" name="jixname2"
                                                placeholder="2nd JiX link Display Name">
                                            <span class="text-danger error-text jixname2_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">2nd JiX link URL</label>
                                            <input type="url" class="form-control jixlink2" name="jixlink2"
                                                placeholder="2nd Jix link URL">
                                            <span class="text-danger error-text jixlink2_err"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">3rd JiX Display link Name</label>
                                            <input type="text" class="form-control jixname3" name="jixname3"
                                                placeholder="3rd JiX link Display Name">
                                            <span class="text-danger error-text jixname3_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">3rd JiX link URL</label>
                                            <input type="url" class="form-control jixlink3" name="jixlink3"
                                                placeholder="3rd Jix link URL">
                                            <span class="text-danger error-text jixlink3_err"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- social link --}}
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="h6">Social media links</h3>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="{{ asset('theme') }}/instagram.png" width="35px"
                                                height="35px" />
                                        </div>
                                        <div class="col-md-5">
                                            <input type="url" class="form-control insta" name="instagram_link"
                                                placeholder="Instagram link">
                                            <span class="text-danger error-text insta_err"></span>
                                        </div>

                                        <div class="col-md-1">
                                            <img src="{{ asset('theme') }}/facebook.png" width="35px" height="35px" />
                                        </div>
                                        <div class="col-md-5">
                                            <input type="url" class="form-control face" name="fb_link"
                                                placeholder="Facebook link">
                                            <span class="text-danger error-text face_err"></span>
                                        </div>
                                    </div>


                                    <div class="row mt-1">
                                        <div class="col-md-1">
                                            <img src="{{ asset('theme') }}/twitter.png" width="36px" height="35px" />
                                        </div>
                                        <div class="col-md-5">
                                            <input type="url" class="form-control twit" name="twitter_link"
                                                placeholder="Twitter link">
                                            <span class="text-danger error-text twit_err"></span>
                                        </div>

                                        <div class="col-md-1">
                                            <img src="{{ asset('theme') }}/youtube_icon.png" width="35px"
                                                height="35px" />
                                        </div>
                                        <div class="col-md-5">
                                            <input type="url" class="form-control yout" name="youtube_link"
                                                placeholder="Youtube link">
                                            <span class="text-danger error-text yout_err"></span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <!-- Right side -->
                        <div class="col-lg-4">
                            <!-- Status -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="h6">Visiblity</h3>
                                    <select class="form-select" name="type" required>
                                        <option value="1">Visible to All : Public</option>
                                        <option value="2">Visible to All Friends</option>
                                        <option value="3">Visible to Tagged Friends Only</option>
                                        <option value="4">Visible to Only me</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Avatar -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="h6">Key Image</h3>
                                    <input class="form-control" type="file" accept=".jpg,.jpeg,.png,.webp "
                                        name="keyImage" required>

                                    <h3 class="h6 mt-2">Detail Image</h3>
                                    <input class="form-control" type="file" accept=".jpg,.jpeg,.png,.webp "
                                        name="detailedImage">

                                    <h3 class="h6 mt-2">Audio Recording</h3>
                                    <input class="form-control" type="file" accept=".mp3,.m4a" name="audio">
                                </div>
                            </div>
                            <!-- Notes -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="h6">Detailed Description</h3>
                                    <textarea class="form-control" rows="14" style="resize:none" name="classification"
                                        placeholder="Detailed Description"></textarea>
                                </div>
                            </div>
                            <!-- Social media -->

                        </div>
                    </div>
                </form>
            {{-- </div> --}}
        </div>
    </div>
@endsection
@section('script')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  

  
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('#createJix').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ Route('webCreateJix') }}",
                method: "POST",
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        swal({
                            title: data.message,
                            text: "",
                            type: "success",
                            icon: "success",
                            showConfirmButton: true
                        }).then(function() {
                            window.location.href = "add_jix";
                        });

                    }
                }
            });
        });

        $(document).ready(function() {
            $("#end_date").on('change', function() {
                if ($(this).is(':checked')) {
                    // $('#edate').val('2900-12-12T12:12');
                    $('#edate').prop('readonly', true);
                } else {
                    $('#edate').prop('readonly', false);
                }
            });
        });
    </script>
@endsection
