<span class="float-right"> <a class="btn btn-dark" href="{{ route('users.register') }}"> Create </a></span>
<div class="white-box">
    <h3 class="box-title">Listing</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0" width="50">#</th>
                    <th class="border-top-0"> Name</th>
                    <th class="border-top-0"> Gender</th>
                    <th class="border-top-0"> Email </th>
                    <th class="border-top-0" width="300"> Actions </th>
                </tr>

            </thead>

            <tbody>
            	@foreach ($users as $user)
                    <tr>
                        <td> {{ $user->id }} </td>
                        <td> <a class="text-info" href="{{ route('users.view', $user->id) }}"> {{ $user->name }} </a> </td>
                        <td> {{ $user->gender }} </td>
                        <td> {{ $user->email }} </td>
                        <td>
                        	{{-- <a class="text-success" href="{{ route('fees.entry', $user->id) }}"> Fees Payment</a> --}}
                            <a class="text-primary" href="{{ route('users.edit', $user->id) }}"> Edit </a>
                        	| <a class="text-info" href="{{ route('users.view', $user->id) }}"> View </a>
                            | <a class="text-danger" href="{{ route('users.destroy', $user->id) }}"> Delete</a>
                        </td>
                    </tr>
            	@endforeach
                @if($users->count() < 1)
                    <tr>
                        <td> No Record Found!</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
