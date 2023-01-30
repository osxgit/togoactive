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
            </li>
            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}} {{request()->route()->getName() == 'events.social' ? 'bg-active-nav' : ''}}">
                <a class="truncate {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}}" href="#">
                    <span class="inline text-gray">
                        <i class="fa fa-share-alt fa-solid text-center w-5 mr-1 text-gray"></i>
                        Social and SEO*
                    </span>
                </a>
            </li>
            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}} {{request()->route()->getName() == 'events.registration.manage' ? 'bg-active-nav' : ''}}">
                <a class="truncate float-left w-full {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}} {{request()->route()->getName() == 'events.registration.manage' ? 'text-primary' : 'text-gray'}} " href="" {{($id == '-' ? 'disabled' : '')}}>
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
            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}} {{request()->route()->getName() == 'events.rewards.manage' ? 'bg-active-nav' : ''}}">
                <a class="truncate float-left w-full text-gray {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}} {{request()->route()->getName() == 'events.rewards.manage' ? 'text-primary' : 'text-gray'}}" href="" {{($id == '-' ? 'disabled' : '')}}>
                    <span class="inline">
                        <i class="fa fa-shirt fa-solid text-center w-5 mr-1 text-gray"></i>
                        Rewards Manager
                    </span>
                </a>
            </li>
            <li class="lg:py-4 flex py-4  pl-8 font-arial text-lg {{($id != '-' ? 'hover:bg-active-nav' : '')}}">
                <a class="truncate float-left w-full text-gray {{($id == '-' ? 'cursor-not-allowed' : 'hover:text-primary')}}" href="#" {{($id == '-' ? 'disabled' : '')}}>
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