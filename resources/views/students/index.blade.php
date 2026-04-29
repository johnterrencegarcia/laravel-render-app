<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Directory</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Archivo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #000000;
            --surface: #0a0a0a;
            --surface-elevated: #141414;
            --border: #1f1f1f;
            --text-primary: #ffffff;
            --text-secondary: #888888;
            --text-muted: #555555;
            --accent: #ffffff;
            --accent-dim: #333333;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Archivo', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg);
            color: var(--text-primary);
            line-height: 1.5;
            min-height: 100vh;
            padding: 1.5rem;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 600;
            letter-spacing: -0.02em;
        }

        .add-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.625rem 1.25rem;
            background: var(--text-primary);
            color: var(--bg);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 6px;
            transition: all 0.2s;
            border: 1px solid var(--text-primary);
        }

        .add-btn:hover {
            background: transparent;
            color: var(--text-primary);
        }

        /* Stats */
        .stats {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.25rem;
            background: var(--surface-elevated);
            border: 1px solid var(--border);
            border-radius: 6px;
            margin-bottom: 1.5rem;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.875rem;
        }

        .stats-count {
            color: var(--text-primary);
            font-weight: 600;
        }

        .stats-label {
            color: var(--text-secondary);
        }

        /* Table */
        .students-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
        }

        .students-table thead {
            background: var(--surface-elevated);
            border-bottom: 1px solid var(--border);
        }

        .students-table th {
            text-align: left;
            padding: 1rem 1.5rem;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-secondary);
        }

        .students-table tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background 0.15s;
        }

        .students-table tbody tr:last-child {
            border-bottom: none;
        }

        .students-table tbody tr:hover {
            background: var(--surface-elevated);
        }

        .students-table td {
            padding: 1.25rem 1.5rem;
            font-size: 0.9375rem;
        }

        .student-name {
            display: flex;
            align-items: center;
            gap: 0.875rem;
        }

        .student-avatar {
            width: 36px;
            height: 36px;
            background: var(--accent-dim);
            border: 1px solid var(--border);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-primary);
            flex-shrink: 0;
        }

        .name-text {
            font-weight: 500;
        }

        .course-text {
            color: var(--text-secondary);
        }

        .year-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            background: var(--surface-elevated);
            border: 1px solid var(--border);
            border-radius: 4px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.8125rem;
            font-weight: 500;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--surface);
            border: 1px dashed var(--border);
            border-radius: 8px;
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .empty-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .empty-text {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .students-table {
                display: block;
                overflow-x: auto;
            }

            .students-table thead {
                display: none;
            }

            .students-table tbody,
            .students-table tr,
            .students-table td {
                display: block;
            }

            .students-table tr {
                padding: 1.25rem;
                margin-bottom: 0.75rem;
                border: 1px solid var(--border);
                border-radius: 8px;
            }

            .students-table td {
                padding: 0.5rem 0;
                border: none;
            }

            .students-table td:before {
                content: attr(data-label);
                display: block;
                font-size: 0.75rem;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                color: var(--text-secondary);
                margin-bottom: 0.25rem;
            }

            .student-name {
                margin-bottom: 0.5rem;
            }
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--surface);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-dim);
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Students</h1>
            <a href="/students/create" class="add-btn">
                <span>+</span>
                Add Student
            </a>
        </header>

        @if($students->count() > 0)
            <div class="stats">
                <span class="stats-count">{{ $students->count() }}</span>
                <span class="stats-label">students enrolled</span>
            </div>

            <table class="students-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td data-label="Name">
                                <div class="student-name">
                                    <div class="student-avatar">
                                        {{ strtoupper(substr($student->name, 0, 1)) }}
                                    </div>
                                    <span class="name-text">{{ $student->name }}</span>
                                </div>
                            </td>
                            <td data-label="Course">
                                <span class="course-text">{{ $student->course }}</span>
                            </td>
                            <td data-label="Year">
                                <span class="year-badge">Year {{ $student->year }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <h2 class="empty-title">No students yet</h2>
                <p class="empty-text">Get started by adding your first student.</p>
                <a href="/students/create" class="add-btn">
                    <span>+</span>
                    Add Student
                </a>
            </div>
        @endif
    </div>
</body>
</html>
