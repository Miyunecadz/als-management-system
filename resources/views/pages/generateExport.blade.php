@extends('layout.navigations')

@section('contents')
    <div class="p-3">

        <div class="card p-2">
            <form action="{{ route('generateTable') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <select name="exporttype" id="exporttype" class="form-control"
                                    aria-describedby="exporttype-Validation">
                                <option value="column">Columns</option>
                                <option value="total">Total Students</option>
                            </select>
                            <label for="exporttype">Export Type</label>
                        </div>
                    </div>

                    <span class="text-gray mb-2">Filter
                    <div id="addFilter" class="btn btn-success btn-sm">
                        <i  class="bi bi-plus-circle"></i>
                        Add Filter
                    </div>
                </span>

                    <div id="filters">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <select name="colname[]" id="colname" class="form-control"
                                            aria-describedby="colname-Validation">
                                        <option value="">-None-</option>
                                        <option value="enroldate">Enrol Date</option>
                                        <option value="lrn">LRN</option>
                                        <option value="lastname">Last Name</option>
                                        <option value="firstname">First Name</option>
                                        <option value="middlename">Middle Name</option>
                                        <option value="suffix">Suffix</option>
                                        <option value="street">House No./Street/Sitio</option>
                                        <option value="barangay">Barangay</option>
                                        <option value="municipality">Municipality</option>
                                        <option value="province">Province</option>
                                        <option value="birthday">Birthdate</option>
                                        <option value="birthplace">Birth Place (Municipality)</option>
                                        <option value="sex">Sex</option>
                                        <option value="civilstatus">Civil Status</option>
                                        <option value="pwd">PWD</option>
                                        <option value="religion">Religion</option>
                                        <option value="indigenous">Indigenous People (Specify)</option>
                                        <option value="mothertongue">Mother Tongue</option>
                                        <option value="flastname">Father's /Guardian Last Name</option>
                                        <option value="ffirstname">Father's /Guardian First Name</option>
                                        <option value="fmiddlename">Father's /Guardian Middle Name</option>
                                        <option value="foccupation">Father's /Guardian Occupation</option>
                                        <option value="mlastname">Mother's Maiden Last Name</option>
                                        <option value="mfirstname">Mother's Maiden First Name</option>
                                        <option value="mmiddlename">Mother's Maiden Middle Name</option>
                                        <option value="moccupation">Mother's Maiden Occupation</option>
                                        <option value="lastgrade">Last Grade Level</option>
                                        <option value="dropout">Why did you drop out of school? (for OSY only)</option>
                                        <option value="dropoutother">Other</option>
                                        <option value="attendedals">Have you attended ALS learning session before?</option>
                                        <option value="programname">Name of the Program</option>
                                        <option value="literacylevel">Level of Literacy</option>
                                        <option value="yearattended">Year Attended</option>
                                        <option value="completedprogram">Have you completed the program?</option>
                                        <option value="notcompletedreason">If NO, state the reason</option>
                                        <option value="inkms">In Kms</option>
                                        <option value="inhours">In hours and minutes</option>
                                        <option value="transportationtocenter">How do you get from your home to Learning Center</option>
                                        <option value="othertransportation">Others(Pls. specify)</option>
                                        <option value="sessionmonday">Monday</option>
                                        <option value="sessiontuesday">Tuesday</option>
                                        <option value="sessionwednesday">Wednesday</option>
                                        <option value="sessionthursday">Thursday</option>
                                        <option value="sessionfriday">Friday</option>
                                        <option value="sessionsaturday">Saturday</option>
                                        <option value="sessionsunday">Sunday</option>
                                    </select>
                                    <label for="colname">Column Name</label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-floating">
                                    <input type="text" name="filter[]" class="form-control" placeholder="Enter.."
                                           aria-describedby="filter-Validation">
                                    <label for="filter">Filter</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="submit" id="generateBtn" class="btn btn-success col-md-3 mx-3" value="Generate">
                </div>
            </form>

        </div>



        <div class="card mt-3 p-3 overflow-auto">
            @includeWhen($displayTable == 'all', 'pages.reports.allcolumn')
            @includeWhen($displayTable == 'total', 'pages.reports.total')
        </div>
    </div>

    @push('scripts')
        <script>
            $(()=> {
                $('#addFilter').click( () => {
                   $('#filters .row').first().clone().appendTo($('#filters')).find("input[type='text']").val("");

                });
            });
        </script>
    @endpush
@endsection
