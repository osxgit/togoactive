<a href="#" id="admin-sidebar-btn" class="lg:hidden block mt-3 ml-3"><i class="fa fa-bars"></i></a>
<div class="lg:block lg:relative fixed hidden w-8/12 md:1/4  flex-shrink flex-grow-0 top-0 bottom-0 z-10 bg-white" id="admin-sidebar" style="max-width: 350px">
    <div class="sticky top-0 pr-4 bg-white -xl w-full">
        <a href="#" id="admin-sidebar-hide-btn" class="lg:hidden block"><i class="fa fa-times"></i></a>
        <ul class="flex-col overflow-hidden content-center justify-between">
            <li class="py-3 font-poppins-bold font-bold text-white bg-primary text-base pl-4">
                #{{$event->name ?? 'Untitled Event' }}

            </li>
            <li class="lg:py-4 flex py-4 pl-8 pr-4 font-arial text-lg hover:bg-active-nav text-gray hover:text-primary {{$route_name == 'events.create' ? 'bg-active-nav' : ''}}">
                <a class="truncate float-left w-full" href="">
                    <span class="inline">
                        <i class="fa fa-info fa-solid text-center w-5 mr-1"></i>
                        Event Information*
                    </span>
                    <i class="fa fa-angle-down float-right text-right top-1.5 relative"></i>
                </a>
            </li>
            <li>
                <div class="float-left w-full py-4 pl-14 hover:bg-active-nav hover:text-primary {{$route_name == 'admin.events.info.essentials' ? 'bg-active-nav text-primary' : 'text-gray'}}">
                    <a class="truncate float-left w-full" href="{{route('admin.events.info.essentials',array($id))}}">
                        <span class="inline">
                            <i class="fa fa-star fa-solid text-center w-5 mr-1"></i>
                            Essentials
                        </span>
                    </a>
                </div>

                <div class="float-left w-full text-gray py-4 pl-14 hover:bg-active-nav hover:text-primary {{$route_name == 'admin.events.info.dates' ? 'bg-active-nav text-primary' : 'text-gray'}}">
                    <div class="float-left w-full">
                        <a class="truncate float-left w-full" href="{{route('admin.events.info.dates',array($id))}}">
                        <span class="inline">
                            <i class="fa fa-calendar fa-solid text-center w-5 mr-1"></i>
                            Dates
                        </span>
                        </a>
                    </div>
                </div>
                <div class="float-left w-full text-gray py-4 pl-14 hover:bg-active-nav hover:text-primary {{$route_name == 'admin.events.info.images' ? 'bg-active-nav text-primary' : 'text-gray'}}">
                    <div class="float-left w-full">
                        <a class="truncate float-left w-full" href="{{route('admin.events.info.images',array($id))}}">
                        <span class="inline">
                            <i class="fa fa-image fa-solid text-center w-5 mr-1"></i>
                            Images
                        </span>
                        </a>
                    </div>
                </div>
                <div class="float-left w-full text-gray py-4 pl-14 hover:bg-active-nav hover:text-primary {{$route_name == 'admin.events.info.activities' ? 'bg-active-nav text-primary' : 'text-gray'}}">
                    <div class="float-left w-full">
                        <a class="truncate float-left w-full" href="{{route('admin.events.info.activities',array($id))}}">
                        <span class="inline">
                            <i class="fa fa-road fa-solid text-center w-5 mr-1"></i>
                            Activities
                        </span>
                        </a>
                    </div>
                </div>
                <div class="float-left w-full text-gray py-4 pl-14 hover:bg-active-nav hover:text-primary {{$route_name == 'admin.events.info.templates' ? 'bg-active-nav text-primary' : 'text-gray'}}">
                    <div class="float-left w-full">
                        <a class="truncate float-left w-full" href="{{route('admin.events.info.templates',array($id))}}">
                        <span class="inline">
                            <i class="fa fa-address-card text-center w-5 mr-1"></i>
                            Templates
                        </span>
                        </a>
                    </div>
                </div>
                <div class="float-left w-full text-gray py-4 pl-14 hover:bg-active-nav hover:text-primary {{$route_name == 'admin.events.landingPage.setup' ? 'bg-active-nav text-primary' : 'text-gray'}}">
                    <div class="float-left w-full">
                        <a class="truncate float-left w-full" href="{{route('admin.events.landingPage.setup',array($id))}}">
                        <span class="inline">
                            <i class="fa fa fa-road text-center w-5 mr-1"></i>
                            Landing Page
                        </span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}} {{request()->route()->getName() == 'admin.events.info.socialSeo' ? 'bg-active-nav' : ''}}">
                <a class="truncate {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}}" href="{{route('admin.events.info.socialSeo',array($id))}}">
                    <span class="inline text-gray">
                        <i class="fa fa-share-alt fa-solid text-center w-5 mr-1 text-gray"></i>
                        Social and SEO*
                    </span>
                </a>
            </li>
            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}} {{request()->route()->getName() == 'admin.events.registration.manage' ? 'bg-active-nav' : ''}}">
                <a class="truncate float-left w-full {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}} {{request()->route()->getName() == 'admin.events.registration.manage' ? 'text-primary' : 'text-gray'}} " href="{{route('admin.events.registration.manage',array($id))}}" {{($id == '-' ? 'disabled' : '')}}>
                    <span class="inline">
                        <i class="fa fa-file-contract fa-solid text-center w-5 mr-1 text-gray"></i>
                        Registration Setup
                    </span>
                </a>
            </li>
            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}}  {{ in_array(request()->route()->getName(), ['admin.events.achievements.list', 'admin.events.achievements.edit', 'admin.events.achievements.create']) ? 'bg-active-nav' : ''}}">
                <a class="truncate float-left w-full {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}}  {{ in_array(request()->route()->getName(), ['admin.events.achievements.list', 'admin.events.achievements.edit', 'admin.events.achievements.create']) ? 'text-primary' : 'text-gray'}}" href="{{ route('admin.events.achievements.list', [$id]) }}" {{($id == '-' ? 'disabled' : '')}}>
                    <span class="inline  {{ in_array(request()->route()->getName(), ['admin.events.achievements.list', 'admin.events.achievements.edit', 'admin.events.achievements.create']) ? 'text-primary' : 'text-gray'}}">
                    <i class="fa fa-medal fa-solid text-center w-5 mr-1 text-gray"></i>
                    Achievements Setup
                    </span>
                </a>
            </li>
            <li class="lg:py-4 flex py-4 pl-8 pr-4 font-arial text-lg hover:bg-active-nav text-gray hover:text-primary {{$route_name == 'admin.events.success' ? 'bg-active-nav' : ''}}">
                <a class="truncate float-left w-full" href="">
                    <span class="inline">
                        <i class="fa fa-bookmark fa-solid text-center w-5 mr-1 text-gray"></i>
                        Page setup*
                    </span>
                    <i class="fa fa-angle-down float-right text-right top-1.5 relative"></i>
                </a>
            </li>
            <li>
                <div class="float-left w-full py-4 pl-14 hover:bg-active-nav hover:text-primary {{$route_name == 'admin.events.success' ? 'bg-active-nav text-primary' : 'text-gray'}}">
                    <a class="truncate float-left w-full" href="{{route('admin.events.success',array($id))}}">
                        <span class="flex">
                            <svg class="mr-2" width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.83984 5.35547L6.41406 1.3125C6.23828 0.996094 5.85156 0.75 5.46484 0.75H1.5625C1.10547 0.75 0.824219 1.27734 1.07031 1.66406L5.00781 7.25391C6.02734 6.26953 7.36328 5.60156 8.83984 5.35547ZM18.4023 0.75H14.5C14.1133 0.75 13.7617 0.960938 13.5508 1.3125L11.125 5.35547C12.6016 5.60156 13.9375 6.26953 14.957 7.25391L18.8945 1.66406C19.1406 1.27734 18.8594 0.75 18.4023 0.75ZM10 6.375C6.55469 6.375 3.8125 9.15234 3.8125 12.5625C3.8125 16.0078 6.55469 18.75 10 18.75C13.4102 18.75 16.1875 16.0078 16.1875 12.5625C16.1875 9.15234 13.4102 6.375 10 6.375ZM13.2344 11.9297L11.8984 13.2305L12.2148 15.0586C12.2852 15.375 11.9336 15.6211 11.6172 15.4805L10 14.6016L8.34766 15.4805C8.03125 15.6211 7.67969 15.375 7.75 15.0586L8.06641 13.2305L6.73047 11.9297C6.48438 11.6836 6.625 11.2969 6.94141 11.2266L8.80469 10.9805L9.61328 9.29297C9.68359 9.15234 9.82422 9.08203 9.96484 9.08203C10.1406 9.08203 10.2812 9.15234 10.3516 9.29297L11.1602 10.9805L13.0234 11.2266C13.3398 11.2969 13.4805 11.6836 13.2344 11.9297Z" fill="{{$route_name == 'admin.events.success' ? '#7E1FF6':'#979797'}}"/>
                            </svg>
                            Success page
                        </span>
                    </a>
                </div>

            </li>
            <li class="lg:py-4 flex py-4 pl-8 pr-4 font-arial text-lg hover:bg-active-nav text-gray hover:text-primary {{$route_name == 'admin.events.rewards.add' ? 'bg-active-nav' : ''}}">
                <a class="truncate float-left w-full" href="">
                    <span class="inline">
                        <i class="fa fa-shirt fa-solid text-center w-5 mr-1 text-gray"></i>
                        Rewards*
                    </span>
                    <i class="fa fa-angle-down float-right text-right top-1.5 relative"></i>
                </a>
            </li>
            <li>
                <div class="float-left w-full py-4 pl-14 hover:bg-active-nav hover:text-primary {{$route_name == 'admin.events.rewards' ? 'bg-active-nav text-primary' : 'text-gray'}}">
                    <a class="truncate float-left w-full" href="{{route('admin.events.rewards',array($id))}}">
                        <span class="flex">
                            <svg class="mr-2" width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.83984 5.35547L6.41406 1.3125C6.23828 0.996094 5.85156 0.75 5.46484 0.75H1.5625C1.10547 0.75 0.824219 1.27734 1.07031 1.66406L5.00781 7.25391C6.02734 6.26953 7.36328 5.60156 8.83984 5.35547ZM18.4023 0.75H14.5C14.1133 0.75 13.7617 0.960938 13.5508 1.3125L11.125 5.35547C12.6016 5.60156 13.9375 6.26953 14.957 7.25391L18.8945 1.66406C19.1406 1.27734 18.8594 0.75 18.4023 0.75ZM10 6.375C6.55469 6.375 3.8125 9.15234 3.8125 12.5625C3.8125 16.0078 6.55469 18.75 10 18.75C13.4102 18.75 16.1875 16.0078 16.1875 12.5625C16.1875 9.15234 13.4102 6.375 10 6.375ZM13.2344 11.9297L11.8984 13.2305L12.2148 15.0586C12.2852 15.375 11.9336 15.6211 11.6172 15.4805L10 14.6016L8.34766 15.4805C8.03125 15.6211 7.67969 15.375 7.75 15.0586L8.06641 13.2305L6.73047 11.9297C6.48438 11.6836 6.625 11.2969 6.94141 11.2266L8.80469 10.9805L9.61328 9.29297C9.68359 9.15234 9.82422 9.08203 9.96484 9.08203C10.1406 9.08203 10.2812 9.15234 10.3516 9.29297L11.1602 10.9805L13.0234 11.2266C13.3398 11.2969 13.4805 11.6836 13.2344 11.9297Z" fill="{{$route_name == 'admin.events.rewards' ? '#7E1FF6':'#979797'}}"/>
                            </svg>
                            Reward SKUs
                        </span>
                    </a>
                </div>
                <div class="float-left w-full py-4 pl-14 hover:bg-active-nav hover:text-primary {{$route_name == 'admin.events.rewards.instructions' ? 'bg-active-nav text-primary' : 'text-gray'}}">
                    <a class="truncate float-left w-full" href="{{route('admin.events.rewards.instructions',array($id))}}">
                        <span class="flex">
                            <svg class="mr-2" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.83984 6.10547L6.41406 2.0625C6.23828 1.74609 5.85156 1.5 5.46484 1.5H1.5625C1.10547 1.5 0.824219 2.02734 1.07031 2.41406L5.00781 8.00391C6.02734 7.01953 7.36328 6.35156 8.83984 6.10547ZM18.4023 1.5H14.5C14.1133 1.5 13.7617 1.71094 13.5508 2.0625L11.125 6.10547C12.6016 6.35156 13.9375 7.01953 14.957 8.00391L18.8945 2.41406C19.1406 2.02734 18.8594 1.5 18.4023 1.5ZM10 7.125C6.55469 7.125 3.8125 9.90234 3.8125 13.3125C3.8125 16.7578 6.55469 19.5 10 19.5C13.4102 19.5 16.1875 16.7578 16.1875 13.3125C16.1875 9.90234 13.4102 7.125 10 7.125ZM13.2344 12.6797L11.8984 13.9805L12.2148 15.8086C12.2852 16.125 11.9336 16.3711 11.6172 16.2305L10 15.3516L8.34766 16.2305C8.03125 16.3711 7.67969 16.125 7.75 15.8086L8.06641 13.9805L6.73047 12.6797C6.48438 12.4336 6.625 12.0469 6.94141 11.9766L8.80469 11.7305L9.61328 10.043C9.68359 9.90234 9.82422 9.83203 9.96484 9.83203C10.1406 9.83203 10.2812 9.90234 10.3516 10.043L11.1602 11.7305L13.0234 11.9766C13.3398 12.0469 13.4805 12.4336 13.2344 12.6797Z" fill="{{$route_name == 'admin.events.rewards.instructions' ? '#7E1FF6':'#979797'}}"/>
                                <path d="M15 17.35H23M15 18.95H23M15 20.55H23M15 15.75H19.0063M15 22.15H23M15 23.75H23" stroke="{{$route_name == 'admin.events.rewards.instructions' ? '#7E1FF6':'#979797'}}" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Rewards Introduction
                        </span>
                    </a>
                </div>
                <div class="float-left w-full py-4 pl-14 hover:bg-active-nav hover:text-primary {{$route_name == 'admin.events.multiQuantityDiscount' ? 'bg-active-nav text-primary' : 'text-gray'}}">
                    <a class="truncate float-left w-full" href="{{route('admin.events.multiQuantityDiscount',array($id))}}">
                        <span class="inline">
                            <i class="fa fa-percent fa-solid text-center w-5 mr-1"></i>
                           Multi-item discount
                        </span>
                    </a>
                </div>
            </li>
            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}} {{request()->route()->getName() == 'admin.events.coupons' ? 'bg-active-nav' : ''}}">
                <a class="truncate float-left w-full text-gray {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}}" href="{{route('admin.events.coupons',array($id))}}" {{($id == '-' ? 'disabled' : '')}}>
                    <span class="inline">
                        <i class="fa fa-gift fa-solid text-center w-5 mr-1 text-gray"></i>
                        Coupon Manager
                    </span>
                </a>
            </li>

            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}} {{request()->route()->getName() == 'events.leaderboard.list' ? 'bg-active-nav' : ''}}">
                <a class="truncate float-left w-full {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}} {{request()->route()->getName() == 'events.leaderboard.list' ? 'text-primary' : 'text-gray'}}" href="" {{($id == '-' ? 'disabled' : '')}}>
                    <span class="inline"  {{request()->route()->getName() == 'events.leaderboard.list' ? 'text-primary' : 'text-gray'}}">
                    <i class="fa fa-line-chart fa-solid text-center w-5 mr-1 text-gray"></i>
                    Leaderboard Settings
                    </span>
                </a>
            </li>

            <li class="lg:py-4 flex py-4 pl-8 pr-4 font-arial text-lg hover:bg-active-nav text-gray hover:text-primary {{$route_name == 'admin.events.rewards.add' ? 'bg-active-nav' : ''}}">
                <a class="truncate float-left w-full" href="">
                    <span class="inline">
                        <i class="fa fa-question fa-solid text-center w-5 mr-1 text-gray"></i>
                        FAQ & Rules Manager
                    </span>
                    <i class="fa fa-angle-down float-right text-right top-1.5 relative"></i>
                </a>
            </li>
            <li>
                <div class="float-left w-full py-4 pl-14 hover:bg-active-nav hover:text-primary {{$route_name == 'admin.events.faq.create' ? 'bg-active-nav text-primary' : 'text-gray'}}">
                    <a class="truncate float-left w-full text-gray {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}} {{request()->route()->getName() == 'admin.events.faq.create' ? 'text-primary' : 'text-gray'}}" href="{{route('admin.events.faq.create',array($id))}}" {{($id == '-' ? 'disabled' : '')}}>
                        <span class="flex">
                            <svg class="mr-2" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.922 1.41049C10.7693 0.334713 8.98067 0.334712 7.82805 1.41049L4.95692 4.0902C4.57464 4.44701 4.57464 5.05299 4.95692 5.4098V5.4098C5.30333 5.7331 5.84077 5.73348 6.18762 5.41065L6.54338 5.07954C7.4541 4.2319 8.9375 4.87774 8.9375 6.12189V12.5625C8.9375 13.0803 9.35723 13.5 9.875 13.5V13.5C10.3928 13.5 10.8125 13.0803 10.8125 12.5625V6.12189C10.8125 4.87774 12.2959 4.2319 13.2066 5.07954L13.5624 5.41065C13.9092 5.73348 14.4467 5.7331 14.7931 5.4098V5.4098C15.1754 5.05299 15.1754 4.44701 14.7931 4.0902L11.922 1.41049ZM0.5 12.625C0.5 12.1418 0.891751 11.75 1.375 11.75H6.1875C6.67075 11.75 7.0625 12.1418 7.0625 12.625V12.625C7.0625 13.1082 6.67075 13.5 6.1875 13.5H1.375C0.891751 13.5 0.5 13.1082 0.5 12.625V12.625ZM0.5 16.125C0.5 15.6418 0.891751 15.25 1.375 15.25H14.625C15.1082 15.25 15.5 15.6418 15.5 16.125V16.125C15.5 16.6082 15.1082 17 14.625 17H1.375C0.891751 17 0.5 16.6082 0.5 16.125V16.125ZM0.5 19.625C0.5 19.1418 0.891751 18.75 1.375 18.75H14.625C15.1082 18.75 15.5 19.1418 15.5 19.625V19.625C15.5 20.1082 15.1082 20.5 14.625 20.5H1.375C0.891751 20.5 0.5 20.1082 0.5 19.625V19.625Z" fill="{{$route_name == 'admin.events.faq.create' ? '#7E1FF6':'#979797'}}" />
                            </svg>
                            FAQ Manager
                        </span>
                    </a>
                </div>
                <div class="float-left w-full py-4 pl-14 hover:bg-active-nav hover:text-primary {{$route_name == 'admin.events.faq.createtnc' ? 'bg-active-nav text-primary' : 'text-gray'}}">
                    <a class="truncate float-left w-full text-gray {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}} {{request()->route()->getName() == 'admin.events.faq.createtnc' ? 'text-primary' : 'text-gray'}}" href="{{route('admin.events.faq.createtnc',array($id))}}" {{($id == '-' ? 'disabled' : '')}}>
                        <span class="flex">
                            <svg class="mr-2" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.5 3.5C0.5 1.84315 1.84315 0.5 3.5 0.5H15.5C17.1569 0.5 18.5 1.84315 18.5 3.5V18.5C18.5 20.1569 17.1569 21.5 15.5 21.5H3.5C1.84315 21.5 0.5 20.1569 0.5 18.5V3.5ZM17.375 3.5C17.375 2.67157 16.7034 2 15.875 2H3.125C2.29657 2 1.625 2.67157 1.625 3.5C1.625 4.32843 2.29657 5 3.125 5H15.875C16.7034 5 17.375 4.32843 17.375 3.5ZM1.625 17C1.625 18.6569 2.96815 20 4.625 20H14.375C16.0319 20 17.375 18.6569 17.375 17V9.5C17.375 7.84315 16.0319 6.5 14.375 6.5H4.625C2.96815 6.5 1.625 7.84315 1.625 9.5V17ZM4.4375 12.5C3.50552 12.5 2.75 11.7445 2.75 10.8125V9.6875C2.75 8.75552 3.50552 8 4.4375 8C5.36948 8 6.125 8.75552 6.125 9.6875V10.8125C6.125 11.7445 5.36948 12.5 4.4375 12.5ZM4.4375 9.5C4.12684 9.5 3.875 9.75184 3.875 10.0625V10.4375C3.875 10.7482 4.12684 11 4.4375 11C4.74816 11 5 10.7482 5 10.4375V10.0625C5 9.75184 4.74816 9.5 4.4375 9.5ZM4.4375 18.5C3.50552 18.5 2.75 17.7445 2.75 16.8125V15.6875C2.75 14.7555 3.50552 14 4.4375 14C5.36948 14 6.125 14.7555 6.125 15.6875V16.8125C6.125 17.7445 5.36948 18.5 4.4375 18.5ZM4.4375 15.5C4.12684 15.5 3.875 15.7518 3.875 16.0625V16.4375C3.875 16.7482 4.12684 17 4.4375 17C4.74816 17 5 16.7482 5 16.4375V16.0625C5 15.7518 4.74816 15.5 4.4375 15.5ZM9.125 11C8.71079 11 8.375 10.6642 8.375 10.25C8.375 9.83579 8.71079 9.5 9.125 9.5H14.375C14.7892 9.5 15.125 9.83579 15.125 10.25C15.125 10.6642 14.7892 11 14.375 11H9.125ZM9.125 17C8.71079 17 8.375 16.6642 8.375 16.25C8.375 15.8358 8.71079 15.5 9.125 15.5H14.375C14.7892 15.5 15.125 15.8358 15.125 16.25C15.125 16.6642 14.7892 17 14.375 17H9.125Z" fill="{{$route_name == 'admin.events.tnc.create' ? '#7E1FF6':'#979797'}}" />
                            </svg>
                            Rules Manager
                        </span>
                    </a>
                </div>
            </li>

            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}} {{request()->route()->getName() == 'admin.events.participantsManager' ? 'bg-active-nav' : ''}}" >
                <a class="truncate float-left w-full text-gray  {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}} {{request()->route()->getName() == 'admin.events.participantsManager' ? 'text-primary' : 'text-gray'}}" href="{{route('admin.events.participantsManager',array($id))}}" {{($id == '-' ? 'disabled' : '')}}>
                    <span class="inline"><i class="fa fa-users fa-solid text-center w-5 mr-1 text-gray"></i>Participants Manager</span>
                </a>
            </li>

            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}}">
                <a class="truncate float-left w-full text-gray {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}}" href="#" {{($id == '-' ? 'disabled' : '')}}>
                    <span class="inline"><i class="fa fa-biking fa-solid text-center w-5 mr-1 text-gray"></i>Activity Manager</span>
                </a>
            </li>
        </ul>
    </div>
</div>
