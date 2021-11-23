<table id="tableTotal" class="table table-striped table-bordered table-responsive ">
    <thead>
    <tr>
        <th>Barangay</th>
        <th>Municipality</th>
        <th>Province</th>
        <th>Total Male</th>
        <th>Total Female</th>
    </tr>
    </thead>
    <tbody>
        @foreach( $data as $row )
            <tr>
                <td>{{ $row->barangay }}</td>
                <td>{{ $row->municipality }}</td>
                <td>{{ $row->province }}</td>
                <td>{{ $row->total_male }}</td>
                <td>{{ $row->total_female }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


@push('scripts')
    <script>
        $(document).ready(()=>{
            tableTotal = $('#tableTotal').DataTable({
                responsive: true,
                paging:   false,
                ordering: false,
                info:     false,
                dom: '<"d-flex flex-column-reverse flex-md-row justify-content-md-between"<"col-md-3 col-12"B><"col-md-4 col-12 mb-2">>t',
                buttons: [
                    {
                        extend: 'csv',
                    },
                    {
                        extend: 'excel',
                    },
                    {
                        extend: 'pdf',
                    }
                ],
                columns: [
                    {data: 'barangay', name: 'barangay'},
                    {data: 'municipality', name: 'municipality'},
                    {data: 'province', name: 'province'},
                    {data: 'total_male', name: 'total_male'},
                    {data: 'total_female', name: 'total_female'},
                ],
            });
        });
    </script>
@endpush
