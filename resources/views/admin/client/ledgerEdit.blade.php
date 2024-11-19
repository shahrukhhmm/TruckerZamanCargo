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
                            <h4 class="text-uppercase">Client ledger Form</h4>
                            <br>
                            <!-- Inventory Form -->
                            <form action="{{ route('ledger.update') }}" method="POST">
                                @csrf

                                <input type="hidden" name="ledger_Id" class="form-control" value="{{@$ledger->id}}" required>


                                <div class="form-group">
                                    <label for="amount">Amount </label>
                                    <input type="text" name="amount" class="form-control" value="{{@$ledger->amount}}"  required>
                                </div>


                                <div class="form-group">
                                    <label for="amount">Date </label>
                                    <input type="date" name="date" class="form-control" value="{{@$ledger->date}}"  required>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Detail </label>
                                    <input type="text" name="detail" class="form-control" value="{{@$ledger->detail}}"  required>
                                </div>

                                <div class="form-group">
                                    <label for="item_number">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="" selected disabled>Select status</option>

                                        <option value="Paid" {{ $ledger->status == "Paid" ? 'selected' : '' }}> Paid</option>
                                        <option value="Used" {{ $ledger->status == "Used" ? 'selected' : '' }}>Used</option>

                                    </select>
                                </div>

                                <div class="d-flex justify-content-center">

                                    <button type="submit" class="btn btn-primary">Update</button>
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

