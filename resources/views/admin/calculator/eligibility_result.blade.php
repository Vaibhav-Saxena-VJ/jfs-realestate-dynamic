@extends('layouts.header')
@section('content')
<div class="container">
    <h2>Eligibility Result</h2>

    <table class="table table-bordered">
        <tr>
            <th>Total Income</th>
            <td>{{ number_format($totalIncome, 2) }}</td>
        </tr>
        <tr>
            <th>Tax Amount</th>
            <td>{{ number_format($taxAmount, 2) }}</td>
        </tr>
        <tr>
            <th>Remaining Income After Tax</th>
            <td>{{ number_format($remainingIncomeAfterTax, 2) }}</td> <!-- New addition -->
        </tr>
       
        <tr>
            <th>FOIR Percentage</th>
            <td>{{ $foirPercentage }}%</td> <!-- FOIR percentage -->
        </tr>
        <tr>
            <th>Total Deductions (Excluding Tax)</th>
            <td>{{ number_format($totalDeductions, 2) }}</td>
        </tr>
        <tr>
            <th>Proposed EMI</th>
            <td>{{ number_format($proposedEmi, 2) }}</td> <!-- Display Proposed EMI -->
        </tr>
    </table>

    <a href="{{ route('eligibilityCriteria') }}" class="btn btn-primary">Calculate Again</a>
</div>
@endsection
