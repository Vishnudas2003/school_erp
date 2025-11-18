@extends('adminlte::page')

@section('content')
<div class="table-container">
    <table id="studentList">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>

            <th>City</th>
            <th>Province</th>

            <th>Postal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{ $item['first_name'] }}</td>
                <td>{{ $item['last_name'] }}</td>

                <td>{{ $item['city'] }}</td>
                <td>{{ $item['province'] }}</td>

                <td>{{ $item['postal'] }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
</div>

@stop
@section('css')

<style>
    /* Table container for responsiveness */
.table-container {
    width: 100%;
    overflow-x: auto;
    margin: 20px 0;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

/* Base table styling */
table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #fff;
}

/* Table headers */
thead {
    background-color: #4779b9;
    color: white;
}

thead th {
    padding: 12px 15px;
    text-align: left;
    font-weight: 600;
}

/* Table body */
tbody td {
    padding: 12px 15px;
    border-bottom: 1px solid #e0e0e0;
    color: #333;
}

/* Row hover effect */
tbody tr:hover {
    background-color: #f1f1f1;
    transition: background-color 0.2s ease-in-out;
}

/* Alternate row coloring */
tbody tr:nth-child(even) {
    background-color: #fafafa;
}

/* Table footer (if used) */
tfoot {
    background-color: #f9f9f9;
    font-weight: bold;
}

/* Responsive for small screens */
@media (max-width: 768px) {
    thead {
        display: none;
    }

    tbody td {
        display: block;
        width: 100%;
        box-sizing: border-box;
    }

    tbody tr {
        margin-bottom: 15px;
        display: block;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 10px;
    }

    tbody td::before {
        content: attr(data-label);
        font-weight: bold;
        display: inline-block;
        width: 120px;
    }
}

</style>

@stop
@section('js')
    <script>

        $("#studentList").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "className": "cell-border compact stripe"
        });

    </script>
@stop
