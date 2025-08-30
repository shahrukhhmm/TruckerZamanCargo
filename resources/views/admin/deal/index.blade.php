@include('admin.component.header')
{{-- @include('admin.component.style') --}}
@include('admin.component.topnav')
@include('admin.component.navbar')

<style>
    .remove-deal-btn {
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        transition: background-color 0.2s;
    }
    .remove-deal-btn:hover {
        background-color: #c82333;
    }
    .remove-deal-btn i {
        font-size: 16px;
    }
    #add-deal-btn:disabled {
        opacity: 0.65;
        cursor: not-allowed;
    }
    #add-deal-btn .spinner-border {
        width: 1rem;
        height: 1rem;
        margin-right: 5px;
    }
</style>

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-md-8 p-5">
                            <!-- Inventory Form -->
                            <form action="{{ route('deals.store') }}" method="POST">
                                @csrf

                                @php
                                    $deal = \App\Models\Deal::orderBy('id','desc')->first();
                                    $deal = $deal ? $deal->toArray() : [];

                                    // Format date fields for HTML input[type=date]
                                    foreach (['date_of_loading', 'date_of_shipping', 'date'] as $dateField) {
                                        if (!empty($deal[$dateField])) {
                                            try {
                                                $deal[$dateField] = \Carbon\Carbon::parse($deal[$dateField])->format('Y-m-d');
                                            } catch (\Exception $e) {
                                                $deal[$dateField] = '';
                                            }
                                        }
                                    }
                                @endphp
                                <h4>Container Form</h4>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="container_number">Container Number</label>
                                        <input type="text" name="container_number" value="{{@$deal['container_number'] ?? ''}}" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date_of_loading">Date of loading</label>
                                        <input type="date" name="date_of_loading" value="{{@$deal['date_of_loading'] ?? ''}}" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date_of_shipping">Date of shipping</label>
                                        <input type="date" value="{{@$deal['date_of_shipping'] ?? ''}}" name="date_of_shipping" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="buyer_name">Buyer Name</label>
                                        <select name="customer_id" id="customer_id" class="form-select" required>
                                            <option value="" disabled {{ empty(@$deal['customer_id']) ? 'selected' : '' }}>Select buyer</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}" {{ @$deal['customer_id'] == $customer->id ? 'selected' : '' }}>
                                                    {{ $customer->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="shipping_mark">Shipping mark</label>
                                        <input type="text" name="shipping_mark" id="shipping_mark" value="{{$deal['shipping_mark'] ?? ''}}" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="place">Place</label>
                                        <input type="text" name="place" id="place" class="form-control" value="{{$deal['place'] ?? ''}}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" class="form-control" value="{{@$deal['date'] ?? ''}}" required>
                                    </div>

                                    <h4>Deal Form</h4>

                                    <!-- Container to append multiple deals -->
                                    <div id="deal-forms">
                                        <div class="deal-form row position-relative">
                                            <div class="form-group col-md-6">
                                                <label for="item_name">Item Name</label>
                                                <input type="text" name="deals[0][item_name]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="ctn">Carton</label>
                                                <input type="number" name="deals[0][ctn]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="quantity">Quantity / pcs</label>
                                                <input type="text" name="deals[0][quantity]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="weight">Weight</label>
                                                <input type="text" name="deals[0][weight]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="cbm">CBM</label>
                                                <input type="text" name="deals[0][cbm]" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="rate_type">Rate Type</label>
                                                <select name="deals[0][rate_type]" class="form-select" required>
                                                    <option value="" disabled selected>Select Rate Type</option>
                                                    <option value="CBM">CBM</option>
                                                    <option value="KG">KG</option>
                                                    <option value="PC">PC</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="rate">Rate</label>
                                                <input type="text" name="deals[0][rate]" class="form-control" required>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                    <!-- Button to add more deal forms -->
                                    <div class="form-group col-md-12 mt-4">
                                        <button type="button" class="btn btn-secondary" id="add-deal-btn">
                                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                            <span class="button-text">Add Another Deal</span>
                                        </button>
                                    </div>

                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
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
                                <h3 class="text-center m-2">Deals</h3>
                                <div class="card-header">
                                    <div class="col-md-12"
                                        style="background:white; display: flex; flex-wrap: wrap; flex-direction: row; justify-content: space-between;">
                                        <p style="margin-top: 14px;"><i class="fa fa-cart"></i></p>
                                        <form id="filter-form"
                                            style="display:flex; align-items:center; flex-wrap: nowrap; justify-content: space-between; margin-bottom: 0px;">
                                            <label for="from_date" class="me-2 h4"></label>
                                            <input type="date" id="from_date" class="me-2 form-control" name="from_date"
                                                style="width:40%;">
                                            <label for="to_date" class="me-2 h4">-</label>
                                            <input type="date" id="to_date" class="me-2 form-control" name="to_date"
                                                style="width:40%;">
                                            <button type="submit" class="me-2 btn btn-primary" style="padding: 9px;"><i
                                                    class="fas fa-check"></i></button>
                                        </form>
                                    </div>
                                </div>

                                <div class="card-body" v-cloak>
                                    <div class="table-responsive">
                                        <table class="table table-hover deal-listing table-listing table-hover"
                                            style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Buyer name</th>
                                                    <th>Container Number</th>
                                                    <th>Total Amount</th>
                                                    <th>Paid amount</th>
                                                    <th>Balance</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
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

{{-- DataTable script --}}
<script type="text/javascript">
    $(function() {
        setTimeout(function() {
            var table = $('.deal-listing').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/deal-list') }}",
                    data: function(d) {
                        d.from_date = $('#from_date').val();
                        d.to_date = $('#to_date').val();
                    }
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'customer.name', name: 'customer.name' },
                    { data: 'container_number', name: 'container_number' },
                    { data: 'total_amount', name: 'total_amount' },
                    { data: 'paid_amount', name: 'paid_amount' },
                    { data: 'balance', name: 'balance' },
                    { data: 'date', name: 'date' },
                    { data: 'status', name: 'status' },
                    {
                        data: 'action',
                        name: 'action',
                    }
                ],
                order: [[0, 'desc']]
            });

            $('#filter-form').on('submit', function(e) {
                e.preventDefault();
                $('.deal-listing').DataTable().ajax.reload();
            });
        }, 2000);
    });
</script>

{{-- Add and Remove Deal Forms Script --}}
<script>
    let dealIndex = 1;

    // Add new deal form
    document.getElementById('add-deal-btn').addEventListener('click', function () {
        const addButton = this;
        const spinner = addButton.querySelector('.spinner-border');
        const buttonText = addButton.querySelector('.button-text');

        addButton.disabled = true;
        spinner.classList.remove('d-none');
        buttonText.textContent = 'Submitting...';

        setTimeout(() => {
            const dealFormsContainer = document.getElementById('deal-forms');
            const newDealForm = document.querySelector('.deal-form').cloneNode(true);

            newDealForm.querySelectorAll('input, select').forEach(function (input) {
                const name = input.getAttribute('name');
                if (name) {
                    const newName = name.replace(/\d+/, dealIndex);
                    input.setAttribute('name', newName);
                    input.value = '';
                }
            });

            newDealForm.classList.add('position-relative');
            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn btn-danger btn-sm remove-deal-btn';
            removeBtn.style.position = 'absolute';
            removeBtn.style.top = '0px';
            removeBtn.style.right = '10px';
            removeBtn.innerHTML = '<i class="fas fa-times"></i>';
            newDealForm.appendChild(removeBtn);

            dealFormsContainer.appendChild(newDealForm);
            const hr = document.createElement('hr');
            dealFormsContainer.appendChild(hr);

            removeBtn.addEventListener('click', function () {
                if (confirm('Are you sure?')) {
                    newDealForm.nextElementSibling.remove();
                    newDealForm.remove();
                    reindexDealForms();
                }
            });

            addButton.disabled = false;
            spinner.classList.add('d-none');
            buttonText.textContent = 'Add Another Deal';

            dealIndex++;
        }, 500);
    });

    function reindexDealForms() {
        const dealForms = document.querySelectorAll('.deal-form');
        dealForms.forEach((form, index) => {
            form.querySelectorAll('input, select').forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    const newName = name.replace(/\d+/, index);
                    input.setAttribute('name', newName);
                }
            });
        });
        dealIndex = dealForms.length;
    }
</script>



<script>
    const getCustomerBtn = document.getElementById('customer_id');

    getCustomerBtn.addEventListener('change', function() {

        const customerId = document.getElementById('customer_id').value;
        if (customerId) {

            // console.log('Fetching customer data for ID:', customerId);

            fetch(`/get-customer/${customerId}`)
                .then(response => response.json())
                .then(data => {

                    console.log('Customer data fetched successfully:', data.details);

                    document.getElementById('shipping_mark').value = data.details || '';
                    document.getElementById('place').value = data.location || '';

                })
                .catch(error => console.error('Error fetching customer:', error));
        } else {
            alert('Please select a customer first.');
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('customer_id');
        const choices = new Choices(select, {
            searchEnabled: true,
            searchPlaceholderValue: 'Search buyer...',
            placeholder: true,
            placeholderValue: 'Select buyer',
            allowSearch: true,
            removeItemButton: true,
            noResultsText: 'No buyers found',
            noChoicesText: 'No buyers available'
        });
    });
</script>


{{-- delete pop up  --}}
<script>
    $(document).ready(function() {
        $(document).on('click', '.delete', function() {
            var dealId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/deal-delete') }}/" + dealId,
                        type: "GET",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'The Deal has been deleted.',
                                'success'
                            );
                            $('.deal-listing').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the customer.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>

