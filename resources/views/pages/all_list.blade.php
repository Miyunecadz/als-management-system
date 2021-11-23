<a href="{{ route('listals') }}" class="btn btn-primary ms-3 my-3">
    Show Few Column
</a>

<div class="card p-3 mx-3 overflow-auto">

    <table id="myTable" class="table table-striped table-bordered table-responsive ">
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
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>


@push('scripts')
    <script>
        $(function() {

            //
// Pipelining function for DataTables. To be used to the `ajax` option of DataTables
//
            $.fn.dataTable.pipeline = function ( opts ) {
                // Configuration options
                var conf = $.extend( {
                    pages: 5,     // number of pages to cache
                    url: '',      // script url
                    data: null,   // function or object with parameters to send to the server
                                  // matching how `ajax.data` works in DataTables
                    method: 'POST' // Ajax HTTP method
                }, opts );

                // Private variables for storing the cache
                var cacheLower = -1;
                var cacheUpper = null;
                var cacheLastRequest = null;
                var cacheLastJson = null;

                return function ( request, drawCallback, settings ) {
                    var ajax          = false;
                    var requestStart  = request.start;
                    var drawStart     = request.start;
                    var requestLength = request.length;
                    var requestEnd    = requestStart + requestLength;

                    if ( settings.clearCache ) {
                        // API requested that the cache be cleared
                        ajax = true;
                        settings.clearCache = false;
                    }
                    else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
                        // outside cached data - need to make a request
                        ajax = true;
                    }
                    else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
                        JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
                        JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
                    ) {
                        // properties changed (ordering, columns, searching)
                        ajax = true;
                    }

                    // Store the request for checking next time around
                    cacheLastRequest = $.extend( true, {}, request );

                    if ( ajax ) {
                        // Need data from the server
                        if ( requestStart < cacheLower ) {
                            requestStart = requestStart - (requestLength*(conf.pages-1));

                            if ( requestStart < 0 ) {
                                requestStart = 0;
                            }
                        }

                        cacheLower = requestStart;
                        cacheUpper = requestStart + (requestLength * conf.pages);

                        request.start = requestStart;
                        request.length = requestLength*conf.pages;

                        // Provide the same `data` options as DataTables.
                        if ( typeof conf.data === 'function' ) {
                            // As a function it is executed with the data object as an arg
                            // for manipulation. If an object is returned, it is used as the
                            // data object to submit
                            var d = conf.data( request );
                            if ( d ) {
                                $.extend( request, d );
                            }
                        }
                        else if ( $.isPlainObject( conf.data ) ) {
                            // As an object, the data given extends the default
                            $.extend( request, conf.data );
                        }

                        return $.ajax( {
                            "type":     conf.method,
                            "url":      conf.url,
                            "data":     request,
                            "dataType": "json",
                            "cache":    false,
                            "success":  function ( json ) {
                                cacheLastJson = $.extend(true, {}, json);

                                if ( cacheLower != drawStart ) {
                                    json.data.splice( 0, drawStart-cacheLower );
                                }
                                if ( requestLength >= -1 ) {
                                    json.data.splice( requestLength, json.data.length );
                                }

                                drawCallback( json );
                            }
                        } );
                    }
                    else {
                        json = $.extend( true, {}, cacheLastJson );
                        json.draw = request.draw; // Update the echo for each response
                        json.data.splice( 0, requestStart-cacheLower );
                        json.data.splice( requestLength, json.data.length );

                        drawCallback(json);
                    }
                }
            };

// Register an API method that will empty the pipelined data, forcing an Ajax
// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
            $.fn.dataTable.Api.register( 'clearPipeline()', function () {
                return this.iterator( 'table', function ( settings ) {
                    settings.clearCache = true;
                } );
            } );


            $('#myTable thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#myTable thead');

            datatable = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                // responsive: true,
                pagingType: 'simple',
                dom: '<"d-flex flex-column-reverse flex-md-row justify-content-md-between"<"col-md-3 col-12"B><"col-md-4 col-12 mb-2"f>>t<"d-flex justify-content-between"ip>',

                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function () {
                    var api = this.api();
                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function (colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html('<input type="text" placeholder="' + title + '" />');

                            // On every keypress in this input
                            $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                                .off('keyup change')
                                .on('keyup change', function (e) {
                                    e.stopPropagation();

                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    if(this.value.length >= 3 || e.keyCode == 13) {
                                        // Call the API search function
                                        api
                                            .column(colIdx)
                                            .search(
                                                this.value != ''
                                                    ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                    : '',
                                                this.value != '',
                                                this.value == '',
                                            )
                                            .draw();
                                    }
                                    // Ensure we clear the search if they backspace far enough
                                    if(this.value == "") {
                                        api
                                            .column(colIdx)
                                            .search(
                                                this.value != ''
                                                    ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                    : '',
                                                this.value != '',
                                                this.value == '',
                                            )
                                            .draw();
                                    }


                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
                buttons: [
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    }
                ],
                ajax: $.fn.dataTable.pipeline( {
                    url : "{{ route('student') }}",
                    method: 'POST',
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    data: {"_token": "{{ csrf_token() }}"},
                    pages: 5,
                }),
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
                    {data: 'sessionsunday', name: 'sessionsunday'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    {{ auth()->user()->isAdmin() == true? 'visible: false' : '' }}
                    },
                ],
            });

            $('.dataTables_filter input')
                .unbind()
                .bind("input", function(e) { // Bind our desired behavior
                    // If the length is 3 or more characters, or the user pressed ENTER, search
                    if(this.value.length >= 3 || e.keyCode == 13) {
                        // Call the API search function
                        datatable.search(this.value).draw();
                    }
                    // Ensure we clear the search if they backspace far enough
                    if(this.value == "") {
                        datatable.search("").draw();
                    }
                    return;
                });

            // $('#searchDtable').keyup(function() {
            //     datatable.search($(this).val()).draw();
            // });
        })
    </script>
@endpush
