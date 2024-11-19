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
                            <h4 class="text-uppercase">Deal Edit Form</h4>
                            <br>
                            <!-- Inventory Form -->
                            <form action="{{ route('trans.update') }}" method="POST">
                                @csrf

                                <input type="hidden" name="trans_Id" class="form-control" value="{{@$trans->id}}" required>


                                <div class="form-group">
                                    <label for="amount">Amount </label>
                                    <input type="text" name="amount" class="form-control" value="{{@$trans->amount}}"  required>
                                </div>


                                <div class="form-group">
                                    <label for="amount">Date </label>
                                    <input type="date" name="date" class="form-control" value="{{@$trans->date}}"  required>
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




    </div>
</div>

@include('admin.component.footer')

