<select id="status" name="status" class="select-status md:w-[200px]">
    <option @if (!request()->status) selected @endif value="">
        Status
    </option>

    @foreach ($orders->statusList as $status)
    <option @if (request()->status === $status) selected @endif class="select-option-status">
        {{ $status }}
    </option>
    @endforeach
</select>
