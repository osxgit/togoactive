<div class="float-left w-full">
    <label for="{{$field_id}}" class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">
        {{$label_text}}
    </label>
    <p class="float-left w-full text-gray text-sm mt-1 {{$label_description_status}}">
        {{$label_description}}
    </p>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="{{$field_id}}" name="{{$field_id}}" placeholder="{{$field_text}}">
{{--        <input type="file" class="custom-file-input" id="{{$field_id}}" name="{{$field_id}}" lang="ar" dir="rtl">--}}
        <label class="custom-file-label text-left" for="{{$field_id}}" >{{$field_text}} </label>
    </div>
</div>