<table id="tableAll" class="table table-striped table-bordered table-responsive ">
    <thead>
    <tr>
        <th>Enrol date</th>
        <th>LRN</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Middle Name</th>
        <th>Suffix</th>
        <th>House No./Street/Sitio</th>
        <th>Barangay</th>
        <th>Municipality</th>
        <th>Province</th>
        <th>Birthdate</th>
        <th>Birth Place (Municipality)</th>
        <th>Sex</th>
        <th>Civil Status</th>
        <th>PWD</th>
        <th>Religion</th>
        <th>Indigenous People (Specify)</th>
        <th>Mother Tongue</th>
        <th>Father's /Guardian Last Name</th>
        <th>Father's /Guardian First Name</th>
        <th>Father's /Guardian Middle Name</th>
        <th>Father's /Guardian Occupation</th>
        <th>Mother's Maiden Name Last Name</th>
        <th>Mother's Maiden Name First Name</th>
        <th>Mother's Maiden Name Middle Name</th>
        <th>Mother's Maiden Name Occupation</th>
        <th>Last Grade Level</th>
        <th>Why did you drop out of school? (for OSY only)</th>
        <th>Other</th>
        <th>Have you attended ALS learning session before?</th>
        <th>Name of the Program</th>
        <th>Level of Literacy</th>
        <th>Year Attended</th>
        <th>Have you completed the program?</th>
        <th>If NO, state the reason</th>
        <th>In Kms</th>
        <th>In hours and minutes</th>
        <th>How do you get from your home to Learning Center</th>
        <th>Others(Pls. specify)</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th>Sunday</th>
    </tr>
    </thead>
    <tbody>
        @foreach( $data as $row )
            <tr>
                <td>{{ $row->enroldate }}</td>
                <td>{{ $row->lrn }}</td>
                <td>{{ $row->lastname }}</td>
                <td>{{ $row->firstname }}</td>
                <td>{{ $row->middlename }}</td>
                <td>{{ $row->suffix }}</td>
                <td>{{ $row->street }}</td>
                <td>{{ $row->barangay }}</td>
                <td>{{ $row->municipality }}</td>
                <td>{{ $row->province }}</td>
                <td>{{ $row->birthday }}</td>
                <td>{{ $row->birthplace }}</td>
                <td>{{ $row->sex }}</td>
                <td>{{ $row->civilstatus }}</td>
                <td>{{ $row->pwd }}</td>
                <td>{{ $row->religion }}</td>
                <td>{{ $row->indigenous }}</td>
                <td>{{ $row->mothertongue }}</td>
                <td>{{ $row->flastname }}</td>
                <td>{{ $row->ffirstname }}</td>
                <td>{{ $row->fmiddlename }}</td>
                <td>{{ $row->foccupation }}</td>
                <td>{{ $row->mlastname }}</td>
                <td>{{ $row->mfirstname }}</td>
                <td>{{ $row->mmiddlename }}</td>
                <td>{{ $row->moccupation }}</td>
                <td>{{ $row->lastgrade }}</td>
                <td>{{ $row->dropout }}</td>
                <td>{{ $row->dropoutother }}</td>
                <td>{{ $row->attendedals }}</td>
                <td>{{ $row->programname }}</td>
                <td>{{ $row->literacylevel }}</td>
                <td>{{ $row->yearattended }}</td>
                <td>{{ $row->completedprogram }}</td>
                <td>{{ $row->notcompletedreason }}</td>
                <td>{{ $row->inkms }}</td>
                <td>{{ $row->inhours }}</td>
                <td>{{ $row->transportationtocenter }}</td>
                <td>{{ $row->othertransportation }}</td>
                <td>{{ $row->sessionmonday }}</td>
                <td>{{ $row->sessiontuesday }}</td>
                <td>{{ $row->sessionwednesday }}</td>
                <td>{{ $row->sessionthursday }}</td>
                <td>{{ $row->sessionfriday }}</td>
                <td>{{ $row->sessionsaturday }}</td>
                <td>{{ $row->sessionsunday }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


@push('scripts')
    <script>
        $(document).ready(()=> {
            tableAll = $('#tableAll').DataTable({
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
                    {data: 'enroldate', name: 'enroldate'},
                    {data: 'lrn', name: 'lrn'},
                    {data: 'firstname', name: 'firstname'},
                    {data: 'lastname', name: 'lastname'},
                    {data: 'middlename', name: 'middlename'},
                    {data: 'suffix', name: 'suffix'},
                    {data: 'street', name: 'street'},
                    {data: 'barangay', name: 'barangay'},
                    {data: 'municipality', name: 'municipality'},
                    {data: 'province', name: 'province'},
                    {data: 'birthday', name: 'birthday'},
                    {data: 'birthplace', name: 'birthplace'},
                    {data: 'sex', name: 'sex'},
                    {data: 'civilstatus', name: 'civilstatus'},
                    {data: 'pwd', name: 'pwd'},
                    {data: 'religion', name: 'religion'},
                    {data: 'indigenous', name: 'indigenous'},
                    {data: 'mothertongue', name: 'mothertongue'},
                    {data: 'flastname', name: 'flastname'},
                    {data: 'ffirstname', name: 'ffirstname'},
                    {data: 'fmiddlename', name: 'fmiddlename'},
                    {data: 'foccupation', name: 'foccupation'},
                    {data: 'mlastname', name: 'mlastname'},
                    {data: 'mfirstname', name: 'mfirstname'},
                    {data: 'mmiddlename', name: 'mmiddlename'},
                    {data: 'moccupation', name: 'moccupation'},
                    {data: 'lastgrade', name: 'lastgrade'},
                    {data: 'dropout', name: 'dropout'},
                    {data: 'dropoutother', name: 'dropoutother'},
                    {data: 'attendedals', name: 'attendedals'},
                    {data: 'programname', name: 'programname'},
                    {data: 'literacylevel', name: 'literacylevel'},
                    {data: 'yearattended', name: 'yearattended'},
                    {data: 'completedprogram', name: 'completedprogram'},
                    {data: 'notcompletedreason', name: 'notcompletedreason'},
                    {data: 'inkms', name: 'inkms'},
                    {data: 'inhours', name: 'inhours'},
                    {data: 'transportationtocenter', name: 'transportationtocenter'},
                    {data: 'othertransportation', name: 'othertransportation'},
                    {data: 'sessionmonday', name: 'sessionmonday'},
                    {data: 'sessiontuesday', name: 'sessiontuesday'},
                    {data: 'sessionwednesday', name: 'sessionwednesday'},
                    {data: 'sessionthursday', name: 'sessionthursday'},
                    {data: 'sessionfriday', name: 'sessionfriday'},
                    {data: 'sessionsaturday', name: 'sessionsaturday'},
                    {data: 'sessionsunday', name: 'sessionsunday'}
                ],
            });
        });
    </script>
@endpush
