@include('admin.component.header')
{{-- @include('admin.component.style') --}}
@include('admin.component.topnav')
@include('admin.component.navbar')


<div class="content-body">
    <div class="container-fluid mt-3">

        <div class="row">

            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Client</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$clients}}</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>

        </div>


        <div class="row mt-4">
            <div class="col">
                <div class="card" style="overflow:auto; width:100% !important;">
                    <div class="card-header">
                        <div  class="col-md-12" style="background:white;  display: flex;  flex-wrap: wrap; flex-direction: row; justify-content: space-between;">

                            <p style="margin-top: 14px;"><i class="fa fa-user"></i>  <button class="btn btn-sm  btn-info ml-2 my-3 add" type="button">Add Client</button></p>


                            <form id="filter-form" style="display:flex; align-items:center;  flex-wrap: nowrap; justify-content: space-between; margin-bottom: 0px;">

                                <label for="from_date" class="me-2 h4"  ></label>
                                <input type="date" id="from_date"class="me-2 form-control"   name="from_date"  style="width:40%;">

                                <label for="to_date" class="me-2 h4" >-</label>
                                <input type="date" id="to_date" class="me-2 form-control" name="to_date"  style="width:40%;">

                                <button type="submit" class=" me-2 btn btn-primary" style="padding: 9px;"><i class="fas fa-check"></i></button>

                            </form>

                        </div>

                    </div>


                    <div class="card-body" v-cloak>

                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success</strong> &nbsp; {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif



                        <div class="table-responsive">
                            <table class="table table-hover client-listing table-listing table-hover " style=" width:100%;">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact</th>

                                        <th>Reference</th>
                                        <th>Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>



                    </div>


                </div>
            </div>
        </div>




          {{-- add Customer --}}
          <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Add Client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-dark">
                        <form id="addClientForm" enctype="multipart/form-data">
                            <div id="sending-message" class="text-danger fw-bold"></div>
                            <br>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="form-group col-md-12">

                                    <label class="control-label">Name</label>
                                    <input type="text" name="client_name" id="client_name" class="form-control" required>
                                    <label class="control-label">Date</label>
                                    <input type="date" name="client_date" id="client_date" class="form-control" required>
                                    <label class="control-label">Contact</label>
                                    <input type="text" name="client_contact" id="client_contact" class="form-control" required>
                                    <label class="control-label">Reference</label>
                                    <input type="text" name="client_reference" id="client_reference" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">


                             <button type="submit" class="btn btn-primary" >Submit</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    {{-- update customer --}}
    <div class="modal fade" id="editClient" tabindex="-1" role="dialog" saria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">

            <div class="modal-content ">

                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Edit Client </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-dark">

                    <input type="hidden" name="client_id" id="client_id">

                    <div id="update-message" class="text-danger fw-bold"></div>

                    <div class="row d-flex justify-content-center align-items-center">


                        <div class="form-group col-md-12">

                            <label class="control-label">Name</label>
                            <input type="text" name="update_name" id="update_name" class="form-control">

                            <label class="control-label">Date</label>
                                <input type="date" name="update_date" id="update_date" class="form-control">


                            <label class="control-label">Contact</label>
                                <input type="text" name="update_contact" id="update_contact" class="form-control">

                            <label class="control-label">reference</label>
                                <input type="text" name="update_reference" id="update_reference" class="form-control">


                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-lg-right " id="updateBtn">Update</button>

                </div>

            </div>
        </div>
    </div>
    </div>

</div>



@include('admin.component.footer')


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" defer></script>

<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">





<script type="text/javascript">
    $(function() {
        setTimeout(function() {
            var table = $('.client-listing').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/clients-list') }}",
                    data: function(d) {
                        d.from_date = $('#from_date').val();
                        d.to_date = $('#to_date').val();
                    }
                },

                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'contact',
                        name: 'contact'
                    },
                    {
                        data: 'reference',
                        name: 'reference'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [[0, 'desc']],
            });

            $('#filter-form').on('submit', function(e) {
                e.preventDefault();
                $('.client-listing').DataTable().ajax.reload();
            });

        }, 2000);
    });
</script>




<script>
   $(document).ready(function() {
    $('.add').click(function() {
        $('#addClient').modal('show');
    });

    $('#addClientForm').submit(function(e) {
        e.preventDefault();

        var form = $(this);
        var formData = new FormData(form[0]);

        $('#sending-message').text('Processing request, please wait...');

        $.ajax({
            url: "{{ url('/add-client') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#sending-message').text(response.success);
                // Reload the DataTable or update the UI as necessary
                $('.client-listing').DataTable().ajax.reload();
            },
            error: function(xhr) {
                $('#sending-message').text('Error occurred. Please try again.');
                console.log(xhr.responseText);
            },
            complete: function() {
                $('#addClient').modal('hide');
                $('#sending-message').text('');
            }
        });
    });
});

</script>




{{--  edit client --}}
<script>
    $(document).ready(function() {

        $(document).on('click', '.edit', function() {
            var clientId = $(this).val();

            $('#editClient').modal('show');

            $.ajax({
                type: "GET",
                url: "edit-client/" + clientId,
                success: function(response) {

                    $('#client_id').val(clientId);

                    $('#update_name').val(response.client.name);
                    $('#update_date').val(response.client.date);
                    $('#update_contact').val(response.client.contact);
                    $('#update_reference').val(response.client.reference);


                }
            });
        });
    });
</script>





{{-- update  --}}

<script>
    $(document).ready(function() {
        $('#updateBtn').on('click', function() {

            var clientId = $('#client_id').val();

            var name = $('#update_name').val();
            var date = $('#update_date').val();
            var contact = $('#update_contact').val();
            var reference = $('#update_reference').val();



            $('#update-message').text('Processing request, please wait...');

            $.ajax({
                url: "{{ url('/update-client') }}",
                type: 'GET',
                data: {
                    'clientId': clientId,
                    'name': name,
                    'date': date,
                    'contact': contact,
                    'reference': reference,

                },
                success: function(response) {},

                error: function(xhr) {

                    $('#update-message').text(xhr);
                },
                complete: function() {
                    $('#update-message').text('');
                    $('#editClient').modal('hide');
                    // location.reload();
                    $('.client-listing').DataTable().ajax.reload();
                }
            });

        });
    });
</script>
