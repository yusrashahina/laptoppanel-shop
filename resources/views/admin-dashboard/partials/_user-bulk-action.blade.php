<select class="form-select js-select2" id="bulkActionSelect" data-search="off" data-placeholder="Bulk Action">
    <option value="">Bulk Action</option>

    {{-- Non-Trashed Users --}}
    @if(request()->input('filter.trashed') !== '1')
        @if(request()->input('filter.status') !== '1')
            <option value="activate">Activate</option>
        @endif
        @if(request()->input('filter.status') !== '0')
            <option value="suspend">Suspend</option>
        @endif
        <option value="trash">Move to Trash</option>
    @endif

    {{-- Trashed Users Only --}}
    @if(request()->input('filter.trashed') === '1')
        <option value="restore">Restore</option>
        <option value="delete">Permanently Delete</option>
    @endif
</select>
