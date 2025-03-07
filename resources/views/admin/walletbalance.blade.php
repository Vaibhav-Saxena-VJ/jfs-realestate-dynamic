@extends('layouts.header')

@section('title')
    @parent
    JFS | Wallet Balance 
@endsection

@section('content')
@parent
<!-- Breadcrumbs -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Wallet Balance</li>
    </ol>
</nav>

<div class="container">
    <h3>Wallet Balance</h3>
    <p>Your current wallet balance is: <strong>₹{{ number_format($walletBalance, 2) }}</strong></p>

    <!-- Withdrawal Form -->
    <h4>Withdraw Funds</h4>
    <form action="{{ route('user.withdraw.request') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Amount to Withdraw</label>
            <input type="number" name="amount" class="form-control" placeholder="Enter amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Request Withdrawal</button>
    </form>

    <!-- Display any success messages -->
    @if(session('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif

    <!-- Transaction History -->
    <h4 class="mt-4">Transaction History</h4>
    <div class="table-responsive">
        <table id="transactionHistory" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($combinedData as $data)
                    <tr>
                        <td>{{ $data->transaction_id ?? $data->id }}</td>
                        <td>₹{{ number_format($data->amount, 2) }}</td>
                        <td>
                            <span class="{{ $data->status == 'pending' ? 'text-warning' : ($data->status == 'completed' ? 'text-success' : '') }}">
                                {{ ucfirst($data->status) }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y, h:i A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- DataTables and Export Buttons CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet"/>
@endsection

@section('script')
@parent
<!-- jQuery and Bootstrap scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- DataTables and Export Buttons scripts -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {
        $('#transactionHistory').DataTable({
            processing: true,
            serverSide: false, // Since we are using static data, set to false
            paging: false, // Disable pagination as we're displaying all data
            searching: false, // Disable searching if not needed
            info: false, // Disable info display
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
@endsection
