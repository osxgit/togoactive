<div {{$attributes}}
        {{ $attributes->merge(['class' => 'float-left w-full']) }}>
    <div class="flex mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
        <i class="fa fa-info flex justify-center items-center px-3 text-white" aria-hidden="true" style="background-color: #FFD337"></i>
        <span class="sr-only">Info</span>
        <div class=" p-2  font-poppins font-thin" style="color: #34353C;">
            {{$heading}}
        </div>
    </div>
</div>