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
            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}}  {{request()->route()->getName() == 'events.achievement.list' ? 'bg-active-nav' : ''}}">
                <a class="truncate float-left w-full {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}}  {{request()->route()->getName() == 'events.achievement.list' ? 'text-primary' : 'text-gray'}}" href="" {{($id == '-' ? 'disabled' : '')}}>
                    <span class="inline"  {{request()->route()->getName() == 'events.achievement.list' ? 'text-primary' : 'text-gray'}}">
                    <i class="fa fa-medal fa-solid text-center w-5 mr-1 text-gray"></i>
                    Achievements Setup
                    </span>
                </a>
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

            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}}">
                <a class="truncate float-left w-full text-gray {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}}" href="#" {{($id == '-' ? 'disabled' : '')}}>
                    <span class="inline"><i class="fa fa-question fa-solid text-center w-5 mr-1 text-gray"></i>FAQ & Rules Manager</span>
                </a>
            </li>

            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}}">
                <a class="truncate float-left w-full text-gray {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}}" href="#" {{($id == '-' ? 'disabled' : '')}}>
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