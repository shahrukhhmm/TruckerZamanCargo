@include('admin.component.header')
@include('admin.component.topnav')
@include('admin.component.navbar')

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-md-8 p-5">
                            <h4 class="text-uppercase">Edit Deal Form</h4>
                            <br>

                            <!-- Edit Deal Form -->
                            <form action="{{ route('Deal.update') }}" method="POST">
                                @csrf

                                <!-- Hidden field to store deal ID -->
                                <input type="hidden" name="deal_Id" value="{{ $deal->id }}" class="form-control">

                                <h4>Container Form</h4>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="container_number">Container Number</label>
                                        <input type="text" name="container_number" value="{{ $deal->container_number }}" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date_of_loading">Date of Loading</label>
                                        <input type="date" name="date_of_loading" value="{{ @$deal->date_of_loading ? \Carbon\Carbon::parse($deal->date_of_loading)->format('Y-m-d') : '' }}" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date_of_shipping">Date of Shipping</label>
                                        <input type="date" name="date_of_shipping" value="{{ \Carbon\Carbon::parse($deal->date_of_shipping)->format('Y-m-d') }}" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="buyer_name">Buyer Name</label>
                                        <select name="customer_id" id="customer_id" class="form-select" required>
                                            <option value="" disabled selected>Select buyer</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}" {{ $deal->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="shipping_mark">Shipping mark</label>
                                        <input type="text" id="shipping_mark" name="shipping_mark" value="{{ $deal->shipping_mark }}" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="place">Place</label>
                                        <input type="text" id="place" name="place" value="{{ $deal->place }}" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" value="{{ \Carbon\Carbon::parse($deal->date)->format('Y-m-d') }}" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-select" required>
                                            <option value="" disabled selected>Change Status</option>
                                            <option value="Pending" {{ $deal->status == "Pending" ? 'selected' : '' }}>Pending</option>
                                            <option value="Partialy Paid" {{ $deal->status == "Partialy Paid" ? 'selected' : '' }}>Partialy Paid</option>
                                            <option value="Paid" {{ $deal->status == "Paid" ? 'selected' : '' }}>Paid</option>
                                        </select>
                                    </div>
                                </div>

                                <h4>Deal Form</h4>
                                <div id="deal-forms">
                                    @if(!empty($dealsData))
                                        @foreach($dealsData as $index => $data)
                                            <div class="deal-form row mb-4">
                                                 <div class="form-group col-md-12">
                                                    <button type="button" class="btn btn-danger remove-deal-btn" style="float: right">X</button>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="item_name">Item Name</label>
                                                    <input type="text" name="deals[{{ $index }}][item_name]" value="{{ $data['item_name'] }}" class="form-control" required>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="ctn">Carton</label>
                                                    <input type="number" name="deals[{{ $index }}][ctn]" value="{{ $data['ctn'] }}" class="form-control" required>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="quantity">Quantity</label>
                                                    <input type="text" name="deals[{{ $index }}][quantity]" value="{{ $data['quantity'] }}" class="form-control" required>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="weight">Weight</label>
                                                    <input type="text" name="deals[{{ $index }}][weight]" value="{{ $data['weight'] }}" class="form-control" required>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="cbm">CBM</label>
                                                    <input type="text" name="deals[{{ $index }}][cbm]" value="{{ $data['cbm'] }}" class="form-control" required>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="rate_type">Rate Type</label>
                                                    <select name="deals[{{ $index }}][rate_type]" class="form-select" required>
                                                        <option value="CBM" {{ $data['rate_type'] == 'CBM' ? 'selected' : '' }}>CBM</option>
                                                        <option value="KG" {{ $data['rate_type'] == 'KG' ? 'selected' : '' }}>KG</option>
                                                        <option value="PC" {{ $data['rate_type'] == 'PC' ? 'selected' : '' }} >PC</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="rate">Rate</label>
                                                    <input type="text" name="deals[{{ $index }}][rate]" value="{{ $data['rate'] }}" class="form-control" required>
                                                </div>


                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <!-- Button to add more deal forms -->
                                <div class="form-group col-md-12 mt-4">
                                    <button type="button" class="btn btn-secondary" id="add-deal-btn">Add Another Deal</button>
                                </div>

                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.component.footer')

<script>
    let dealIndex = {{ count($dealsData) }}; // Start with the number of deals from the database

    // Add new deal form
    document.getElementById('add-deal-btn').addEventListener('click', function () {
        const dealFormsContainer = document.getElementById('deal-forms');

        const newDealForm = `
            <div class="deal-form row mb-4">
                <div class="form-group col-md-12" style="text-align: right;">
                    <button type="button" class="btn btn-danger remove-deal-btn" style="float: right">X</button>
                </div>
                <div class="form-group col-md-6">
                    <label for="item_name">Item Name</label>
                    <input type="text" name="deals[${dealIndex}][item_name]" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="ctn">Carton</label>
                    <input type="number" name="deals[${dealIndex}][ctn]" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="deals[${dealIndex}][quantity]" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="weight">Weight</label>
                    <input type="text" name="deals[${dealIndex}][weight]" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="cbm">CBM</label>
                    <input type="text" name="deals[${dealIndex}][cbm]" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="rate_type">Rate Type</label>
                    <select name="deals[${dealIndex}][rate_type]" class="form-select" required>
                        <option value="CBM">CBM</option>
                        <option value="KG">KG</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="rate">Rate</label>
                    <input type="text" name="deals[${dealIndex}][rate]" class="form-control" required>
                </div>


            </div>
        `;

        dealFormsContainer.insertAdjacentHTML('beforeend', newDealForm);
        dealIndex++;
    });

    // Remove deal form
    document.getElementById('deal-forms').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-deal-btn')) {
            const dealForms = document.querySelectorAll('.deal-form');
            if (dealForms.length > 1) {
                e.target.closest('.deal-form').remove();
            } else {
                alert('At least one deal is required.');
            }
        }
    });


    document.querySelector('form').addEventListener('submit', function(){
        const btn = document.getElementById('updateBtn');
        btn.disabled = true;
        btn.textContent = 'Sending....';
    });

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

                    // Populate the form fields with customer data
                    document.getElementById('shipping_mark').value = data.details || '';
                    document.getElementById('place').value = data.location || '';

                })
                .catch(error => console.error('Error fetching customer:', error));
        } else {
            alert('Please select a customer first.');
        }
    });
</script>
