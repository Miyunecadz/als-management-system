@extends('layout.navigations')

@section('contents')

    <div class="card p-3 overflow-auto">

        <table id="myTable" class="table table-striped table-bordered ">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Designation Name</th>
                <th>Username</th>
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
                        method: 'GET' // Ajax HTTP method
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


                datatable = $('#myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    pagingType: 'simple',
                    dom: '<"d-flex flex-column-reverse flex-md-row justify-content-md-between"<"col-md-3 col-12"B><"col-md-4 col-12 mb-2"f>>t<"d-flex justify-content-between"ip>',
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
                        url : "{{ route('all.users') }}",
                        method: 'GET',
                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                        pages: 5,
                    }),
                    columns: [
                        {data: 'fullname', name: 'fullname'},
                        {data: 'designation', name: 'designation'},
                        {data: 'username', name: 'username'},
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
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

@endsection
