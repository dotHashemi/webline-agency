@php
$success = session()->get('success');
@endphp

@if($success)

<div class="alert alert-success alert-dismissible fade show success-alert unrounded d-flex align-items-end" role="alert">
    <span>{{ $success }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif