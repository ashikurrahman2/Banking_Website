@extends('layouts.admin')
@section('title', 'Loan Applications')

@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Loan Applications</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>All Loan Application List</h5>
                    </div>
                    <div class="card-body">
                        @if($applications->isEmpty())
                            <div class="alert alert-info">No loan applications found.</div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Loan Type</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applications as $application)
                                        <tr>
                                            <td>{{ $application->id }}</td>

                                            <td>
                                                @if($application->photo)
                                                    <img src="{{ asset('storage/photos/' . $application->photo) }}" alt="Photo" width="50" height="50" style="border-radius: 50%;">
                                                @else
                                                    <span>No Photo</span>
                                                @endif
                                            </td>

                                            <td>{{ $application->F_name }}</td>

                                            <td>{{ $application->phone }}</td>

                                            <td>{{ ucwords($application->loan_type) }}</td>

                                            <td>{{ number_format($application->loan_amount, 2) }}</td>

                                            <td>
                                                <span class="badge bg-{{ $application->status == 'approved' ? 'success' : ($application->status == 'rejected' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($application->status) }}
                                                </span>
                                            </td>

                                            <td>
                                                <!-- Approve and Reject buttons -->
                                                @if($application->status == 'pending')
                                                    <form action="{{ route('admin.loan.approve', $application->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-success btn-sm" type="submit">Approve</button>
                                                    </form>
                                                    <form action="{{ route('admin.loan.reject', $application->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-danger btn-sm" type="submit">Reject</button>
                                                    </form>
                                                @else
                                                    <span class="text-muted">Actions Disabled</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Pagination links -->
                            <div class="d-flex justify-content-center mt-3">
                                {{ $applications->links('pagination::bootstrap-4') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
