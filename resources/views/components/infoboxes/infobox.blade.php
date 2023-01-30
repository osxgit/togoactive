<div {{$attributes}}
        {{ $attributes->merge(['class' => 'float-left w-full']) }}>
    <div class="border-l-4 rounded-b text-teal-900 px-2 py-3 shadow-md" role="alert" style="border-color:#2F85EB;background-color:#FFFFFF">
        <div class="flex">
            <div class="pr-2"><i class="fa-solid fa-info" style="color: #2F85EB;"></i></div>
            <div>
                <p class="font-bold font-arial text-sm" style="color: #34353C;">{{$heading}}</p>
                <p class="float-left w-full text-sm mt-1 " style="color: #34353C;">
                    {{$sub_heading}}
                </p>
            </div>
        </div>
    </div>
</div>