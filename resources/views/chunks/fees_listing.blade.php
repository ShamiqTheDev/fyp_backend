<div class="white-box">
    <h3 class="box-title">Fees Listing</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0" width="50">#</th>
                    <th class="border-top-0"> User Name</th>
                    <th class="border-top-0"> Contact</th>
                    <th class="border-top-0"> Package</th>
                    <th class="border-top-0"> Amount</th>
                    <th class="border-top-0"> Date</th>
                    <th class="border-top-0" width="150"> Actions </th>      
                </tr>

            </thead>

            <tbody>
            	@foreach ($fees as $k => $fee)
                    <tr>
                        <td> {{ ($k+1) }} </td>
                        <td> <a class="text-info" href="{{ route('users.view', $fee->user->id) }}"> {{ $fee->user->name }} </a> </td>
                        <td> {{ $fee->user->detail->phone_number }} </td>
                        <td> {{ $fee->package->name }} </td>
                        <td> {{ $fee->amount }} </td>
                        <td> {{ $fee->created_at->diffForHumans() }}</td>
                        <td> 
                        	<a class="text-primary" href="{{ route('fees.edit', $fee->id) }}"> Edit </a>
                            | <a class="text-success" href="{{ route('users.view', $fee->user->id) }}"> Details </a>
                        </td>
                    </tr>
            	@endforeach
                @if($fees->count() < 1)
                    <tr>
                        <td> No Record Found!</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $fees->links() }}
    </div>
</div>