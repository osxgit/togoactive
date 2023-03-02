<label id="label-{{$field_id}}" class="flex flex-col justify-center w-full p-2 transition border-dashed bg-white  rounded-md appearance-none cursor-pointer  focus:outline-none" style="background-size: contain;background-repeat:no-repeat; height:135px; width:135px; background-image: url('https://static.togoactive.com/{{$uploaded_img}}');">

    <span id="span-{{$field_id}}-edit" style="visibility:visible; margin-left: -25px;display: flex;width: 100%;">
    <svg width="30" height="30" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="0.5" y="0.5" width="47" height="47" rx="23.5" fill="white"/>
        <path d="M27.6953 18.0547L17.9219 27.8281L17.5 31.8359C17.4297 32.3633 17.8867 32.8203 18.4141 32.75L22.4219 32.3281L32.1953 22.5547L27.6953 18.0547ZM34.9727 17.3867L32.8633 15.2773C32.2305 14.6094 31.1406 14.6094 30.4727 15.2773L28.5039 17.2461L33.0039 21.7461L34.9727 19.7773C35.6406 19.1094 35.6406 18.0195 34.9727 17.3867Z" fill="#777777"/>
        <rect x="0.5" y="0.5" width="47" height="47" rx="23.5" stroke="#777777"/>
    </svg>
    </span>
    <span id="span-{{$field_id}}-add" class="flex  justify-center flex-col items-center space-x-2" style="visibility:hidden; ">
    <svg width="33" height="37" viewBox="0 0 33 37" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 17.5V17.5C0.999768 15.8946 1.59367 14.3458 2.66728 13.1522C3.74089 11.9586 5.21824 11.2045 6.81472 11.0353L7.40514 10.9727L7.24299 10.4015C6.96922 9.43715 6.89145 8.42773 7.01426 7.43283C7.13707 6.43793 7.45797 5.47772 7.95803 4.6089C8.45808 3.74008 9.12715 2.98026 9.92573 2.3743C10.7243 1.76834 11.6362 1.32852 12.6076 1.08083C13.5789 0.83313 14.5901 0.782571 15.5813 0.932134C16.5725 1.0817 17.5238 1.42835 18.3788 1.95163C19.2338 2.4749 19.9754 3.16419 20.5596 3.9788C21.1438 4.7934 21.5589 5.71681 21.7804 6.6945L21.8817 7.14191L22.3362 7.07938C23.4902 6.92059 24.6646 7.00073 25.7864 7.3148C26.9082 7.62888 27.9535 8.1702 28.8573 8.90516C29.7612 9.64011 30.5043 10.553 31.0406 11.5872C31.5768 12.6214 31.8948 13.7547 31.9747 14.9169C32.0546 16.0791 31.8948 17.2453 31.5052 18.3432C31.1155 19.441 30.5043 20.4471 29.7096 21.2988C28.9149 22.1506 27.9535 22.8299 26.8853 23.2946C25.817 23.7592 24.6647 23.9994 23.4997 24H19V14.5C19 13.837 18.7366 13.2011 18.2678 12.7323C17.7989 12.2634 17.163 12 16.5 12C15.837 12 15.2011 12.2634 14.7322 12.7323C14.2634 13.2011 14 13.837 14 14.5V24H7.5C5.77609 24 4.12279 23.3152 2.90381 22.0962C1.68482 20.8773 1 19.224 1 17.5ZM14.1464 30.0256L15 30.8792V29.672V25H18V29.672V30.8792L18.8536 30.0256L21.4363 27.4429C21.7189 27.1714 22.0965 27.0213 22.4885 27.0247C22.8818 27.0281 23.258 27.1859 23.5361 27.464C23.8142 27.7421 23.972 28.1183 23.9754 28.5116C23.9788 28.9035 23.8286 29.2812 23.5572 29.5638L17.5605 35.5604C17.5605 35.5605 17.5605 35.5605 17.5604 35.5605C17.2792 35.8417 16.8977 35.9996 16.5 35.9996C16.1023 35.9996 15.7208 35.8417 15.4396 35.5605C15.4395 35.5605 15.4395 35.5605 15.4395 35.5604L9.44282 29.5638C9.17137 29.2812 9.02123 28.9035 9.02463 28.5116C9.02805 28.1183 9.1858 27.7421 9.46392 27.464C9.74203 27.1859 10.1182 27.0281 10.5115 27.0247C10.9035 27.0213 11.2811 27.1714 11.5637 27.4429L14.1464 30.0256Z" fill="#9CA3AF" stroke="#9CA3AF"/>
    </svg>
    <span class="font-medium text-gray-600"  style="font-family: 'Inter';color: #6B7280; font-size: 14px;">
    {{$uploder_title}}
    </span>
    <span class="font-medium text-gray-600" style="font-family: 'Inter';color: #6B7280; font-size: 14px;">
    {{$uploder_description}}
    </span>
</span>

