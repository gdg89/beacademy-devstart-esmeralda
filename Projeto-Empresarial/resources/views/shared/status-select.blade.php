<select id="status" name="status" class="
  text-gray-700 bg-white border border-gray-300
    py-2 px-2 leading-8 rounded w-full md:w-[150px]
    focus:ring-2 focus:bg-transparent focus:ring-indigo-200
    text-md outline-none
    transition-colors duration-200 ease-in-out
">
    <option @if (!request()->status) selected @endif value="">
        Status
    </option>

    @foreach ($orders->statusList as $status)
    <option @if (request()->status === $status) selected @endif class="
        text-gray-700 bg-white
        hover:bg-indigo-500
        ">
        {{ $status }}
    </option>
    @endforeach
</select>
