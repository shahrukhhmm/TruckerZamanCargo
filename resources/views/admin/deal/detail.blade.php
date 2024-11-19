@include('admin.component.header')
{{-- @include('admin.component.style') --}}
@include('admin.component.topnav')
@include('admin.component.navbar')

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-md-8 p-5">
                            <h4>Add Transaction </h4>
                            {{-- <a class="btn btn-sm btn-secondary ml-2 my-3" href="{{ url('/transaction-history/'.$deal->id) }}" role="button"><i class="fa-solid fa-print"></i></a> --}}
                            <!-- Inventory Form -->
                            <form action="{{ route('transaction.store') }}" method="POST">
                                @csrf

                                <input type="hidden" value="{{@$deal->id}}"
                                id="deal_id"
                                name="deal_id" class="form-control" >

                                <input type="hidden" value="{{@$deal->customer->id}}" name="customer_id" class="form-control" >


                                <div class="form-group">
                                    <label for="container_number">Amount</label>
                                    <input type="number" name="amount" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="item_number">Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>

                                <div class="d-flex justify-content-center">

                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

            <div class="row mt-4">
                <div class="col">
                    <div class="card" style="overflow:auto; width:100% !important;">
                        <h3 class="text-center m-2">Transaction</h3>
                        <div class="card-header">
                            <div class="col-md-12"
                                style="background:white;  display: flex;  flex-wrap: wrap; flex-direction: row; justify-content: space-between;">

                                <p style="margin-top: 14px;"><i class="fa fa-cart"></i> </p>


                                <form id="filter-form"
                                    style="display:flex; align-items:center;  flex-wrap: nowrap; justify-content: space-between; margin-bottom: 0px;">

                                    <label for="from_date" class="me-2 h4"></label>
                                    <input type="date" id="from_date"class="me-2 form-control" name="from_date"
                                        style="width:40%;">

                                    <label for="to_date" class="me-2 h4">-</label>
                                    <input type="date" id="to_date" class="me-2 form-control" name="to_date"
                                        style="width:40%;">

                                    <button type="submit" class=" me-2 btn btn-primary" style="padding: 9px;"><i
                                            class="fas fa-check"></i></button>

                                </form>

                            </div>

                        </div>


                        <div class="card-body" v-cloak>



                            <div class="table-responsive">
                                <table class="table table-hover trans-listing table-listing table-hover "
                                    style=" width:100%;">
                                    <thead>
                                        <tr>

                                            <th>Id</th>
                                            {{-- <th>Item Name</th> --}}
                                            <th>Amount</th>
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




{{-- data table  --}}
<script type="text/javascript">
    $(function() {
        setTimeout(function() {
            var table = $('.trans-listing').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/trans-list') }}",
                    data: function(d) {
                        d.from_date = $('#from_date').val();
                        d.to_date = $('#to_date').val();
                        d.deal_id = $('#deal_id').val();

                    }
                },

                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },

                    // {
                    //     data: 'deal.item_name',
                    //     name: 'deal.item_name'
                    // },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                order: [
                    [0, 'desc']
                ],
            });

            $('#filter-form').on('submit', function(e) {
                e.preventDefault();
                $('.trans-listing').DataTable().ajax.reload();
            });

        }, 2000);
    });
</script>

