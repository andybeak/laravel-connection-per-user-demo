<h1>Transactions</h1>

<table>
    <thead>
        <tr>
            <td>Date</td>
            <td>Received from</td>
            <td>Amount</td>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->created_at }}</td>
                <td>{{ $transaction->received_from }}</td>
                <td>£ {{ $transaction->amount }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
