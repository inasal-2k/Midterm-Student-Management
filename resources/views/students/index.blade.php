@extends('layouts.app')

@section('title', 'Students Dashboard')

@section('content')
    <div class="page-header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
            <div>
                <h1>Registered Students</h1>
                <p>Manage your student records and track enrollment statuses.</p>
            </div>
            <a href="{{ route('students.create') }}" class="btn btn-primary btn-lg">
                <span>+</span> Add Student
            </a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="stat-card stat-total">
                <div class="stat-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div class="stat-label">Total Students</div>
                <div class="stat-value">{{ $totals['all'] }}</div>
            </div>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="stat-card stat-active">
                <div class="stat-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <div class="stat-label">Active</div>
                <div class="stat-value">{{ $totals['active'] }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card stat-pending">
                <div class="stat-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div class="stat-label">Pending</div>
                <div class="stat-value">{{ $totals['pending'] }}</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row g-3 align-items-end mb-4">
                <div class="col-md-7">
                    <label class="form-label">Search</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        </span>
                        <input type="text" name="search" form="filter-form" value="{{ $search }}" class="form-control" placeholder="Search by name or email...">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" form="filter-form">
                        <option {{ $status === 'All' ? 'selected' : '' }}>All</option>
                        <option {{ $status === 'Active' ? 'selected' : '' }}>Active</option>
                        <option {{ $status === 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option {{ $status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" form="filter-form" class="btn btn-outline-primary">Filter</button>
                </div>
            </div>
            <form id="filter-form" method="GET" action="{{ route('students.index') }}"></form>

            @if($students->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">
                        <svg width="28" height="28" fill="none" stroke="var(--gray-400)" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <h3>No students found</h3>
                    <p>Get started by adding your first student record.</p>
                    <a href="{{ route('students.create') }}" class="btn btn-primary">
                        <span>+</span> Add Student
                    </a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar avatar-primary">
                                                {{ strtoupper(substr($student->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="fw-semibold" style="color: var(--gray-900);">{{ $student->name }}</div>
                                                <div class="text-muted small">Student</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="color: var(--gray-600);">{{ $student->email }}</td>
                                    <td style="color: var(--gray-600);">{{ $student->age }}</td>
                                    <td style="color: var(--gray-600);">{{ $student->phone ?? '—' }}</td>
                                    <td>
                                        @if($student->status === 'active')
                                            <span class badge badge-active">● Active</span>
                                        @elseif($student->status === 'pending')
                                            <span class="badge badge-pending">● Pending</span>
                                        @else
                                            <span class="badge badge-inactive">● Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('students.edit', $student) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
