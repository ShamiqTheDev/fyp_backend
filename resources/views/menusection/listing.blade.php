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
                    <th class="border-top-0" width="150"> Image Link</th>
                    <th class="border-top-0"> Type</th>
                    <th class="border-top-0" width="150"> CSS Class</th>
                    <th class="border-top-0" width="300"> Actions </th>
                </tr>

            </thead>

            <tbody>
            	@foreach ($menuSections as $menuSection)
                    <tr>
                        <td> {{ $menuSection->id }} </td>
                        <td> {{ $menuSection->sort }} </td>
                        <td> <a class="text-info" href="{{ route($prefix.'.view', $menuSection->id) }}"> {{ $menuSection->title }} </a> </td>
                        <td> {{ $menuSection->link }} </td>
                        <td> {{ $menuSection->img_link }} </td>
                        <td> {{ $menuSection->type }} </td>
                        <td> {{ $menuSection->html_class }} </td>
                        <td>
                            <a class="text-primary" href="{{ route($prefix.'.edit', $menuSection->id) }}"> Edit </a>
                        	| <a class="text-info" href="{{ route($prefix.'.view', $menuSection->id) }}"> View </a>
                            | <a class="text-danger" href="{{ route($prefix.'.destroy', $menuSection->id) }}"> Delete</a>
                        </td>
                    </tr>
            	@endforeach
                @if($menuSections->count() < 1)
                    <tr>
                        <td colspan="8"> No Record Found!</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $menuSections->links() }}
    </div>
</div>
