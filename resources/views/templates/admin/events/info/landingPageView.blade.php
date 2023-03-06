<!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" async> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" ></script>

<style>
    .timeCard hr {
        background-color: #FFFFFF;
        display: none;
    }
    .timeCard::before {
        display: none;
        content: "";
        width: 10px;
        height: 10px;
        position: absolute;
        background-color: #FFFFFF;
        left: 0;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .timeCard::after {
        display: none;
        content: "";
        width: 10px;
        height: 10px;
        position: absolute;
        background-color: #FFFFFF;
        right: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .timer-seperator{
        color: #333;
        text-shadow: 0px 0 15px 0px rgba(0, 0, 0, 0.15) !important;
        font-size: 88px;
        animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
        90% {
            opacity: 0;
        }
    }
    @media(max-width: 1024px){
        .counterContentDiv{
            padding-bottom: 25% !important;
        }
    }
    /* Smartphones (portrait) ----------- */
    @media only screen and (max-width : 320px) {
        .counterContentDiv {
            padding-bottom: 0% !important;
        }
        #counterBacjI {
            background-size: 17% !important;
        }
        #white_leaderboard{
            position:unset !important;
        }
        .whtBx{
            margin-bottom: -30px !important;
        }
        .timeCard{
            font-size: 20px !important;
            padding: 8px 11px !important;
        }
    }
    @media only screen and (max-width : 480px) {
        .counterContentDiv {
            padding-bottom: 0% !important;
        }
        #counterBacjI {
            background-size: 17% !important;
        }
        #white_leaderboard{
            position:unset !important;
        }
        .whtBx{
            margin-bottom: -30px !important;
        }
        .timeCard{
            font-size: 20px !important;
            padding: 8px 11px !important;
        }
    }
    /* Mobile devices*/
    @media only screen and (max-width: 480px) and (min-width: 320px) {
        .counterContentDiv {
            padding-bottom: 0% !important;
        }
        #counterBacjI {
            background-size: 17% !important;
        }
        .maincounterdiv{

        }
        .counterContentDiv{
            margin-top:0px !important;
        }
        #white_leaderboard{
            position:unset !important;
        }
        .whtBx{
            margin-bottom: -30px !important;
        }
        .timeCard{
            font-size: 20px !important;
            padding: 8px 11px !important;
        }
    }

    /* iPads and Tablets */
    @media only screen and (max-width: 768px) and (min-width: 481px)  {
        #counterBacjI {
            background-size: 17% !important;
        }
        .counterContentDiv {
            padding-bottom: 55% !important;
        }
        #white_leaderboard{
            position:unset !important;
        }
        .counterContentDiv{
            margin-top:0px !important;
        }
        .whtBx{
            margin-bottom: -30px !important;
        }
        .timeCard{
            font-size: 3.75rem;
    line-height: 1;
            padding-left: 1.5rem;
    padding-right: 1.5rem;
        }
    }
    /* Smallert Screen Laptop */
    @media only screen and (max-width: 1024px) and (min-width: 769px)  {
        #white_leaderboard{
            position:unset !important;
        }
        .whtBx{
            margin-bottom: -30px !important;
        }
        .timeCard{
            font-size: 3.75rem;
    line-height: 1;
            padding-left: 1.5rem;
    padding-right: 1.5rem;
        }
    }
    /* Smallert Screen Laptop */
    @media only screen and (max-width: 1200px) and (min-width: 1025px)  {
        .timeCard{
            font-size: 3.75rem;
    line-height: 1;
            padding-left: 1.5rem;
    padding-right: 1.5rem;
        }
    }
    /* Extra Large Screens */
    @media (min-width: 1201px)  {
        .timeCard{
            font-size: 3.75rem;
    line-height: 1;
            padding-left: 1.5rem;
    padding-right: 1.5rem;
        }
    }
    .whtBx {
        margin: 0 auto;

        justify-content: center;

        display: flex;
    }

    .flex{
        display:flex;
    }
    .wfull{
        width:100%;
    }
    .flex-row{
        flex-direction: row;
    }	
.flex-row-reverse{
    flex-direction: row-reverse;
}	
.flex-col{
    flex-direction: column;
}	
.flex-col-reverse{
    flex-direction: column-reverse;
}	
.grid-cols-1{
    grid-template-columns: repeat(1, minmax(0, 1fr));
}	
.grid{
    display: grid;}
    .flex-grow-0{
        flex-grow: 0;
    }	
.flex-grow{
    flex-grow: 1;
}	
    .mx-auto {
        margin-left: auto;
margin-right: auto;
    }
    .overflow-hidden{
        overflow: hidden;
    } 
    .bg-no-repeat{
        background-repeat: no-repeat;
    }
    .justify-center{
        justify-content: center;
    } 
    .items-center{
        align-items: center;
    }
    .font-bold {
        font-weight: 700;
    }
    .text-center {
        text-align: center;
    }
    .mb-8 {
        margin-bottom: 2rem;
    }
    .capitalize {
        text-transform: uppercase;
    }
    .text-5xl {
        font-size: 3rem;
        line-height: 1;
    }
   
  
    .py-16 {
        padding-top: 4rem;
padding-bottom: 4rem;
    }

    .px-8 {
        padding-left: 2rem;
padding-right: 2rem;
    }
    .max-w-4xl {
        max-width: 56rem;
    }

    .max-w-xl{
        max-width: 36rem;
    }
    .flex-grow {
        flex-grow: 1;
    }

    .relative{
        position: relative;
    }

    .text-white {
        --tw-text-opacity: 1;
color: rgba(255, 255, 255, var(--tw-text-opacity));
    }
    .rounded-lg {
        border-radius: 0.5rem;
    }
    .text-6xl {
        font-size: 3.75rem;
line-height: 1;
    }
    .px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }
    .shadow-lg{
        --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }
  .p-3{
    padding: 0.75rem;
  }
  .rounded-md{
    border-radius: 0.375rem;
  } 
  .mt-10{
    margin-top: 2.5rem;

  }
  .absolute{
    position:absolute;
  }
  .right-0 {
    right: 0px;
  }
  .left-0 {
    left: 0px;
  }
  .py-1{
    padding-top: 0.25rem;
padding-bottom: 0.25rem;
  }
  .py-8 {
    padding-top: 2rem;
padding-bottom: 2rem;
  }
  .text-base	{
    font-size: 1rem;
line-height: 1.5rem;
  }
  .text-4xl{
    font-size: 2.25rem;
line-height: 2.5rem;

  }
  .text-3xl{

    font-size: 1.875rem;
line-height: 2.25rem;
  }
  .text-2xl{
    font-size: 1.5rem;
line-height: 2rem;

}
.text-xl{
    font-size: 1.25rem;
line-height: 1.75rem;
  
}
.mb-4{
    margin-bottom: 1rem;
}
.u_body {
    min-height: auto !important;
}
    /* lg */
    @media (min-width: 1024px) {
        .faq-section{
            width:50% !important;
            padding:50px 100px 50px 100px; 
        }
        .text-5xl{
            font-size: 3rem;
        line-height: 1;
        }
        .pb-64 {
            padding-bottom: 16rem;
        }
        .pt-28{
            padding-top: 7rem;
        }
        .px-8{
            padding-left: 2rem;
            adding-right: 2rem;
        }

        .rewards-section{
            display:grid; 	gap: 3rem; grid-template-columns: repeat(3, minmax(0, 1fr));
        }
        .content-div-main{
            padding:0px 100px;
        }
        .timer-div{
            display: flex;
            flex-direction: row;
            background: inherit;
    border-radius: unset;
    margin-top: 0px;
    position: relative;
        }
        .event-name-div{
            width:50%;
        }
        .eventNameDiv{
            text-align: left;
        }
        .challenge-detail-div{
            display:grid; 	
            gap: 3rem; 
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
     }
     .eventNameDiv{
            text-align: left;
        }
     /* md */
     @media (min-width: 768px) { 
        
        .max-w-screen-xl{
            max-width: 1280px;
        }
        .px-8{
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .rewards-section{
            display:grid; 	gap: 3rem; grid-template-columns: repeat(3, minmax(0, 1fr));
        }
        .content-div-main{
            padding:0px 100px;
        }
        .timer-div{
            display: flex;
            flex-direction: row;
            background: inherit;
            border-radius: unset;
            margin-top: 0px;
            position: relative;
          
        }
        .event-name-div{
            width:50%;
        }
        .eventNameDiv{
            text-align: left;
        }
        .challenge-detail-div{
            display:grid; 	
            gap: 3rem; 
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
        .main-reward-img{
            width:350px; 
            height:auto;
        }
        .second-reward-img{
            width:150px;
            height:auto;
            margin-left: 200px;
            margin-top: 200px; 
            position:absolute
        }
        .event-name-img{
            width:100%;
        }
        .header-div{
            flex-direction: row;
        }
        .reward-img-div{
            justify-content: center;
            align-items: center;
            display: flex;
            padding: 100px 0px;
        }
        .header-reward-img{
            width: auto;
        }
        .unlayer-div {
             margin-top: 0px;
        }
    }
/* sm */
      @media (min-width: 640px) { 
        .faq-section{
            width:100% !important;
            padding:50px 250px 50px 250px; 
        }

        .rewards-section{
            display:flex; 	
            flex-direction: column; 
        }
        .content-div-main{
            padding:0px 20px;
        }
        .timer-div{
            display:flex;
            flex-direction: column;
            background: #FFFFFF;
            border-radius: 56px 56px 0px 0px;
            margin-top: -100px;
            position: absolute;
        }
        .event-name-div{
            width:100%;
            text-align: center !important;
        }
        .eventNameDiv{
            text-align: center;
        }
        .challenge-detail-div{
            display:grid; 	
            gap: 1rem; 
            grid-template-rows: repeat(4, minmax(0, 1fr));
        }
        .main-reward-img{
            width:200px; 
            height:auto;
        }
        .second-reward-img{
            width:100px;
            height:auto;
            margin-left: 200px;
            margin-top: 100px; 
            position:absolute
        }
        .event-name-img{
            width:225px;
        }
        .header-div{
            flex-direction: column;
        }
        .reward-img-div{
            justify-content: end;
            align-items: center;
            display: flex;
            padding: 80px 0px;
        }
        .header-reward-img{
            width: 280px;
        }
        .unlayer-div{
            margin-top: 350px;
        }
       
    }
    @media (max-width: 640px) { 
        .faq-section{
            width:100% !important;
            padding:50px 25px 50px 25px; 
        }

        .rewards-section{
            display:flex; 	
            flex-direction: column; 
        }
        .content-div-main{
            padding:0px 20px;
        }
        .timer-div{
            display:flex;
            flex-direction: column;
            background: #FFFFFF;
            border-radius: 56px 56px 0px 0px;
            margin-top: -100px;
            position: absolute;
        }
        .event-name-div{
            width:100%;
            text-align: center !important;
        }
        .eventNameDiv{
            text-align: center;
        }
        .challenge-detail-div{
            display:grid; 	
            gap: 1rem; 
            grid-template-rows: repeat(4, minmax(0, 1fr));
        }
        .main-reward-img{
            width:200px; 
            height:auto;
        }
        .second-reward-img{
            width:100px;
            height:auto;
            margin-left: 200px;
            margin-top: 100px; 
            position:absolute
        }
        .event-name-img{
            width:225px;
        }
        .header-div{
            flex-direction: column;
        }
        .reward-img-div{
            justify-content: end;
            align-items: center;
            display: flex;
            padding: 80px 0px;
        }
        .header-reward-img{
            width: 280px;
        }
        .unlayer-div{
            margin-top: 350px;
        }
       
    }
            /* xl */
    @media (min-width: 1280px) { 
        .faq-section{
            width:50% !important;
            padding:50px 100px 50px 100px; 
        }
        .rewards-section{
            display:grid; 	gap: 3rem; grid-template-columns: repeat(3, minmax(0, 1fr));
        }
        .content-div-main{
            padding:0px 100px;
        }
        .timer-div{
            display: flex;
            flex-direction: row;
            background: inherit;
            border-radius: unset;
            margin-top: 0px;
            position: relative;
        }
        .event-name-div{
            width:50%;
        }
        .eventNameDiv{
            text-align: left;
        }
        .challenge-detail-div{
            display:grid; 	
            gap: 3rem; 
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
        .main-reward-img{
            width:350px; 
            height:auto;
        }
        .second-reward-img{
            width:150px;
            height:auto;
            margin-left: 200px;
            margin-top: 200px; 
            position:absolute
        }
        .event-name-img{
            width:100%;
        }
        .header-div{
            flex-direction: row;
        }
        .reward-img-div{
            justify-content: center;
            align-items: center;
            display: flex;
            padding: 100px 0px;
        }
        .header-reward-img{
            width: auto;
        }
        .unlayer-div {
             margin-top: 0px;
        }

}
    /* 2xl */
    @media (min-width: 1536px) { 
        .faq-section{
            width:50% !important;
            padding:50px 100px 50px 100px; 
        } 
        .rewards-section{
            display:grid; 	gap: 3rem; grid-template-columns: repeat(3, minmax(0, 1fr));
        }
        .faq_quest{

            background: #FFFFFF;
            box-shadow: 0px 10px 25px -6px rgb(0 0 0 / 10%);
            border-radius: 9px;
            width: 100%;
            display: flex;
            padding: 7px;
            justify-content: space-between;
            align-items: center;
        }
        .rewards-section{
            display:grid; 	gap: 3rem; grid-template-columns: repeat(3, minmax(0, 1fr));
        }
        .content-div-main{
            padding:0px 100px;
        }
        .timer-div{
            display: flex;
            flex-direction: row;
            background: inherit;
            border-radius: unset;
            margin-top: 0px;
            position: relative;
        }
        .event-name-div{
            width:50%;
        }
        .eventNameDiv{
            text-align: left;
        }
        .challenge-detail-div{
            display:grid; 	
            gap: 3rem; 
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
        .main-reward-img{
            width:350px; 
            height:auto;
        }
        .second-reward-img{
            width:150px;
            height:auto;
            margin-left: 200px;
            margin-top: 200px; 
            position:absolute
        }
        .event-name-img{
            width: 100%;
        }
        .header-div{
            flex-direction: row;
        }
        .reward-img-div{
            justify-content: center;
            align-items: center;
            display: flex;
            padding: 100px 0px;
        }
        .header-reward-img{
            width: auto;
        }
        .unlayer-div {
             margin-top: 0px;
        }
        
    }
</style>
<div style="background-image: url({{$rootAssetPath.'/'.$eventImages->slider_background}}); background-size: cover; height:550px;">
    <div  class="header-div" style="display:flex;padding:25px;">
        <div> <img class="event-name-img" src="{{$rootAssetPath.'/'.$eventImages->event_name}}"><br>
        <div style=" text-align: left;font-size: 20px;font-weight: 700;font-family: poppins;">{{$eventslidersubtitle->meta_value}}</div></div>
        <div class="reward-img-div" style="width: 100%;">
        <img class="header-reward-img" src="{{$rootAssetPath.'/'.$eventImages->rewards}}"></div>
    </div>
</div>
<div style=" background-color:#F5F5F5;">
<div class=" content-div-main timer-div" style=" background-color:#F5F5F5;">
    <div class=" event-name-div py-8">                
        <p class=" eventNameDiv fpoppins-bold font-bold mb-4 capitalize text-4xl" style="color: #000">#{{$event->hashtag}} </p>
        <p class="eventNameDiv fpoppins-bold font-bold mb-8 capitalize text-2xl" style="color: #000">{{$event->name}}</p></div>
        @if($landingPage->show_countdown == 1)
            <div class="wfull mx-auto overflow-hidden bg-no-repeat maincounterdiv" >
                <div class="grid grid-cols-1 py-8 px-8 max-w-4xl mx-auto items-center md:max-w-screen-xl" id="counterBacjI" style="">
                    <div class="w-full flex flex-col md:max-w-screen-xl counterContentDiv mt-8" style="padding-bottom:7%;">
                        <p class="fpoppins-bold font-bold text-center mb-8 capitalize text-5xl lg:text-5xl" style="color: #000">{{$timerHeading}} </p>
                        <div class="flex justify-center items-center max-w-xl mx-auto">
                            <div class="flex flex-col flex-grow justify-center items-center">
                                <div id="cdays" class="timeCard flex flex-col relative flex-grow justify-center items-center text-white rounded-lg text-6xl px-6 lg:text-6xl lg:px-8 md:px-8 md:text-7xl shadow-lg fmontb" style="background:#D67028">
                                    <hr class="absolute w-full right-0 left-0 py-1" style="padding: 1px 0;z-index: 1;border: none;">
                                    <b class="fmontb" style="color:  #FFFFFF !important;z-index: 2;">00</b>
                                    <p class="fpoppins text-base text-center text-white">DAYS</p>
                                </div>

                            </div>
                            <div class="flex-grow-0 -mt-16">
                                <span class="timer-seperator tcenter text-9xl">&#x0003A;</span>
                            </div>
                            <div class="flex flex-col flex-grow justify-center items-center">
                                <div id="chrs" class="timeCard flex flex-col relative flex-grow justify-center items-center text-white rounded-lg text-6xl px-6 lg:text-6xl lg:px-8 md:px-8 md:text-7xl shadow-lg fmontb" style="background:#D67028">
                                    <hr class="absolute w-full right-0 left-0 py-1" style="padding: 1px 0;z-index: 1;border: none;">
                                    <b class="fmontb" style="color:  #FFFFFF !important;z-index: 2;">00</b>
                                    <p class="fpoppins text-base text-center text-white">HOURS</p>
                                </div>

                            </div>
                            <div class="flex-grow-0 -mt-16">
                                <span class="timer-seperator tcenter text-9xl">&#x0003A;</span>
                            </div>
                            <div class="flex flex-col flex-grow justify-center items-center">
                                <div id="cmin" class="timeCard flex flex-col relative flex-grow justify-center items-center text-white rounded-lg text-6xl px-6 lg:text-6xl lg:px-8 md:px-8 md:text-7xl shadow-lg fmontb" style="background:#D67028">
                                    <hr class="absolute w-full right-0 left-0 py-1" style="padding: 1px 0;z-index: 1;border: none;">
                                    <b class="fmontb" style="color:  #FFFFFF !important;z-index: 2;">00</b>
                                    <p class="fpoppins text-base text-center text-white">MIN</p>
                                </div>

                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
    <div  class="content-div-main  unlayer-div">
        @if($landingPage->show_sponsor == 1)
            <div> {!! json_decode($landingPage->sponsor_detail, true) !!} </div>
        @endif
        <div>
        <p  style="margin: 0px;color: #843fa1;line-height: 140%;text-align: left;word-wrap: break-word;font-size: 20px;margin-bottom: 25px;"><strong>Challenge Details</strong></p>

        <div  class="challenge-detail-div">
            <div style="display:flex">
                <span style="margin-right: 15px;"><img src="/images/reg-period.png"></span>
                <span>
                    <p style="font-weight:bold;">Registration period</p>
                    <p> {{ \Carbon\Carbon::Parse( $eventDates->registration_start_date )->toFormattedDayDateString()}} </p>
                    <p>{{ \Carbon\Carbon::Parse( $eventDates->registration_end_date )->toFormattedDayDateString()}}</p>
                </span>
            </div>
            <div style="display:flex">
                <span  style="margin-right: 15px;"><img src="/images/ch-period.png"></span>
                <span>
                    <p style="font-weight:bold;">Challenge period</p>
                    <p>{{ \Carbon\Carbon::Parse( $eventDates->leaderboard_start_date  )->toFormattedDayDateString()}} </p>
                    <p>{{ \Carbon\Carbon::Parse( $eventDates->leaderboard_end_date  )->toFormattedDayDateString()}}</p>
                </span>
            </div>
            <div style="display:flex">
            <span  style="margin-right: 15px;"><img src="/images/dist-icon.png"></span>
            <span>
                <p style="font-weight:bold;">Distance </p>
                <p>Finisher Distance {{$event->finisher_distance}} km</p>
                <p>Elite Finisher Distance {{$event->elite_finisher_distance}} km</p>
                <p><img src="/images/cycle-walk-run.png"></p>
            </span>
        </div>
        <div style="display:flex">
            <span  style="margin-right: 15px;"><img src="/images/loc-icon.png"></span>
            <span>
                <p style="font-weight:bold;">Location </p>
                <p>Its a virtual challenge. You can run and ride from anywhere in this world</p>
            </span>
        </div>
    </div>
</div>
<div> 
    {!! json_decode($landingPage->event_detail, true) !!}
</div>
@if($landingPage->show_rewards == 1)
    <div class="rewards-section" >
        @foreach($eventRewards as $rewards)
            <?php $rewardImages = json_decode($rewards->rewards_images);?>
            <div class="flex flex-col" style="    margin-bottom: 10px; padding:10px 30px;border-radius: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.1)); background:#FFFFFF">
                <div style="display:flex; flex-direction:row; align-items:baseline; justify-content:center;"> 
                    <img src="{{$rootAssetPath.'/'.$rewardImages->medium[0]}}"  class="main-reward-img" style="">
                    @if(isset($rewardImages->medium[1]))
                        <img src="{{$rootAssetPath.'/'.$rewardImages->medium[1]}}" class="second-reward-img"style="">
                    @endif
                </div>
                <div style="    height: -webkit-fill-available;">
                    <h1 style="font-family: 'Inter';font-style: normal;font-weight: 600;font-size: 22px;line-height: 33px;color: #5040A1;">
                        {{$rewards->name}}
                    </h1>
                    @if($rewards->description)
                        {!! $rewards->description !!}
                    @endif
                </div>
                <div style="bottom: 0;margin: 0 auto;width: 100%;">
                    <div style="text-align: center;">
                        <button style="width: 97px;height: 44px;background: #7E1FF6;border-radius: 5px;text-align: center;letter-spacing: 1.08px;color: #FFFFFF;text-align: center;">Buy Now</button>
                    </div>
                    <div style="text-align: center; margin-top:20px; margin-bottom:20px"><a style="font-family: 'Poppins';font-style: normal;font-weight: 700;font-size: 14px;line-height: 20px;text-align: center;letter-spacing: 1.08px;color: #7E1FF6;">View full size</a></div>
                </div>
            </div>
        @endforeach
    </div>
@endif
</div>
<div class="faq-section" style="">
    <p  style="margin: 0px;color: #843fa1;line-height: 140%;text-align: left;word-wrap: break-word;font-size: 20px;margin-bottom: 25px;"><strong>Most Frequently Asked Questions</strong></p>
    <p>FIND ALL YOUR ANSWERS RELATED TO THIS EVENT.</p>
    <div class="container">
        <div class="panel-group" id="accordion">
            @foreach($FaqData as $key=>$faq)
                <div class="panel panel-default" style="background:#FFFFFF; margin-bottom:10px;">
                    <div class="panel-heading">
                        <h4 class="panel-title" style="margin-bottom: 0px;">
                            <a class="faq_quest" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}" style="display: flex;width: 100%;    justify-content: space-between;padding: 5px;align-items: center;">
                                <span>{{$faq[0]}}</span>
                                <span class="caret">
                                    <svg width="20" height="11" viewBox="0 0 20 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.11612 10.3858C9.60427 10.874 10.3957 10.874 10.8839 10.3858L18.8388 2.43088C19.327 1.94273 19.327 1.15127 18.8388 0.663117C18.3507 0.174962 17.5592 0.174962 17.0711 0.663117L10 7.73419L2.92893 0.663119C2.44078 0.174964 1.64932 0.174964 1.16116 0.66312C0.673009 1.15128 0.673009 1.94273 1.16116 2.43089L9.11612 10.3858ZM8.75 8.50195L8.75 9.50195L11.25 9.50195L11.25 8.50195L8.75 8.50195Z" fill="#5040A1"/>
                                    </svg>
                                </span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse{{$key}}" class="panel-collapse collapse in" style="    background: #FFFFFF;padding:10px">
                        <div class="panel-body">{{$faq[1]}}</div>
                    </div>
                </div>
   
            @endforeach
        </div> 
    </div>
</div>
<script type="text/javascript">
    var $ = jQuery;
    $(document).ready(function(){
        <?php if($countDownDate != '' && $countDownDate != '__'){?>
        var countDownDate= "<?php echo $countDownDate ?>";
        {{--var countDownDate = new Date("<?php echo $countDownDate->format('M d, Y H:i:s')?>").getTime();--}}
        <?php if(!$challengeEnded){?>
        var starts ="<?php echo $nowtimestamp ?>";
        console.log(countDownDate);
        console.log(starts);
        var counter = countDownDate - starts;
        console.log(counter);
        jQuery( "#cdays b" ).text(String(Math.floor(counter / (1000 * 60 * 60 * 24))).padStart(2,'0'));
        jQuery( "#chrs b" ).text(String(Math.floor((counter % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2,'0'));
        jQuery( "#cmin b" ).text(String(Math.floor((counter % (1000 * 60 * 60)) / (1000 * 60))).padStart(2,'0'));
        jQuery( "#cmin b" ).text(String(Math.floor((counter % (1000 * 60)) / 1000)).padStart(2,'0'));
        var x = setInterval(function() {
            // var now = new Date().getTime();
            var distance = countDownDate - starts;
            console.log(distance);
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            console.log(days);
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000) ;
            jQuery("#cdays b").text(String(days).padStart(2, '0'));
            jQuery("#chrs b").text(String(hours).padStart(2, '0'));
            jQuery("#cmin b").text(String(minutes).padStart(2, '0'));
            jQuery("#csec b").text(String(seconds).padStart(2, '0'));
        }, 1000 );
<?php }?>
<?php }?>
    });
</script>
