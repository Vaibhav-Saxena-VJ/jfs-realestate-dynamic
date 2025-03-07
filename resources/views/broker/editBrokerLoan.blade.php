@extends('layouts.header')
@section('title')
    @parent
    JFS | Update Bank Information
@endsection
@section('content')
@parent

<!-- Breadcrumbs -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('loanbanks') }}">List of Banks</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Loan Bank Details</li>
    </ol>
</nav>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container-fluid">
        <form id="editBank">
            @csrf
            <!-- Title -->
            <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                <h2 class="h5 mb-3 mb-lg-0"><a href="{{ route('loanbanks') }}" class="text-muted"><i class="bi bi-arrow-left-square me-2"></i></a> Bank Details</h2>
                <div class="hstack gap-3">
                    <button class="btn btn-light btn-sm btn-icon-text"><i class="bi bi-x"></i> <span class="text">Cancel</span></button>
                    <button type="submit" class="btn btn-primary btn-sm btn-icon-text"><i class="bi bi-save"></i> <span class="text">Update</span></button>
                </div>
            </div>

            <input type="hidden" name="creator_id" value="{{ Session::get('user_id') }}" />
            <input type="hidden" name="bank_id" value="{{ $data['bank']->bank_id }}" />

            <!-- Main content -->
            <div class="row">
                <!-- Bank Information -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6 mb-4">Bank Information</h3>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Bank Name</label>
                                        <input type="text" name="bank_name" class="form-control" value="{{ $data['bank']->bank_name }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">IFSC Code</label>
                                        <input type="text" name="ifsc_code" class="form-control" value="{{ $data['bank']->ifsc_code }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Branch Name</label>
                                        <input type="text" name="branch_name" class="form-control" value="{{ $data['bank']->branch_name }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Bank Address</label>
                                        <input type="text" name="bank_address" class="form-control" value="{{ $data['bank']->bank_address }}" required />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Manager Number</label>
                                        <input type="text" name="manager_number" class="form-control" value="{{ $data['bank']->manager_number }}" required />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Manager Name</label>
                                        <input type="text" name="manager_name" class="form-control" value="{{ $data['bank']->manager_name }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
@parent
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('#editBank').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('updateLoanBank') }}",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json',
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
                        title: data.msg,
                        icon: "success",
                        showConfirmButton: true
                    }).then(function() {
                        window.location.href = "{{ route('loanbanks') }}";
                    });
                }
            }
        });
    });
</script>
@endsection
