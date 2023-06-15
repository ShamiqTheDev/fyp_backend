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
                    <th class="border-top-0" width="150"> CSS Class</th>
                    <th class="border-top-0" width="300"> Actions </th>
                </tr>

            </thead>

            <tbody>
            	@foreach ($sectionLinks as $sectionLink)
                    <tr>
                        <td> {{ $sectionLink->id }} </td>
                        <td> {{ $sectionLink->sort }} </td>
                        <td> <a class="text-info" href="{{ route($prefix.'.view', $sectionLink->id) }}"> {{ $sectionLink->title }} </a> </td>
                        <td> {{ $sectionLink->link }} </td>
                        <td> {{ $sectionLink->img_link }} </td>
                        <td> {{ $sectionLink->html_class }} </td>
                        <td>
                            <a class="text-primary" href="{{ route($prefix.'.edit', $sectionLink->id) }}"> Edit </a>
                        	| <a class="text-info" href="{{ route($prefix.'.view', $sectionLink->id) }}"> View </a>
                            | <a class="text-danger" href="{{ route($prefix.'.destroy', $sectionLink->id) }}"> Delete</a>
                        </td>
                    </tr>
            	@endforeach
                @if($sectionLinks->count() < 1)
                    <tr>
                        <td colspan="8"> No Record Found!</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $sectionLinks->links() }}
    </div>
</div>
