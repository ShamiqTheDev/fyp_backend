<span class="float-right"> <a class="btn btn-dark" href="{{ route('package.create') }}"> Create </a></span>
<div class="white-box">
    <h3 class="box-title">Packages</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0" width="50">#</th>
                    <th class="border-top-0"> Name</th>
                    <th class="border-top-0" > Details</th>
                    <th class="border-top-0"> Per Month Rs.</th>
                    <th class="border-top-0"> Advance Rs.</th>
                    <th class="border-top-0" width="150"> Actions </th>      
                </tr>

            </thead>

            <tbody>
            	@foreach ($packages as $package)
                    <tr>
                        <td> {{ $package->id }} </td>
                        <td> {{ $package->name }} </td>
                        <td> {{ $package->details }} </td>
                        <td> {{ $package->permonth_charges }} </td>
                        <td> {{ $package->advance }}</td>
                        <td> 
                        	<a class="text-primary" href="{{ route('package.edit', $package->id) }}"> Edit </a>
                        	| <a class="text-danger" href="{{ route('package.destroy', $package->id) }}"> Delete</a>

                        </td>
                    </tr>
            	@endforeach
                @if($packages->count() < 1)
                    <tr>
                        <td> No Record Found!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>