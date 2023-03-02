
<form method="POST" id="create-event-coupon-f_010" name="create-event-coupon-f_010" action="{{route('admin.events.coupon.store',array($eventId))}}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="challengeId" id="challengeId" value="{{$eventId}}">
    <input type="hidden" name="discountId" id="couponId" value="{{$couponId}}">

    <h1 class="float-left w-full mt-2 text-lg font-poppins-bold text-2xl ">New Coupon </h1>
    <div class=" float-left w-full flex flex-col">
        <div class="w-full ">
            <div class="float-left w-full">
                <label for="name" class="float-left w-full mt-4 mb-1 text-lg text-placeholder font-poppins-bold">
                    Coupon Name*
                </label>
                <p class="float-left w-full text-gray text-sm mt-1 mb-1">
                Please use CAPITAL ALPHANUMBERIC Characters and DASH Only.
                </p>
                <div  class = "float-left w-full bg-white flex items-center rounded-sm border border-ultralightgray p-1 mt-1 w-full md:w-8/12" >
                    <input id='name' name="name" class = 'float-left w-full border-0 bg-white h-8 font-poppins text-sm text-placeholder placeholder-gray-200 px-2' value="{{$coupon->name ?? ''}} ">
                    <span class="hidden" id="error_name"><i class="fa fa-warning"></i></span>
                </div>
            </div>

        <x-forms.validationerror>
            <x-slot name="field_id">name</x-slot>
            <x-slot name="error_text">name_error</x-slot>
        </x-forms.validationerror>
        </div>
        <div class="w-full">
            <div class="float-left w-full">
                <label for="discount" class="float-left w-full mt-4 mb-1 text-lg text-placeholder font-poppins-bold">
                    % Value off*
                </label>
                <p class="float-left w-full text-gray text-sm mt-1 mb-1">
                    This Percentage off will be applied to all countries for the following merchandise selected.
                </p>
                <div class="float-left flex items-center ">
                <div  class = "float-left w-full bg-white flex items-center rounded-sm border border-ultralightgray p-1 mt-1 w-6/12 md:w-6/12" >
                    <input  id='discount' name="discount" type="number"  min="1"  name="discount" class = 'float-left w-full border-0 bg-white h-8 font-poppins text-sm text-placeholder placeholder-gray-200 px-2'  value="{{$coupon->discount ?? ''}}" >
                    <span class="hidden" id="discount_name"><i class="fa fa-warning"></i></span>
                </div>
                    <span class=" percentageSign ml-2">%</span>
                </div>
            </div>


        <x-forms.validationerror>
            <x-slot name="field_id">discount</x-slot>
            <x-slot name="error_text">discount_error</x-slot>
        </x-forms.validationerror>
        </div>
        <div class="w-full ">
            <label class="float-left w-full mt-4 mb- 1 text-lg text-placeholder font-poppins-bold">
                Applies to
            </label>
            @foreach($rewards as $reward)

        <div class="flex items-center mb-2 float-left w-full">
            <input id="default-checkbox" type="checkbox" name="rewarddata[{{$reward->id}}]" value="{{$reward->id}}" class="w-4 h-4 text-purple-700	 bg-gray-100 border-gray-300 rounded focus:ring-0 focus:ring-offset-0 dark:bg-gray-700 dark:border-gray-600" {{!is_null($coupon)? in_array($reward->id,json_decode($coupon->rewards)) ? 'checked':'':''}}>
            <label for="default-checkbox" class="ml-2 mb-0 text-sm font-medium text-gray-900 dark:text-gray-300">{{$reward->name}}</label>
        </div>
            @endforeach
        </div>


        <div class="w-full">
            <div class="float-left w-full">
                <label for="max_use" class="float-left w-full mt-4 mb-1 text-lg text-placeholder font-poppins-bold">
                    Number of uses
                </label>

                <div class="float-left w-full bg-white flex items-center rounded-sm border border-ultralightgray p-1 mt-1 w-full md:w-1/2">
                    <input    id='max_use' name="max_use" type="number"  min="-1"  placeholder="-1" class = 'float-left w-full border-0 bg-white h-8 font-poppins text-sm text-placeholder placeholder-gray-200 px-2' value="{{$coupon->max_use ?? '-1'}}" >
                    <span class="hidden" id="error_max_use"><i class="fa fa-warning"></i></span>
                </div>

            </div>
            <x-forms.validationerror>
                <x-slot name="field_id">max_use</x-slot>
                <x-slot name="error_text">max_use_error</x-slot>
            </x-forms.validationerror>
        </div>

    <div class="float-left w-full ">
        <div class="float-left w-full">
            <label for="expiry_date" class="float-left w-full mt-4 mb-1 text-lg text-placeholder font-poppins-bold">
                Expiry date
            </label>

            <div class="float-left w-full bg-white flex items-center rounded-sm border border-ultralightgray p-1 mt-1  w-full md:w-1/2">
                <input  type="datetime-local" id="expiry_date" name="expiry_date"  class = 'float-left w-full border-0 bg-white h-8 font-poppins text-sm text-placeholder placeholder-gray-200 px-2' value="{{$coupon->expiry_date ?? ''}}" >
                <span class="hidden" id="expiry_date_use"><i class="fa fa-warning"></i></span>
            </div>

        </div>

        <x-forms.validationerror>
            <x-slot name="field_id">expiry_date</x-slot>
            <x-slot name="error_text">expiry_date_error</x-slot>
        </x-forms.validationerror>
    </div>
    </div>
    </div>
    <div class=" mb-8 mt-8 text-center justify-evenly float-left w-full flex">
        <button type="button" class="btn btn-secondary w-5/12" style="color: #7E1FF6 !important;background-color: #FFFFFF;border: 1px solid #7E1FF6;"   onclick="closeModal()">Close</button>
        <button type="submit" class="btn btn-primary w-5/12 text-white" style="color: #ffffff !important;background-color: #7E1FF6;border: 1px solid #7E1FF6;">Save changes</button>
    </div>
</form>