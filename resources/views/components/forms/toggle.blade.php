<div class="float-left w-full">
    <label  for="{{$field_id}}" class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox"  {{$attributes->merge(['class' => 'sr-only peer'])}}>
        <div class="w-9 h-5 bg-white border border-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-purple-600" style="border-color:#BBBBBB"></div>

    </label>
    <span class="ml-3 text-lg text-placeholder font-poppins-bold">{{$label_text}}</span>
    <p class="float-left w-full text-gray text-sm mt-1 ">
        {{$label_description}}
    </p>

</div>