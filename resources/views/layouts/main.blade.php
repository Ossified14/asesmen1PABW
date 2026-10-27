<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'AgroClima Garut') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f8fafc;
            color: #334155;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #1b4332;
            color: #ffffff;
            padding: 1.5rem 1rem;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.06);
        }

        header h1 {
            font-size: 1.75rem;
            font-weight: 600;
            letter-spacing: -0.02em;
        }

        nav.navbar {
            background-color: #2d6a4f;
            border-bottom: 1px solid #40916c;
        }

        .nav-container {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        ul.nav-menu {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin: 0;
            padding: 0.5rem 0;
        }

        ul.nav-menu li a {
            color: #d8f3dc;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-size: 0.95rem;
            font-weight: 500;
            display: inline-block;
            transition: all 0.2s ease;
        }

        ul.nav-menu li a:hover {
            background-color: #40916c;
            color: #ffffff;
        }

        ul.nav-menu li a.active {
            background-color: #52b788;
            color: #081c15;
            font-weight: 600;
        }

        main {
            flex: 1;
            max-width: 960px;
            width: 100%;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            margin-bottom: 1.5rem;
        }

        .card h2 {
            color: #1b4332;
            font-size: 1.35rem;
            margin-bottom: 1rem;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 0.5rem;
        }

        .card p {
            margin-bottom: 1rem;
            color: #475569;
        }

        ul.content-list {
            list-style: disc;
            margin-left: 1.5rem;
            margin-bottom: 1rem;
            color: #475569;
        }

        ul.content-list li {
            margin-bottom: 0.35rem;
        }

        /* Form styling */
        .form-group {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.35rem;
            color: #1e293b;
            font-size: 0.95rem;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 0.6rem 0.8rem;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.95rem;
            background-color: #ffffff;
            color: #1e293b;
            transition: border-color 0.2s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            outline: none;
            border-color: #2d6a4f;
            box-shadow: 0 0 0 3px rgba(45, 106, 79, 0.15);
        }

        .btn {
            display: inline-block;
            background-color: #2d6a4f;
            color: #ffffff;
            padding: 0.65rem 1.5rem;
            border: none;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .btn:hover {
            background-color: #1b4332;
        }

        .btn-secondary {
            background-color: #64748b;
        }

        .btn-secondary:hover {
            background-color: #475569;
        }

        /* Table styling */
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            font-size: 0.95rem;
        }

        table.data-table th,
        table.data-table td {
            padding: 0.75rem 1rem;
            text-align: left;
            border: 1px solid #e2e8f0;
        }

        table.data-table th {
            background-color: #f1f5f9;
            color: #1e293b;
            font-weight: 600;
        }

        table.data-table tr:nth-child(even) {
            background-color: #f8fafc;
        }

        table.data-table tr:hover {
            background-color: #f1f5f9;
        }

        /* Badge status */
        .badge {
            display: inline-block;
            padding: 0.25rem 0.65rem;
            border-radius: 9999px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge-kering {
            background-color: #fef3c7;
            color: #92400e;
            border: 1px solid #fde68a;
        }

        .badge-optimal {
            background-color: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .badge-lembap {
            background-color: #e0f2fe;
            color: #075985;
            border: 1px solid #bae6fd;
        }

        /* Recommendations alert box */
        .rekomendasi-box {
            padding: 1rem;
            border-radius: 6px;
            margin-top: 1.25rem;
            font-size: 0.95rem;
        }

        .rekomendasi-kering {
            background-color: #fffbeb;
            border-left: 4px solid #f59e0b;
            color: #92400e;
        }

        .rekomendasi-optimal {
            background-color: #f0fdf4;
            border-left: 4px solid #22c55e;
            color: #166534;
        }

        .rekomendasi-lembap {
            background-color: #f0f9ff;
            border-left: 4px solid #0284c7;
            color: #075985;
        }

        .error-message {
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }

        footer {
            background-color: #f1f5f9;
            border-top: 1px solid #e2e8f0;
            padding: 1.25rem;
            text-align: center;
            color: #64748b;
            font-size: 0.9rem;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>AgroClima Kabupaten Garut</h1>
    </header>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2026 AgroClima Kelompok Tani Makmur Kabupaten Garut</p>
    </footer>
</body>
</html>
