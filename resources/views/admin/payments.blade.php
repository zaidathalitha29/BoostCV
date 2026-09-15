@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Payments</h1>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Proof</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->order_id }}</td>
                        <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                        <td>{{ $payment->method }}</td>
                        <td>
                            @if ($payment->proof)
                                <a href="{{ asset('storage/' . $payment->proof) }}" target="_blank">
                                    Lihat Bukti
                                </a>
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td>{{ $payment->status }}</td>
                        <td>

                            @if ($payment->status == 'pending')

                                <form action="{{ route('payments.verify', $payment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Verify
                                    </button>
                                </form>

                                <form action="{{ route('payments.reject', $payment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Reject
                                    </button>
                                </form>

                            @else
                                -
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection