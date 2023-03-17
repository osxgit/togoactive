<div class="float-left w-full">
    <label for="{{$field_id}}" class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">
        {{$label_text}}
    </label>
    <p class="float-left w-full text-gray text-sm mt-1 {{$label_description_status}}">
        {{$label_description}}
    </p>
    <div  class = "float-left w-full bg-white flex items-center rounded-sm border border-ultralightgray p-1 mt-2" >
        <input {{$attributes->merge(['class' => 'float-left w-full border-0 bg-white h-8 font-poppins text-sm text-placeholder placeholder-gray-200 px-2'])}}>
        <span class="hidden" id="error_{{$field_id}}"><i class="fa fa-warning"></i></span>
    </div>
</div>
