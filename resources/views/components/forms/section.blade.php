<div {{ $attributes->merge(['class' => 'float-left w-full py-6 px-4 bg-white']) }}>
    <h1 class="float-left w-full font-poppins-bold text-2xl">
        {{$section_heading}}
    </h1>
    <p class="float-left w-full text-gray text-sm mt-2 {{$section_heading_description_status}}">
        {{$section_heading_description_text}}
    </p>
    {{$section_content}}
</div>