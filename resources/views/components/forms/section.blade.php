<div {{ $attributes->merge(['class' => 'float-left w-full py-6 px-4 bg-white']) }} style="">
    <h1 class="float-left w-full font-poppins-bold text-2xl">
        <span>{{$section_heading}}</span><span>{{$section_button}}</span>
    </h1>
    <p class="float-left w-full text-gray text-sm mt-0 {{$section_heading_description_status}}">
        {{$section_heading_description_text}}
    </p>
    {{$section_content}}
</div>