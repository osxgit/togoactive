<!DOCTYPE htmlPUBLIC “-//W3C//DTD XHTML 1.0 Transitional//EN” “http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd”>
<html xmlns=“http://www.w3.org/1999/xhtml” lang=“en”>
<head>
    <title> {{$mailData['data']['eventName']}} Registration</title>
    <meta http-equiv=“Content-Type” content=“text/html; charset=utf-8">
    <meta http-equiv=“X-UA-Compatible” content=“IE=edge”>
    <meta name=“viewport” content=“width=device-width, initial-scale=1.0">
    <meta name=“color-scheme” content=“light dark”>
    <meta name=“supported-color-schemes” content=“light dark”>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #F6F9FC;
        }
        .main {
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            font-family: sans-serif;
            color: #4A4A4A;
        }
        .text-primary {
            color: #7E1FF6 !important;
        }

        a {
            color: #777777 !important;
        }

        .bg-active-nav>a>span {
            color: #7E1FF6 !important;
        }


        .active:after {
            border-color: #1c64f3 !important;
        }

        .activefailed:after {
            border-color: #DD1616 !important;
        }

        .title {
            height: 54px;

            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 36px;
            line-height: 54px;
            /* identical to box height */

            display: flex;
            align-items: center;
            letter-spacing: 0.01em;
            justify-content: center;

            color: #34353C;
        }

        .title-content {
            ont-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            font-size: 18px;
            line-height: 27px;
            display: flex;
            align-items: center;
            margin: auto;
            margin-top: 45px;
            margin-bottom: 20px;

            color: #000000;
            width: 100%;
            max-width: 600px;

        }

        .navbar {
            width: 100%;
            height: 88.49px;

        }

        .navbar ul {
            display: flex;
            justify-content: flex-end;
        }

        .navbar ul li {
            list-style-type: none;

            padding: 0 12px;
        }

        .navbar ul li a {
            text-decoration: none;
        }

        .navbar ul li a svg {
            width: 30px;
            height: 30px;
        }

        .image-logo .left h2 {
            width: 506px;
            height: 108px;
            margin-left: 70px;
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 36px;
            line-height: 54px;
            display: flex;
            align-items: center;
            letter-spacing: 0.01em;
            color: #000000;
        }

        .image-logo .left {
            background: #D9D9D9;
            width: 970px;
        }

        .image-logo .right img {
            width: 210px;
            margin-right: 50px;
            height: 44px;
        }

        .image-logo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 150px;
            margin-bottom: 60px;
        }

        .social_header_image{display: flex;
        justify-content: end}

        .mt-pd {
            margin: 10 0 10 0;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen main">

        <main>
            <div class=" smt:mx-4  mdt:mx-48">
                <div class="social_header_image">
                   <img src="{{ asset('images/social-header.png') }}" />
                </div>
                <div class="image-logo">
                    <div class="left">
                        <h2>Event logo image here
                            (from images admin panel</h2>
                    </div>
                    <div class="right">
                        <img id="nvBrLgo" class="nvIcnWrp" data-href="https://www.togoparts.com" style="cursor: pointer;" src="{{ asset('images/logo.png') }}" alt="togoparts Logo"/>
                    </div>
                </div>

                <div class=" smt:mx-4  mdt:mx-48">
                    <div class="float-left w-full">
                        <h2 class=" text-center float-left w-full ffarial fweightbold fsize22 mrgbtm10 title" style="text-align: center; justify-content: center;">
                            {{$mailData['data']['eventName']}} Registration
                        </h2>

                    <div class="title-content" style="text-align: center; margin-bottom:20px;">{!! $mailData['data']['successPage']['email_body'] !!}</div>

                    <div class="fln mcenter w-full mt-pd" style="max-width:600px ; margin:0 auto;">

                        <div  style="max-width: 450px;margin: 0 auto;padding: 10px;">
                            <table style="width:100%; border:1px solid darkgray;box-shadow: 0px 0px 8px 2px #ccc;">
                                <tr><th  style="padding:10px">Order Summary</th><th  style="padding:10px"></th></tr>
                                <tr>
                                    <td style="padding:10px">Reference Number </td>
                                    <td  style="padding:10px"> {{$mailData['data']['registrationData']['payment']['payment_intent']}}</td>
                                </tr>
                                <tr>
                                    <td  style="padding:10px">Status </td>
                                    <td  style="padding:10px">{{$mailData['data']['registrationData']['payment']['status']}}</td>
                                </tr>
                                <tr>
                                    <td  style="padding:10px">Name </td>
                                    <td  style="padding:10px">{{$mailData['data']['registrationData']['event_user']['user']['fullname']}}</td>
                                </tr>
                                @if($mailData['data']['registrationData']['event_user']['is_paid_user'] ==1)
                                <tr>
                                    <td  style="padding:10px" >Address </td>
                                    <td  style="padding:10px">{{$mailData['data']['registrationData']['event_user']['address']." ".$mailData['data']['registrationData']['event_user']['blk']." ".$mailData['data']['registrationData']['event_user']['city']." ".$mailData['data']['registrationData']['event_user']['state']." ".$mailData['data']['registrationData']['event_user']['subdistrict']." ".$mailData['data']['registrationData']['event_user']['postal_code']." ".$mailData['data']['registrationData']['event_user']['country'] }}</td>
                                </tr>
                                @endif

                                @if($mailData['data']['registrationData']['event_user']['is_paid_user'] ==1)
                                <tr>
                                    <td  style="padding:10px">Rewards</td>
                                    <td  style="padding:10px">
                                        @foreach($mailData['data']['registrationData']['payment']['user_reward'] as $rewards)
                                                <p> {{$rewards['rewards']['name']}}</p>
                                        @endforeach

                                    </td>
                                </tr>
                                @endif
                                @if($mailData['data']['registrationData']['event_user']['team_user'])
                                <tr>
                                    <td  style="padding:10px">Team Name</td>
                                    <td  style="padding:10px">{{$mailData['data']['registrationData']['event_user']['team_user']['team']['team_name']}}</td>
                                </tr>
                                @endif
                                @if($mailData['data']['registrationData']['event_user']['group'])
                                <tr>
                                    <td  style="padding:10px">{{$mailData['data']['groupingHeader']}}</td>
                                    <td  style="padding:10px"> {{$mailData['data']['registrationData']['event_user']['group']}}</td>
                                </tr>
                                    @endif
                            </table>
                        </div>
                        @if($mailData['data']['registrationData']['event_user']['is_paid_user'] ==0)
                            {!! $mailData['data']['successPage']['no_purchase_made'] !!}
                            <div class="float-left w-full mt-5 mb-5" style="height:1px;background:#e0e0e0">

                            </div>
                            @elseif($mailData['data']['canUpgrade'] ==1)
                        {!! $mailData['data']['successPage']['partial_purchase_made'] !!}
                            <div class="float-left w-full mt-5 mb-5" style="height:1px;background:#e0e0e0">

                            </div>
                            @elseif($mailData['data']['canUpgrade'] ==0)
                        {!! $mailData['data']['successPage']['all_purchase_made'] !!}
                            <div class="float-left w-full mt-5 mb-5" style="height:1px;background:#e0e0e0">

                            </div>
                                @endif
                        <div class="mt-4">
                        {!! $mailData['data']['successPage']['invite_friend'] !!}
                        </div>

                        <div class="">
                            <div class="float-left w-full ">
                                <div class="fln w-full mcenter" style="max-width: 800px;">
                                    <div class="float-left w-full flex flex-col">
                                        <div class="float-left w-full flex flex-col ">

                                            <div class=" mt-4 flex flex-col" style="width: 98%;max-width:600px" id="social">

                                                <div class="float-left w-full text-center fpoppins mb-2" >
                                                    <a target="_blank" href="//api.whatsapp.com/send?text=<?php echo '' ?><?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>" data-href=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?> data-action="share/whatsapp/share" class="float-left w-full block rounded text-white tdnone flex justify-center items-center fr-share-btn" data-share="whatsapp" style="    padding: 10px 0;line-height:24px;background-color:#21B865;color:#fff !important; display: flex; justify-content: center;    margin-bottom: 8px; border-radius: 6px;">
                                                        <img src="{{ asset('images/whatsapp.png') }}"/>
                                                       </a>
                                                </div>
                                                <div class="float-left w-full text-center fpoppins mb-2">
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?> " target="_blank" class="float-left w-full  block rounded text-white tdnone  flex justify-center items-center" style="    padding: 10px 0;line-height:24px;background:#0D87E2;color:#fff !important; display: flex; justify-content: center;  margin-bottom: 8px; border-radius: 6px;""> <img src="{{ asset('images/fb.png') }}"/>
                                                      </a>
                                                </div>
                                                <div class="float-left w-full text-center fpoppins mb-2">
                                                    <a href="https://twitter.com/intent/tweet?text=<?php echo '' ?>&url=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>" data-href=<?php echo env("APP_URL").'/'.$mailData['data']['event_slug'] ?>  target="_blank" class="float-left w-full  block rounded text-white tdnone fr-share-btn  flex justify-center items-center" data-share="twitter" style="  padding: 10px 0;line-height:24px;background-color:#03A9F4;color:#fff !important; display: flex; justify-content: center;  margin-bottom: 8px;  border-radius: 6px;""> <img src="{{ asset('images/twitter.png') }}"/>
                                                        </a>
                                                </div>
                                                <div class="float-left w-full text-center fpoppins mb-2">
                                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?> " target="_blank" class="float-left w-full  block rounded text-white tdnone  flex justify-center items-center" style="    padding: 10px 0;line-height:24px;background-color:#0077B5;color:#fff !important;display: flex;  justify-content: center; margin-bottom: 8px;  border-radius: 6px;""><img src="{{ asset('images/linked-in.png') }}"/>
                                                       </a>
                                                </div>
                                                <div class="float-left w-full text-center fpoppins mb-2">
                                                    <a href="https://telegram.me/share/url?url=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>&text=<?php '' ?>" data-href=<?php echo env("APP_URL").'/'.$mailData['data']['event_slug'] ?>  data-share="telegram" class="float-left fr-share-btn w-full  block rounded text-white tdnone  flex justify-center items-center" style="    padding: 10px 0;line-height:24px;background-color:#0088CC;color:#fff !important; display: flex;    border-radius: 6px;     justify-content: center; margin-bottom: 8px;"><img src="{{ asset('images/telegram.png') }}"/>
                                                       </a>
                                                </div>

                                                </div>
                                            </div>
                                            <div class="flex flex-col" style="text-align: center; margin-bottom:20px">
                                                <p class="float-left w-full text-center mobtext-center fpoppins" style="color: #6e6e6e;">Alternatively, you can also share the referral code with your friends.</p>
                                                <p class="float-left w-full fweightbold text-center fpoppins fsize22 mrgtop20" style="margin-bottom: 0px; font-size: 24px;
                                                font-weight: 700;"><?php echo "Referral Code"?> : <span style="color: #00acea;">{{$mailData['data']['registrationData']['event_user']['user']['username']}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="float-left w-full mrgtop20 mrgbtm20" style="height:1px;background:#e0e0e0">

                            </div>

                            <div class="float-left w-full" style="text-align: center">
                                <div class="fln w-full mcenter" style="max-width: 800px;">
                                    <div class="float-left w-full">
                                        <div class="float-left w-full text-center" style="    font-size: 24px;
                                        font-weight: 600;
                                        margin: 24px 0 30px;">
                                            <label class="float-left w-full ffarial fweightbold fsize22 mrgbtm10"><?php echo "Next Steps"?></label>
                                        </div>

                                        <div class="float-left w-full mrgtop20  ffarial fweight400 fsize14 text-black">
                                            <p class="float-left w-full text-center mrgbtm10">1. <?php echo "First, download the TOGOPARTS app on your mobile phone"?></p>
                                            <p class="float-left w-full text-center mrgbtm10">2. <?php echo "Once you have downloaded the app, open it and click on the \"RECORD\" button to start recording your live activities."?></p>
                                            <p class="float-left w-full text-center mrgbtm10">3. <?php echo "The app will then take you to the Strava app, which is used to record your rides. Please ensure that your privacy settings on Strava are set to \"EVERYONE\" so that your rides can be recorded."?></p>
                                            <p class="float-left w-full text-center mrgbtm10">4. <?php echo "Once you have verified and adjusted your Strava privacy settings as needed, you can begin your ride."?></p>
                                            <p class="float-left w-full text-center ">5. <?php echo "Make sure to start your ride during (from <STARTDATE> <STARTIME>hrs to <ENDDATE> <ENDTIME>hrs)"?></p>
                                        </div>
                                        @if($mailData['data']['registrationData']['event_user']['user']['strava_id'] ==0 || $mailData['data']['registrationData']['event_user']['user']['strava_id'] =="")


                                        <div>
                                            <div class="float-left w-full text-center">
                                                <label class="float-left w-full ffarial fweightbold fsize22 mrgbtm10">
                                                    Connect to STRAVA
                                                </label>
                                            </div>
                                            <div class="float-left w-full mrgtop20  ffarial fweight400 fsize14 text-black">
                                                <p class="float-left w-full text-center mrgbtm10">If you have not authorised togoparts to connect to yur strava account or if you are unsure
                                                if you have done so already, CONNECT WITH STRAVA now</p>
                                            </div>
                                            <div class="float-left w-full text-center">
                                            <label class="float-left w-full ffarial fweightbold fsize22 mrgbtm10">Set STRAVA permissions</label>
                                            </div>
                                            <div class="float-left w-full mrgtop20  ffarial fweight400 fsize14 text-black">

                                                <p class="float-left w-full text-center mrgbtm10">If you have connected with strava after registration with all the boxes ticked, you are good to go. Otherwise, double-check to ensure that your privacy settings are set to Everyone for your activities to be recorded.</p>
                                            </div>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>

                            <div class="float-left w-full text-center mrgtop30 mrgbtm40 dispflex jcenter acenter fwrap0 mobfwrap1 mobjcenter" style="display: flex;
                            justify-content: center;">
                                <div class="float-left wauto mobw-full" style="width: 40%;">
                                    <h4 class="float-left w-full fweightbold">iOS</h4>
                                    <img src="{{ asset('images/ios-1.png') }}"  class="mb-2" style="max-height: 400px;">
                                    <img src="{{ asset('images/ios-3.png') }}" class="mb-2" style="max-height: 400px;">
                                </div>
                                <div class="float-left wauto mobw-full mt-2" style="width: 40%;">
                                    <h4 class="float-left w-full fweightbold">Android</h4>
                                    <img src="{{ asset('images/ios-2.png') }}" class="mb-2" style="max-height: 400px;">
                                    <img src="{{ asset('images/ios-4.png') }}" class="mb-2" style="max-height: 400px;">

                            </div>


                        </div>
                            <div class="float-left w-full fpoppins mrgbtm40 mrgtop20 text-center " style="margin-top: 55px;
                            margin-bottom: 40px; text-align:center;">
                                <a href="https://www.togoparts.com/app" class=" text-center fpoppins text-white no-underline p-2 rounded" style="    background: #F6861F;
                                padding: 9px 20px;
                                text-decoration: none;
                                border-radius: 6px;
                                color: #ffff !important;">Download togoparts app</a>
                            </div>
                    </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
