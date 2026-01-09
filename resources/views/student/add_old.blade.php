@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Student</h3>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
                <form action="{{ url('student/addStudent') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="p_email">Parent Email</label>
                            <input type="email" id="p_email" name="p_email" class="form-control">
                            <button id="check_p_email" class="badge">Check Availability</button>
                            <span id="p_found_badge" class="badge badge-success" style="display: none">Parent Found</span>
                            <span id="p_missing_badge" class="badge badge-danger" style="display: none">Parent Not
                                Found</span>
                        </div>



                        <!-- PARENT FORM START-->

                        <div style="display: none" id="parent_form" class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-header">
                                    <h1>Add Parent</h1>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                <label for="parent_first_name">Parent First Name</label>
                                <input type="text" id="parent_first_name" name="parent_first_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="parent_last_name">Parent Last Name</label>
                                <input type="text" id="parent_last_name" name="parent_last_name" class="form-control">
                            </div>


                            <div class="form-group">
                                <label for="parent_password">Parent Password</label>
                                <input type="password" id="parent_password" name="parent_password" class="form-control">
                            </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- PARENT FORM END-->

                        {{-- <div class="form-group">
                            <label for="parent_id">Parent</label>
                            <select name="parent_id" id="parent_id" class="parent_id custom-select rounded-0">
                                <option value="0">Select Parent</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <input type="hidden" name="parent_id" id="parent_id" class="parent_id">

                        <div class="form-group">
                            <label for="address_line_1">Address Line 1</label>
                            <input type="text" id="address_line_1" name="address_line_1" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address_line_2">Address Line 2</label>
                            <input type="text" id="address_line_2" name="address_line_2" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="province">Province</label>
                            <input type="text" id="province" name="province" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="postal">Postal Code</label>
                            <input type="text" id="postal" name="postal" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#check_p_email').click(function(event) {
                event.preventDefault();
                let p_email = $("#p_email").val();
                $.ajax({
                    url: "/admin/getParentByEmail",
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "email": p_email
                    },
                    success: function(data) {
                        if (!data.parent_id) {
                            $("#p_missing_badge").show()
                            $('#parent_form').show()
                            $("#p_found_badge").hide()
                            $("#parent_id").val(null)
                        } else {
                            $("#p_missing_badge").hide()
                            $("#p_found_badge").show()
                             $('#parent_form').hide()
                            $("#parent_id").val(data.parent_id)
                        }
                    }
                })

            })
        })
    </script>
@stop
