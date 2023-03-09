<x-app-layout>
    @include('layouts.admin.events.subheader')
    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">

                @if(session()->has('message'))
                    <x-infoboxes.success class="mt-4">
                        <x-slot name="heading">{{session()->get('message')}}</x-slot>
                    </x-infoboxes.success>
                @endif
                @if(session()->has('warining'))
                    <x-infoboxes.error class="mt-4">
                        <x-slot name="heading">{{session()->get('warining')}}</x-slot>
                    </x-infoboxes.error>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger"  style="color:red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" id="payment-setup" name="payment-setup" action="{{route('admin.events.payment.setup',array($id))}}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
                    @csrf
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Payment Gateway*
                        </x-slot>
                        <x-slot name="section_button"></x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full flex  flex-col">
                                <div class="float-left w-1/2 mt-4 flex">
                                    <div class="float-left flex-col">
                                        <span class="mr-3 text-lg text-placeholder font-poppins-bold">
                                            Test
                                        </span>
                                    </div>
                                    <x-forms.toggle id="environment" name="environment" value="0">
                                        <x-slot name="field_id">environment</x-slot>
                                        <x-slot name="label_text">Production</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                    </x-forms-toggle>
                                </div>
                            </div>
                        </x-slot>
                    </x-forms.section>
                </form>

            </div>
        </main>
    </div>
    <div class="float-left w-full text-right" style="position: sticky;
    bottom: 0;background: white;    padding: 20px;">
        <x-forms.submit value="Save" name="event_landing_page_save" id="event_landing_page_save">
            Save
        </x-forms.submit>
    </div>

    </form>
</x-app-layout>
