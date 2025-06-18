<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registrations</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #6366f1;
            --primary-dark: #4338ca;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-500: #6b7280;
            --gray-700: #374151;
            --gray-900: #111827;
            --red-500: #ef4444;
            --green-500: #10b981;
            --blue-500: #3b82f6;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f9fafb;
            color: var(--gray-900);
            line-height: 1.5;
            min-height: 100vh;
            padding: 0;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            margin-bottom: 2.5rem;
        }

        .header h1 {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .header p {
            color: var(--gray-500);
            font-size: 1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.25rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: 1px solid var(--gray-200);
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .stat-card .icon {
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
            background: rgba(79, 70, 229, 0.1);
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-card .number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
        }

        .stat-card .label {
            color: var(--gray-500);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .dashboard-card {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            border: 1px solid var(--gray-200);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 250px;
            max-width: 400px;
        }

        .search-box input {
            width: 100%;
            padding: 0.625rem 1rem 0.625rem 2.5rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background-color: var(--gray-100);
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            background-color: white;
        }

        .search-box .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .filter-dropdown {
            padding: 0.625rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.5rem;
            background: white;
            font-size: 0.875rem;
            color: var(--gray-700);
            transition: all 0.2s ease;
            min-width: 160px;
        }

        .filter-dropdown:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .table-container {
            overflow-x: auto;
            border-radius: 0.5rem;
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            font-size: 0.875rem;
        }

        .table thead th {
            background-color: var(--primary);
            color: white;
            padding: 0.75rem 1rem;
            text-align: left;
            font-weight: 600;
            position: sticky;
            top: 0;
        }

        .table thead th:first-child {
            border-top-left-radius: 0.5rem;
        }

        .table thead th:last-child {
            border-top-right-radius: 0.5rem;
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: var(--gray-100);
        }

        .table tbody tr:not(:last-child) td {
            border-bottom: 1px solid var(--gray-200);
        }

        .table td {
            padding: 1rem;
            color: var(--gray-700);
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: capitalize;
        }

        .badge-male {
            background-color: #dbeafe;
            color: #1d4ed8;
        }

        .badge-female {
            background-color: #fce7f3;
            color: #be185d;
        }

        .badge-other {
            background-color: #f3e8ff;
            color: #7e22ce;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
            cursor: pointer;
            text-decoration: none;
            gap: 0.5rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: 1px solid var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .actions {
            margin-top: 2rem;
            text-align: center;
        }

        .no-data {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--gray-500);
        }

        .no-data .icon {
            font-size: 3rem;
            color: var(--gray-300);
            margin-bottom: 1rem;
        }

        .loading {
            text-align: center;
            padding: 2rem;
        }

        .spinner {
            width: 2rem;
            height: 2rem;
            border: 3px solid var(--gray-200);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .header h1 {
                font-size: 1.5rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }
            
            .table-header {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-box {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-users mr-2"></i>Registered Participants</h1>
            <p>Competition Dashboard - View and manage registration data</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="icon"><i class="fas fa-users"></i></div>
                <div class="number" id="totalRegistrations">0</div>
                <div class="label">Total Registrations</div>
            </div>
            <div class="stat-card">
                <div class="icon"><i class="fas fa-university"></i></div>
                <div class="number" id="totalColleges">0</div>
                <div class="label">Participating Colleges</div>
            </div>
            <div class="stat-card">
                <div class="icon"><i class="fas fa-globe"></i></div>
                <div class="number" id="totalCountries">0</div>
                <div class="label">Countries Represented</div>
            </div>
            <div class="stat-card">
                <div class="icon"><i class="fas fa-code"></i></div>
                <div class="number" id="totalDomains">0</div>
                <div class="label">Different Domains</div>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="table-header">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="searchInput" placeholder="Search registrations...">
                </div>
                <div class="flex gap-2">
                    <select class="filter-dropdown" id="genderFilter">
                        <option value="">All Genders</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <select class="filter-dropdown" id="yearFilter">
                        <option value="">All Years</option>
                        <option value="1">Year 1</option>
                        <option value="2">Year 2</option>
                        <option value="3">Year 3</option>
                        <option value="4">Year 4</option>
                        <option value="5">Year 5</option>
                    </select>
                </div>
            </div>

            <div class="loading" id="loadingSpinner">
                <div class="spinner"></div>
                <p>Loading registrations...</p>
            </div>

            <div class="table-container" id="tableWrapper" style="display: none;">
                <table class="table" id="registrationsTable">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>College</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Year</th>
                            <th>Domain</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach($registrations as $index => $registration)
                            <tr>
                                <td>{{ $registration->country }}</td>
                                <td>{{ $registration->college }}</td>
                                <td class="font-medium">{{ $registration->name }}</td>
                                <td>{{ $registration->contact_number }}</td>
                                <td>
                                    <span class="badge badge-{{ strtolower($registration->gender) }}">
                                        {{ $registration->gender }}
                                    </span>
                                </td>
                                <td>{{ $registration->email }}</td>
                                <td>Year {{ $registration->year }}</td>
                                <td>{{ $registration->domain }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="no-data" id="noDataMessage" style="display: none;">
                <div class="icon"><i class="fas fa-inbox"></i></div>
                <h3 class="font-medium text-lg mb-1">No registrations found</h3>
                <p>No participants match your search criteria.</p>
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('registration.form') }}" class="btn btn-primary" id="backBtn">
                <i class="fas fa-arrow-left mr-1"></i>
                Back to Registration
            </a>
        </div>
    </div>

    @php
        $registrationsArray = $registrations->map(function($registration) {
            return [
                'country' => strval($registration->country ?? ''),
                'college' => strval($registration->college ?? ''),
                'name' => strval($registration->name ?? ''),
                'contact_number' => strval($registration->contact_number ?? ''),
                'gender' => strval($registration->gender ?? ''),
                'email' => strval($registration->email ?? ''),
                'year' => intval($registration->year ?? 0),
                'domain' => strval($registration->domain ?? ''),
            ];
        })->toArray();
    @endphp

    <script>
        // Convert Laravel data to JavaScript array with proper escaping
        let registrations;
        try {
            registrations = @json($registrationsArray, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
        } catch (e) {
            console.error('Failed to parse registrations:', e);
            registrations = [];
        }

        let filteredRegistrations = [...registrations];

        // Initialize page
        function initializePage() {
            setTimeout(() => {
                document.getElementById('loadingSpinner').style.display = 'none';
                document.getElementById('tableWrapper').style.display = 'block';
                updateStatistics();
                renderTable(filteredRegistrations);
            }, 800);
        }

        // Update statistics
        function updateStatistics() {
            const totalRegistrations = registrations.length;
            const uniqueColleges = new Set(registrations.map(r => r.college)).size;
            const uniqueCountries = new Set(registrations.map(r => r.country)).size;
            const uniqueDomains = new Set(registrations.map(r => r.domain)).size;

            animateCounter('totalRegistrations', totalRegistrations);
            animateCounter('totalColleges', uniqueColleges);
            animateCounter('totalCountries', uniqueCountries);
            animateCounter('totalDomains', uniqueDomains);
        }

        // Animate counter
        function animateCounter(elementId, targetValue) {
            const element = document.getElementById(elementId);
            let currentValue = 0;
            const increment = targetValue / 30;
            const timer = setInterval(() => {
                currentValue += increment;
                if (currentValue >= targetValue) {
                    element.textContent = targetValue;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(currentValue);
                }
            }, 30);
        }

        // Render table
        function renderTable(data) {
            const tableBody = document.getElementById('tableBody');
            const noDataMessage = document.getElementById('noDataMessage');
            
            if (data.length === 0) {
                document.getElementById('tableWrapper').style.display = 'none';
                noDataMessage.style.display = 'block';
                return;
            }
            
            document.getElementById('tableWrapper').style.display = 'block';
            noDataMessage.style.display = 'none';
            
            tableBody.innerHTML = data.map((registration, index) => {
                const country = registration.country || '';
                const college = registration.college || '';
                const name = registration.name || '';
                const contact_number = registration.contact_number || '';
                const gender = registration.gender || '';
                const email = registration.email || '';
                const year = registration.year !== undefined ? registration.year : '';
                const domain = registration.domain || '';

                return `
                    <tr>
                        <td>${country}</td>
                        <td>${college}</td>
                        <td class="font-medium">${name}</td>
                        <td>${contact_number}</td>
                        <td>
                            <span class="badge badge-${gender.toLowerCase()}">
                                ${gender}
                            </span>
                        </td>
                        <td>${email}</td>
                        <td>Year ${year}</td>
                        <td>${domain}</td>
                    </tr>
                `;
            }).join('');
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            filterData();
        });

        // Filter functionality
        document.getElementById('genderFilter').addEventListener('change', filterData);
        document.getElementById('yearFilter').addEventListener('change', filterData);

        function filterData() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const genderFilter = document.getElementById('genderFilter').value;
            const yearFilter = document.getElementById('yearFilter').value;

            filteredRegistrations = registrations.filter(registration => {
                const matchesSearch = 
                    registration.name.toLowerCase().includes(searchTerm) ||
                    registration.email.toLowerCase().includes(searchTerm) ||
                    registration.college.toLowerCase().includes(searchTerm) ||
                    registration.country.toLowerCase().includes(searchTerm) ||
                    registration.domain.toLowerCase().includes(searchTerm);
                
                const matchesGender = !genderFilter || registration.gender === genderFilter;
                const matchesYear = !yearFilter || registration.year.toString() === yearFilter;

                return matchesSearch && matchesGender && matchesYear;
            });

            renderTable(filteredRegistrations);
        }

        // Initialize the page
        initializePage();
    </script>
</body>
</html>