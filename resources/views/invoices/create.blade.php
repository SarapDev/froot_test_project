@extends('layouts.app')
@section('content')
    @if(!isset($invoice))
    <div class="createPage">
        <h1>Create page</h1>
    </div>
    <div class="invoiceForm">
            <form id="createForm">
    @else
    <div class="createPage">
        <h1>Update page</h1>
    </div>
    <div class="invoiceForm">
            <form id="updateForm">
                @method('PUT')
        @endif
            @csrf
            <div class="formGroup">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Number" name="number" value="{{ $invoice->number ?? '' }}">
                        <div class="invalid-feedback" id="number"></div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Format: YYYY-MM-DD" name="invoice_date" value="{{ $invoice->invoice_date ?? '' }}">
                        <div class="invalid-feedback" id="invoice_date"></div>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Format: YYYY-MM-DD" name="supply_date" value="{{ $invoice->supply_date ?? '' }}">
                        <div class="invalid-feedback" id="supply_date"></div>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="comment mt-2">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment">{{ $invoice->comment ?? '' }}</textarea>
                </div>
            </div>
            <div class="submitButton mt-2">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>

    </div>

<script>
    $(document).ready(function () {
        $("#createForm").on('submit',
            function (e) {
                let form = $("#createForm");

                e.preventDefault();

                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').text('');

                $.ajax({
                    url: "/create",
                    type: "POST",
                    data: form.serialize(),
                    success: function() {
                        window.location.replace('/');
                    },
                    error: function (data) {
                        $.each(data.responseJSON.errors, function (key, value) {
                            $(`input[name="${key}"]`).addClass('is-invalid');
                            $(`#${key}`).append(value);
                        })
                    }
                })
            });

        $("#updateForm").on('submit',
            function (e) {
                let form = $("#updateForm");

                e.preventDefault();

                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').text('');

                $.ajax({
                    url: "/update/" + window.location.pathname.split('/')[2],
                    type: "POST",
                    data: form.serialize(),
                    success: function() {
                        window.location.href = '/';
                    },
                    error: function (data) {
                        $.each(data.responseJSON.errors, function (key, value) {
                            $(`input[name="${key}"]`).addClass('is-invalid');
                            $(`#${key}`).append(value);
                        })
                    }
                })
            }
        );
    });

</script>
@endsection
