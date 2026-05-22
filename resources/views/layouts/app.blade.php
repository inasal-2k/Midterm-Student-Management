<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-5ZMG0Gm0EY8G0q6dUp7pZ5xNQPOc1j2bMk+jRMI3Nrf2g5VJvVYCRU1Dfof7M1zQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --primary-light: #eef2ff;
            --primary-border: #c7d2fe;
            --success: #059669;
            --success-light: #ecfdf5;
            --success-border: #a7f3d0;
            --warning: #d97706;
            --warning-light: #fffbeb;
            --warning-border: #fde68a;
            --danger: #dc2626;
            --danger-light: #fef2f2;
            --danger-border: #fecaca;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
            --radius: 0.75rem;
            --radius-sm: 0.5rem;
            --radius-lg: 1rem;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        * { box-sizing: border-box; }

        body {
            background: var(--gray-100);
            color: var(--gray-800);
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            line-height: 1.6;
        }

        .navbar-custom {
            background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
            padding: 0;
            min-height: 68px;
            box-shadow: 0 4px 20px rgba(79, 70, 229, 0.25);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-custom .container-nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 68px;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.2rem;
            color: #ffffff !important;
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
            gap: 0.65rem;
            text-decoration: none;
            transition: opacity 0.15s ease;
        }

        .navbar-brand:hover {
            opacity: 0.85;
            color: #ffffff !important;
        }

        .navbar-brand .brand-icon {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(4px);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 0.9rem;
            font-weight: 800;
            border: 1px solid rgba(255, 255, 255, 0.25);
        }

        .navbar-brand .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .navbar-brand .brand-text .brand-sub {
            font-size: 0.65rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            opacity: 0.75;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            font-size: 0.875rem;
            padding: 0.5rem 1rem !important;
            border-radius: var(--radius-sm);
            transition: all 0.15s ease;
            text-decoration: none;
        }

        .nav-link:hover {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.12);
        }

        .nav-link.active {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.15);
        }

        .container-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        .card {
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-lg);
            background: #fff;
            box-shadow: var(--shadow);
            transition: box-shadow 0.2s ease;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-body {
            padding: 1.75rem;
        }

        .stat-card {
            background: #fff;
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: all 0.2s ease;
            height: 100%;
        }

        .stat-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .stat-card .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .stat-card .stat-label {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--gray-500);
            margin-bottom: 0.35rem;
        }

        .stat-card .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gray-900);
            letter-spacing: -0.03em;
            line-height: 1.1;
        }

        .stat-card.stat-total .stat-icon { background: var(--primary-light); color: var(--primary); }
        .stat-card.stat-active .stat-icon { background: var(--success-light); color: var(--success); }
        .stat-card.stat-pending .stat-icon { background: var(--warning-light); color: var(--warning); }

        .form-label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--gray-700);
        }

        .form-control,
        .form-select {
            display: block;
            width: 100%;
            padding: 0.7rem 0.9rem;
            font-size: 0.9rem;
            line-height: 1.5;
            color: var(--gray-900);
            background-color: #fff;
            border: 1px solid var(--gray-300);
            border-radius: var(--radius);
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.12);
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: var(--danger);
        }

        .form-control.is-invalid:focus,
        .form-select.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .form-control::placeholder {
            color: var(--gray-400);
        }

        .input-group {
            display: flex;
            width: 100%;
            background: #fff;
            border: 1px solid var(--gray-300);
            border-radius: var(--radius);
            overflow: hidden;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .input-group:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.12);
        }

        .input-group-text {
            padding: 0 0.9rem;
            background: var(--gray-50);
            border: none;
            border-right: 1px solid var(--gray-300);
            color: var(--gray-400);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }

        .input-group .form-control {
            border: none;
            border-radius: 0;
        }

        .input-group .form-control:focus {
            box-shadow: none;
        }

        /* ── Buttons ── */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            font-weight: 600;
            text-align: center;
            border: 1px solid transparent;
            padding: 0.7rem 1.25rem;
            font-size: 0.875rem;
            line-height: 1.4;
            border-radius: var(--radius);
            transition: all 0.15s ease;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 1px 2px rgba(79, 70, 229, 0.3);
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            color: #fff;
        }

        .btn-outline-primary {
            background: #fff;
            color: var(--primary);
            border-color: var(--primary-border);
        }

        .btn-outline-primary:hover {
            background: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-outline-secondary {
            background: #fff;
            color: var(--gray-600);
            border-color: var(--gray-300);
        }

        .btn-outline-secondary:hover {
            background: var(--gray-50);
            color: var(--gray-800);
            border-color: var(--gray-400);
        }

        .btn-outline-danger {
            background: #fff;
            color: var(--danger);
            border-color: var(--danger-border);
        }

        .btn-outline-danger:hover {
            background: var(--danger-light);
            color: var(--danger);
            border-color: var(--danger);
        }

        .btn-danger {
            background: var(--danger);
            color: #fff;
        }

        .btn-danger:hover {
            background: #b91c1c;
            color: #fff;
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }

        .btn-lg {
            padding: 0.85rem 1.5rem;
            font-size: 0.95rem;
        }

        /* ── Table ── */
        .table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.85rem 1rem;
            border-bottom: 1px solid var(--gray-200);
            vertical-align: middle;
        }

        .table th {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--gray-500);
            background: var(--gray-50);
            border-bottom: 2px solid var(--gray-200);
        }

        .table tbody tr {
            transition: background 0.1s ease;
        }

        .table tbody tr:hover {
            background: var(--gray-50);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* ── Badges ── */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.3rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            line-height: 1;
        }

        .badge-active { background: var(--success-light); color: var(--success); }
        .badge-pending { background: var(--warning-light); color: var(--warning); }
        .badge-inactive { background: var(--gray-100); color: var(--gray-500); }

        /* ── Avatar ── */
        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
        }

        .avatar-primary { background: var(--primary); }

        /* ── Alert ── */
        .alert {
            border-radius: var(--radius);
            border: 1px solid transparent;
            padding: 0.85rem 1.1rem;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .alert-success {
            background: var(--success-light);
            border-color: var(--success-border);
            color: var(--success);
        }

        .alert .btn-close {
            font-size: 0.75rem;
        }

        /* ── Empty State ── */
        .empty-state {
            text-align: center;
            padding: 3.5rem 1.5rem;
        }

        .empty-state .empty-icon {
            width: 64px;
            height: 64px;
            background: var(--gray-100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.25rem;
            font-size: 1.5rem;
        }

        .empty-state h3 {
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.4rem;
        }

        .empty-state p {
            color: var(--gray-500);
            margin-bottom: 1.25rem;
        }

        /* ── Page Header ── */
        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--gray-900);
            letter-spacing: -0.03em;
            margin-bottom: 0.25rem;
        }

        .page-header p {
            color: var(--gray-500);
            font-size: 0.9rem;
            margin: 0;
        }

        /* ── Back Link ── */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            color: var(--gray-500);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1.25rem;
            transition: color 0.15s ease;
        }

        .back-link:hover {
            color: var(--primary);
        }

        /* ── Section Title ── */
        .section-title h2 {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
        }

        .section-title p {
            color: var(--gray-500);
            font-size: 0.875rem;
            margin: 0;
        }

        /* ── Utilities ── */
        .text-muted { color: var(--gray-500) !important; }
        .fw-bold { font-weight: 700 !important; }
        .fw-semibold { font-weight: 600 !important; }
        .text-capitalize { text-transform: capitalize !important; }
        .text-end { text-align: right !important; }
        .d-flex { display: flex !important; }
        .flex-column { flex-direction: column !important; }
        .flex-md-row { flex-direction: column; }
        @media (min-width: 768px) {
            .flex-md-row { flex-direction: row !important; }
        }
        .justify-content-between { justify-content: space-between !important; }
        .align-items-start { align-items: flex-start !important; }
        .align-items-center { align-items: center !important; }
        .align-items-end { align-items: flex-end !important; }
        .gap-2 { gap: 0.5rem !important; }
        .gap-3 { gap: 1rem !important; }
        .gap-4 { gap: 1.5rem !important; }
        .g-3 > * { margin: 0.5rem; }
        .g-4 > * { margin: 0.75rem; }
        .mb-0 { margin-bottom: 0 !important; }
        .mb-1 { margin-bottom: 0.25rem !important; }
        .mb-2 { margin-bottom: 0.5rem !important; }
        .mb-3 { margin-bottom: 0.75rem !important; }
        .mb-4 { margin-bottom: 1rem !important; }
        .mb-5 { margin-bottom: 1.5rem !important; }
        @media (min-width: 768px) {
            .mb-md-0 { margin-bottom: 0 !important; }
        }
        .mt-4 { margin-top: 1rem !important; }
        .mt-5 { margin-top: 1.5rem !important; }
        .p-4 { padding: 1.5rem !important; }
        .p-5 { padding: 2rem !important; }
        .px-4 { padding-left: 1.5rem !important; padding-right: 1.5rem !important; }
        .py-4 { padding-top: 1.5rem !important; padding-bottom: 1.5rem !important; }
        .py-5 { padding-top: 2rem !important; padding-bottom: 2rem !important; }
        .table-responsive { overflow-x: auto; }
        .row { display: flex; flex-wrap: wrap; margin: -0.5rem; }
        .col-12, .col-md-2, .col-md-3, .col-md-4, .col-md-6, .col-md-7 { padding: 0.5rem; box-sizing: border-box; }
        .col-12 { width: 100%; }
        @media (min-width: 768px) {
            .col-md-2 { width: 16.6667%; flex: 0 0 16.6667%; }
            .col-md-3 { width: 25%; flex: 0 0 25%; }
            .col-md-4 { width: 33.3333%; flex: 0 0 33.3333%; }
            .col-md-6 { width: 50%; flex: 0 0 50%; }
            .col-md-7 { width: 58.3333%; flex: 0 0 58.3333%; }
        }
        .d-grid { display: grid !important; }
        .d-inline { display: inline !important; }
        .me-2 { margin-right: 0.5rem !important; }
        .small { font-size: 0.8rem !important; }
        .h5 { font-size: 1.1rem; }
        .h3 { font-size: 1.35rem; }
    </style>
</head>
<body>
    <nav class="navbar-custom">
        <div class="container-nav">
            <a class="navbar-brand" href="{{ route('students.index') }}">
                <span class="brand-icon">S</span>
                <span class="brand-text">
                    <span class="brand-sub">System</span>
                    Student Management
                </span>
            </a>
            <div class="nav-links">
                <a href="{{ route('students.index') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('students.create') }}" class="nav-link">Add Student</a>
            </div>
        </div>
    </nav>

    <main class="container-main">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-NQK7JPrfl5je4i3gP7hi2M7+1emWQxJjCNLCLrG5AZY9VcO16N4gP0Xu6T8I6S6d" crossorigin="anonymous"></script>
</body>
</html>
