<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" ></script>
<style>
    .timeCard hr {
        background-color: var(--counterCardLineColor);
    }
    .timeCard::before {
        content: "";
        width: 10px;
        height: 10px;
        position: absolute;
        background-color: var(--counterCardLineColor);
        left: 0;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .timeCard::after {
        content: "";
        width: 10px;
        height: 10px;
        position: absolute;
        background-color: var(--counterCardLineColor);
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
            padding-bottom: 55% !important;
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
    }
    @media only screen and (max-width : 480px) {
        .counterContentDiv {
            padding-bottom: 55% !important;
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
    }
    /* Mobile devices*/
    @media only screen and (max-width: 480px) and (min-width: 320px) {
        .counterContentDiv {
            padding-bottom: 65% !important;
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
    }
    /* Smallert Screen Laptop */
    @media only screen and (max-width: 1024px) and (min-width: 769px)  {
        #white_leaderboard{
            position:unset !important;
        }
        .whtBx{
            margin-bottom: -30px !important;
        }
    }
    /* Smallert Screen Laptop */
    @media only screen and (max-width: 1200px) and (min-width: 1025px)  {
    }
    /* Extra Large Screens */
    @media (min-width: 1201px)  {
    }
    .whtBx {
        margin: 0 auto;

        justify-content: center;

        display: flex;
    }
</style>
<div style="background-image: url({{$rootAssetPath.'/'.$eventImages->slider_background}}); background-size: cover; height:550px;">
    <div  style="display:flex;">
        <div> <img src="{{$rootAssetPath.'/'.$eventImages->event_name}}"><br>
        <div style=" text-align: center;font-size: 20px;font-weight: 700;font-family: poppins;">{{$eventslidersubtitle->meta_value}}</div></div>
        <div style="width: 100%;justify-content: center;align-items: center;display: flex;padding: 100px 0px;"><img src="{{$rootAssetPath.'/'.$eventImages->rewards}}"></div>

    </div>


</div>

<div class="flex" style="    background-color:#F5F5F5;">
<div class="w-1/2"> <h1>{{$event->hashtag}}</h1></div>
    @if($landingPage->show_countdown == 1)
    <div class="wfull mx-auto overflow-hidden bg-no-repeat maincounterdiv" >
        <div class="grid grid-cols-1 py-16 lg:pb-64 lg:pt-28 px-8 max-w-4xl mx-auto items-center md:max-w-screen-xl" id="counterBacjI" style="">
            <div class="w-full flex flex-col md:max-w-screen-xl counterContentDiv mt-8" style="padding-bottom:7%;">
                <h2 class="fpoppins-bold font-bold text-center mb-8 capitalize text-5xl lg:text-5xl" style="color: #000">{{$timerHeading}} </h2>
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
                <div class="w-full max-w-screen-md mx-auto mt-4 hidden">
                    <p class="fpoppins text-2xl text-center text-black mt-6 mb-4">test</p>
                </div>
                <div class="fll wfull tcenter flex justify-center align-center items-center hidden" data-aos="fade-up" >
                    <a href="#" class="fpoppins  font-bold text-2xl text-center p-3 rounded-md mt-10 w-full max-w-sm capitalize" style="background-color: #213983 !important;color: white">join now</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@if($landingPage->show_sponsor == 1)
    <div> {!! json_decode($landingPage->sponsor_detail, true) !!} </div>
    @endif
<div> {!! json_decode($landingPage->event_detail, true) !!} </div>
@if($landingPage->show_rewards == 1)

    <div class="flex">
    @foreach($eventRewards as $rewards)
            <?php $rewardImages = json_decode($rewards->rewards_images);
            print_r($rewardImages->small[0] );
            ?>
        <div class="w-1/3 flex flex-row">
            <div> <img src="{{$rootAssetPath.'/'.$rewardImages->small[0]}}">
                @if(isset($rewardImages->medium[1]))
                <img src="{{$rootAssetPath.'/'.$rewardImages->medium[1]}}">
                    @endif
            </div>
        </div>
    @endforeach
    </div>
@endif
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
