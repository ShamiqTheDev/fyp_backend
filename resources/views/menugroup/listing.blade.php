@include('components.create-button')
<div class="white-box">
    <h3 class="box-title">Listing</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top-0" width="50">#</th>
                    <th class="border-top-0"> Title</th>
                    <th class="border-top-0"> Tag</th>
                    <th class="border-top-0" width="300"> Actions </th>
                </tr>

            </thead>

            <tbody>
            	@foreach ($menuGroups as $menuGroup)
                    <tr>
                        <td> {{ $menuGroup->id }} </td>
                        <td> <a class="text-info" href="{{ route($prefix.'.view', $menuGroup->id) }}"> {{ $menuGroup->title }} </a> </td>
                        <td> {{ $menuGroup->tag }} </td>
                        <td>
                            <a class="text-primary" href="{{ route($prefix.'.edit', $menuGroup->id) }}"> Edit </a>
                        	| <a class="text-info" href="{{ route($prefix.'.view', $menuGroup->id) }}"> View </a>
                            | <a class="text-danger" href="{{ route($prefix.'.destroy', $menuGroup->id) }}"> Delete</a>
                        </td>
                    </tr>
            	@endforeach
                @if($menuGroups->count() < 1)
                    <tr>
                        <td colspan="4"> No Record Found!</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $menuGroups->links() }}
    </div>
</div>
