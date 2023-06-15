@include('components.create-button')
<div class="white-box">
    <h3 class="box-title">Listing</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0" width="50">#</th>
                    <th class="border-top-0"> Order</th>
                    <th class="border-top-0"> Title </th>
                    <th class="border-top-0"> Link</th>
                    <th class="border-top-0" width="100"> CSS Class</th>
                    <th class="border-top-0" width="300"> Actions </th>
                </tr>

            </thead>

            <tbody>
            	@foreach ($mainMenues as $mainMenu)
                    <tr>
                        <td> {{ $mainMenu->id }} </td>
                        <td> {{ $mainMenu->sort }} </td>
                        <td> <a class="text-info" href="{{ route($prefix.'.view', $mainMenu->id) }}"> {{ $mainMenu->title }} </a> </td>
                        <td> {{ $mainMenu->link }} </td>
                        <td> {{ $mainMenu->html_class }} </td>
                        <td>
                            <a class="text-primary" href="{{ route($prefix.'.edit', $mainMenu->id) }}"> Edit </a>
                        	| <a class="text-info" href="{{ route($prefix.'.view', $mainMenu->id) }}"> View </a>
                            | <a class="text-danger" href="{{ route($prefix.'.destroy', $mainMenu->id) }}"> Delete</a>
                        </td>
                    </tr>
            	@endforeach
                @if($mainMenues->count() < 1)
                    <tr>
                        <td colspan="6"> No Record Found!</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $mainMenues->links() }}
    </div>
</div>
