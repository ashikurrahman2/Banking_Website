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
                                            <th>Signature</th>
                                            <th>Name</th>
                                            <th>Father Name</th>
                                            <th>Mother's Name</th>
                                            <th>Spouse Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>Passport Number</th>
                                            <th>Country</th>
                                            <th>Phone Number</th>
                                            <th>Social media Phone Number</th>
                                            <th>Permanent Address</th>
                                            <th>District</th>
                                            <th>Police Station</th>
                                            <th>Email</th>
                                            <th>Loan Type</th>
                                            <th>Loan Repayment period</th>
                                            <th>Bank Name</th>
                                            <th>Account Number</th>
                                            <th>Branch</th>
                                            <th>Account Holder Name</th>
                                            <th>Guarantor Name</th>
                                            <th>Guarantor Father's Name</th>
                                            <th>Guarantor Mother's Name</th>
                                            <th>Guarantor NID Number</th>
                                            <th>Guarantor Thana</th>
                                            <th>Guarantor Zilla</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applications as $application)
                                        <tr>
                                            <td>{{ $application->id }}</td>

                                   <!-- Image with click event -->

                                    <td>
                                        @if($application->photo)
                                            <img 
                                                src="{{ asset($application->photo) }}" 
                                                alt="Photo" 
                                                width="50" 
                                                height="50" 
                                                style="border-radius: 50%; cursor: pointer;" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#photoModal">
                                        @else
                                            <span>No Photo</span>
                                        @endif
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    {{-- <h5 class="modal-title" id="photoModalLabel">Photo Preview</h5> --}}
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img id="modalPhoto" src="" alt="Photo" class="img-fluid" style="max-width: 100%; height: auto;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                        // Select all images that trigger the modal
                                        const triggerImages = document.querySelectorAll('img[data-bs-toggle="modal"]');

                                        // Add click event listener to each image
                                        triggerImages.forEach(function (img) {
                                            img.addEventListener('click', function () {
                                                // Get the image source from the clicked image
                                                const imgSrc = img.getAttribute('src');

                                                // Set the modal image source
                                                const modalPhoto = document.getElementById('modalPhoto');
                                                modalPhoto.setAttribute('src', imgSrc);
                                            });
                                        });
                                    });

                                    </script>

                                            <!-- Signature Image in Table -->
<td>
    @if($application->signature)
        <img 
            src="{{ asset($application->signature) }}" 
            alt="Signature" 
            width="50" 
            height="50" 
            style="border-radius: 50%; cursor: pointer;" 
            data-bs-toggle="modal" 
            data-bs-target="#signatureModal">
    @else
        <span>No Signature</span>
    @endif
</td>

<!-- Modal for Signature -->
<div class="modal fade" id="signatureModal" tabindex="-1" aria-labelledby="signatureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="signatureModalLabel">Signature Preview</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalSignature" src="" alt="Signature" class="img-fluid" style="max-width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    // Select all signature images that trigger the modal
    const signatureImages = document.querySelectorAll('img[data-bs-toggle="modal"]');

    // Add click event listener to each signature image
    signatureImages.forEach(function (img) {
        img.addEventListener('click', function () {
            // Get the signature image source from the clicked image
            const imgSrc = img.getAttribute('src');

            // Set the modal signature image source
            const modalSignature = document.getElementById('modalSignature');
            modalSignature.setAttribute('src', imgSrc);
        });
    });
});

  </script>

                                            <td>{{ $application->name }}</td>

                                            <td>{{ $application->F_name }}</td>
                                            <td>{{ $application->M_name }}</td>
                                            <td>{{ $application->spouse_name }}</td>
                                            <td>{{ $application->d_birth }}</td>
                                            <td>{{ $application->gender }}</td>
                                            <td>{{ $application->pass_num }}</td>
                                            <td>{{ $application->country }}</td>
                                            <td>{{ $application->phone }}</td>
                                            <td>{{ $application->social_phone }}</td>
                                            <td>{{ $application->permanent_address }}</td>
                                            <td>{{ $application->district }}</td>
                                            <td>{{ $application->police_station }}</td>
                                            <td>{{ $application->email }}</td>

                                            <td>{{ ucwords($application->loan_type) }}</td>
                                            <td>{{ ucwords($application->repayment_period) }}</td>
                                            <td>{{ ucwords($application->bank_name) }}</td>
                                            <td>{{ ucwords($application->account_no) }}</td>
                                            <td>{{ ucwords($application->branch) }}</td>
                                            <td>{{ ucwords($application->account_holder) }}</td>
                                            <td>{{ ucwords($application->guarantor_name) }}</td>
                                            <td>{{ ucwords($application->guarantor_father_name) }}</td>
                                            <td>{{ ucwords($application->guarantor_mother_name) }}</td>
                                            <td>{{ $application->guarantor_nid }}</td>
                                            <td>{{ ucwords($application->guarantor_thana) }}</td>
                                            <td>{{ $application->guarantor_zilla }}</td>
                                            

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
                                                {{-- @else
                                                    <span class="text-muted">Actions Disabled</span> --}}
                                                @endif

                                                    <!-- Delete button -->
                                                    {{-- <form action="{{ route('admin.loan.destroy', $application->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="submit">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form> --}}
                                                    
                                                    
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
