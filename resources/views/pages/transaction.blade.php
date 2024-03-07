@extends('index')
@section('content')
    <section id="course">
        <div class="container py-5">
            <h1 style="font-size: 32px; font-weight: 650">
                <span class="bg-teal text-white" style="padding-left: 8px">
                    Transaction
                </span>
                &nbsp;Course
            </h1>
            <small>
                seamlessly paid your purchase using midtrans!
            </small>


            <div class="row">
                <h5>Transaction Detail</h5>

                <div class="col-lg-6 col-md-12 col-sm 12">
                    <input type="hidden" value="{{ $transaction->course->id }}" name="id">
                    <div class="mb-2">
                        <label for="name" class="form-label mb-0"><small>Course Name</small></label>
                        <input type="text" class="form-control" value="{{ $transaction->course->name }}" disabled>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="form-label mb-0"><small>Amount</small></label>
                        <input type="text" class="form-control" value="{{ $transaction->course->price }}" disabled>
                    </div>

                    <button id="btn-pay" class="btn rounded-btn btn-teal">
                        Pay Now <i class="bi bi-cart"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        var payButton = document.getElementById('btn-pay');
        payButton.addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    Swal.fire('Great!', 'Payment Success!', 'success').then(() => {
                        window.location.href = '{{ route('course.index') }}'
                    });
                },
                onPending: function(result) {
                    Swal.fire('Warning!', 'Waiting dor Your Payment', 'warning')
                    console.log(result);
                },
                onError: function(result) {
                    Swal.fire('Oops!', 'Payment Failed', 'error')
                    console.log(result);
                },
                onClose: function() {}
            });
        });
    </script>
@endpush
