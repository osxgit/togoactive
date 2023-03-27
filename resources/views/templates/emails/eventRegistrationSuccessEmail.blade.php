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
            box-sizing: border-box;
        }

        p li,
        ul li,
        ol li {
            list-style-type: none;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        .container {
            display: block;
            margin: 0 auto !important;
            max-width: 586px;
            width: 586px;
        }

        .registration-summary {
            width: 464px;
            margin: auto;
        }

        .registration-summary h3 {
            font-family: 'Arial';
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 28px;
            color: #000000;
            margin: 0;
            height: 34px;
        }

        .registration-summary .heading p {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 21px;
            color: #777777;
        }

        .registration-summary .upgrade {
            text-align: center;
        }

        .registration-summary .upgrade h3 {
            padding: 44px 0 12px;
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 30px;
            text-align: center;
            color: #C12227;
        }

        .registration-summary .upgrade p {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 21px;
            text-align: center;
            color: #000000;
        }

        .registration-summary .upgrade .upgrade-btn {
            background: #ED2939;
            border-radius: 5px;
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 14px;
            line-height: 24px;
            color: #FFFFFF;
            padding: 10px 40px;
            border: none;
        }

        hr {
            border: 1px solid #BBBBBB;
            margin: 20px 0;
        }

        .registration-summary .upgrade .invite-friend .invite_star {
            padding: 50px 0 0;
        }

        .registration-summary .upgrade .invite-friend .invite_star_social {
            display: flex;
            flex-direction: column;
            width: 84%;
            margin: auto;
            padding: 20px 0;
        }

        .registration-summary .upgrade .invite-friend .invite_star_social button {
            color: #FFFFFF;
            padding: 16px 0px;
            border: none;
            margin: 10px 0;
            border-radius: 5px;
            font-family: 'Arial';
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .registration-summary .upgrade .invite-friend .invite_star_social button a {
            display: flex;
            align-items: center;
        }

        .registration-summary .upgrade .invite-friend .invite_star_social button img {
            margin-right: 15px;
        }

        .registration-summary .upgrade .invite-friend .invite_star_social button {
            text-decoration: none;
            color: #fff;
        }

        .registration-summary .upgrade .invite-friend p {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            color: #6E6E6E;
        }


        .next-step {
            text-align: center;
            margin-bottom: 60px;
        }

        .next-step h3 {
            font-family: 'Arial';
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 28px;
            color: #F6861F;
        }

        .next-step ul li {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 27px;
            color: #34353C;
            margin-bottom: 20px;
        }

        .next-step p {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 27px;
            color: #34353C;
        }

        .next-step .next-step-img img {
            margin-bottom: 20px;
        }

        .next-step .next-step-img {
            display: flex;
            justify-content: space-between;
        }

        .next-step .next-step-img img {
            width: 100%;
        }

        .next-step .next-step-img .right {
            width: 44%;
        }

        .next-step .next-step-img .left {
            width: 44%;
        }

        .next-step button {
            background: #F6861F;
            border-radius: 5px;
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 14px;
            line-height: 24px;
            color: #FFFFFF;
            padding: 10px 40px;
            border: none;
        }

        .heading h2 {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 26px;
            letter-spacing: 0.01em;
            color: #34353C;
        }

        .heading p {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 27px;
            display: flex;
            align-items: center;
            color: #000000;
        }


        .img_admin_panel {
            display: flex;
            align-items: center;
        }

        .img_admin_panel .left {
            background: #D9D9D9;
            width: 50%;
            text-align: center;
            padding: 40px 0;
        }

        .img_admin_panel .right {
            width: 50%;
            text-align: center;
        }

        .img_admin_panel .left h2 {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 36px;
            line-height: 54px;
            letter-spacing: 0.01em;
            color: #000000;
            width: 66%;

        }

        .Registration .social-top ul li a img {
            width: 25px;
        }

        .Registration .social-top ul {
            display: flex;
            justify-content: end;
        }

        .Registration .social-top ul li {
            border-left: 2px dashed #BBBBBB;
            padding: 0 8px;
        }

        .Registration {
            width: 600px;
            margin: auto;
        }

        .registration-summary-table tr.border-bottom th {
            border-bottom: 2px solid #BBBBBB;
        }

        .registration-summary-table th {
            padding: 14px 0;
        }

        .registration-summary-table table {
            border: 3px solid #E5E7EB;
            padding: 0px 14px;
            margin-top: 14px;
            width: 100%;
        }

        .next-step ul {
            padding-left: 0;
        }

        @media only screen and (max-width: 420px) {
            .registration-summary .upgrade .invite-friend .invite_star {
                padding: 80px 0 0;
            }



        }

        @media only screen and (max-width: 576px) {
            .Registration {
                width: 100%;
            }

            .container {
                width: 100%;
            }

            .registration-summary {
                width: 100%;
            }

            .registration-summary .upgrade h3 {
                padding: 30px 0 0px;
            }

            .next-step h3 {
                padding: 0 !important;
            }

        }

        @media only screen and (max-width: 650px) {}
    </style>

</head>

<body>

    <div class="Registration">

        <div class="social-top">
            <ul>
                <li><a href=""><img src="{{ asset('images/android_header.png')}}" alt="icon"></a></li>
                <li><a href=""><img src="{{ asset('images/twitter_header.png')}}" alt="icon"></a></li>
                <li style="border-left: none; padding-left: 0;">
                    <a href=""><img src="{{ asset('images/apple_header.png')}}" alt="icon"></a></li>
                <li><a href=""><img src="{{ asset('images/facebook_header.png')}}" alt="icon"></a></li>
            </ul>
        </div>

        <div class="img_admin_panel">
            <div class="left">
                @if(isset($mailData['data']['eventImages']['icon']) && $mailData['data']['eventImages']['icon'] !='')
                <img src="{{url('https://static.togoactive.com/'.$mailData['data']['eventImages']['icon'])}}"
                    width="210" />
                @endif
            </div>
            <div class="right">
                <img data-href="https://www.togoparts.com" style="cursor: pointer;" src="{{ asset('images/logo.png') }}"
                    alt="Togoparts" />
            </div>
        </div>
        <div class="container">

            <div class="heading" style="text-align: center; margin-bottom: 30px;">
                <h2> {{$mailData['data']['eventName']}} Registration</h2>
                <p>{!! $mailData['data']['successPage']['email_body'] !!}</p>
            </div>


            <div class="registration-summary">

                <div class="heading">
                    <h3>Registration Summary</h3>
                    <p style="margin: 0;">13 Mar 2023, Monday 11:59 PM (GMT +8)
                        Txn ID: #shortname>_payments-table-id>
                        Payment ID : {{$mailData['data']['registrationData']['payment']['payment_intent']}}
                    </p>
                </div>

                <div class="registration-summary-table" style="text-align: left;">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>{{$mailData['data']['registrationData']['event_user']['user']['fullname']}}</th>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <th>{{$mailData['data']['registrationData']['event_user']['user']['fullname']}}</th>
                        </tr>
                        @if($mailData['data']['registrationData']['event_user']['team_user'])
                        <tr>
                            <th>Team Name</th>
                            <th>{{$mailData['data']['registrationData']['event_user']['team_user']['team']['team_name']}}
                            </th>
                        </tr>
                        @endif
                        @if($mailData['data']['registrationData']['event_user']['group'])
                        <tr>
                            <th>{{$mailData['data']['groupingHeader']}}</th>
                            <th>{{$mailData['data']['registrationData']['event_user']['group']}}</th>
                        </tr>
                        @endif
                        <tr class="border-bottom">
                            <th colspan="2" style="padding: 0;"></th>
                        </tr>
                        <tr>
                            <th>Participation Fee</th>
                            <th>Free</th>
                        </tr>
                        @if($mailData['data']['registrationData']['event_user']['is_paid_user'] ==1)
                        @foreach($mailData['data']['registrationData']['payment']['user_reward'] as $rewards)
                        <tr>
                            <th>{{$rewards['rewards']['name']}} <br><span style="font-family: 'Poppins';
                                        font-style: normal;
                                        font-weight: 400;
                                        font-size: 10px;
                                        color: #6B7280;">Size M | Quanity : 1</span></th>
                            <th>SGD 100</th>
                        </tr>
                        @endforeach
                        @endif
                        <tr class="border-bottom">
                            <th colspan="2" style="padding: 0;"></th>
                        </tr>
                        <tr>
                            <th>Coupon Used</th>
                            <th>FRIEND10</th>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <th>10% (SGD 10)</th>
                        </tr>
                        <tr class="border-bottom">
                            <th colspan="2" style="padding: 0;"></th>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <th>SGD 100</th>
                        </tr>
                        <tr class="border-bottom">
                            <th colspan="2" style="padding: 0;"></th>
                        </tr>
                        @if($mailData['data']['registrationData']['event_user']['is_paid_user'] ==1)
                        <tr>
                            <th>Address :</th>
                        </tr>
                        <tr>
                            <th style="padding: 0;">{{$mailData['data']['registrationData']['event_user']['address']."
                                ".$mailData['data']['registrationData']['event_user']['blk']."
                                ".$mailData['data']['registrationData']['event_user']['city']."
                                ".$mailData['data']['registrationData']['event_user']['state']."
                                ".$mailData['data']['registrationData']['event_user']['subdistrict']."
                                ".$mailData['data']['registrationData']['event_user']['postal_code']."
                                ".$mailData['data']['registrationData']['event_user']['country'] }}</th>
                        </tr>
                        @endif
                    </table>

                </div>

                <div class="upgrade">
                    @if($mailData['data']['registrationData']['event_user']['is_paid_user'] ==0)
                    {!! $mailData['data']['successPage']['no_purchase_made'] !!}
                    @elseif($mailData['data']['canUpgrade'] ==1)
                    {!! $mailData['data']['successPage']['partial_purchase_made'] !!}
                    @elseif($mailData['data']['canUpgrade'] ==0)
                    {!! $mailData['data']['successPage']['all_purchase_made'] !!}
                    @endif
                    <hr>
                    @if ($mailData['data']['successPage']['active_custom_message']==1)
                    {!! $mailData['data']['successPage']['custom_message'] !!}
                    <hr>
                    @endif
                    <div class="invite-friend">
                        <h3>Invite your friends to join the event <br> and earn achievement and discounts!</h3>
                        <img src="{{ asset('images/invite_star_icon.png') }}" alt="icon" class="invite_star">
                        <div class="invite_star_social">
                            <button style="background: #58B56D; width:150px;"><a target="_blank" href="//api.whatsapp.com/send?text=<?php echo '' ?><?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>" data-href="<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>" data-action="share/whatsapp/share"><img src="{{ asset('images/whatsapp_icon.png')}}" alt="icon">Invite via Whatsapp</a></button><br/>
                            <button style="background:#3E84DB; width:150px;"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?> " target="_blank"><img src="{{ asset('images/facebook_icon.png')}}" alt="icon"> Invite via Facebook</a></button><br/>
                            <button style="background: #4BA6EE; width:150px;"><a href="https://twitter.com/intent/tweet?text=<?php echo '' ?>&url=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>"><img src="{{ asset('images/twitter_icon.png')}}" alt="icon"> Invite via Twitter</a></button><br/>
                            <button style="background: #0077B5; width:150px;"><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?> " target="_blank" ><img src="{{ asset('images/linkdin_icon.png')}}" alt="icon"> Invite via LinkedIn</a></button><br/>
                            <button style="background: #0088CC; width:150px;"><a href="https://telegram.me/share/url?url=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>&text=<?php '' ?>" target="_blank" data-href="<?php echo env("APP_URL").'/'.$mailData['data']['event_slug'] ?>"  data-share="telegram"><img src="{{ asset('images/telegram_icon.png')}}" alt="icon"> Invite via Telegram</a></button><br/>
                        </div>
                        <p style="margin-bottom: 6px;">Alternatively, you can also share the referral code with your
                            friends.</p>
                        <h3 style="color: #6E6E6E; font-weight: 400; padding: 0;">Referral Code: <span
                                style="font-weight: 600; color: #0D88CE;">{{$mailData['data']['registrationData']['event_user']['user']['username']}}</span></h3>
                    </div>
                </div>


            </div>
            <hr>

            <div class="next-step">
                <h3>Next Steps</h3>
                <ul>
                    <li>1. First, download the <span>TOGOPARTS</span> app on your mobile phone </li>
                    <li>2. Once you have downloaded the app, open it and click on the <span>"RECORD"</span> button to
                        start
                        recording your live activities. </li>
                    <li>3. The app will then take you to the Strava app, which is used to record your rides. Please
                        ensure
                        that
                        your privacy settings on Strava are set to <span>"EVERYONE"</span> so that your rides can be
                        recorded.
                    </li>
                    <li>4. Once you have verified and adjusted your Strava privacy settings as needed, you can begin
                        your
                        ride.
                    </li>
                    <li>5. Make sure to start your ride during <span> (from <STARTDATE><STARTIME>hrs to <ENDDATE><ENDTIME>hrs). </span></li>
                </ul>
                @if($mailData['data']['registrationData']['event_user']['user']['strava_id'] ==0 || $mailData['data']['registrationData']['event_user']['user']['strava_id'] =="")

                <h3 style="padding-top: 20px;">Connect to STRAVA</h3>
                <p>If you have not authorised togoparts to connect to yur strava account or 
                    if you are unsure if you have done so already, 
                    <span style="color: #0D88CE; font-weight: 600;">CONNECT WITH STRAVA</span>now
                </p>

                <h3 style="padding-top: 20px;">Set STRAVA permissions</h3>
                <p>If you have connected with strava after registration with all the boxes ticked, you are good to go.
                    Otherwise, double-check to ensure that your <span style="color: #34353C; font-weight: 600;">privacy settings</span> are set to <span style="color: #34353C; font-weight: 600;">Everyone</span> for
                    your
                    activities to be recorded.</p>
                @endif       
                <div class="next-step-img">
                    <div class="left">
                        <h4>iOS:</h4>
                        <img src="{{ asset('images/next_img_1.png') }}" alt="display_image" width="100%">
                        <img src="{{ asset('images/next_img_2.png') }}" alt="display_image" width="100%">
                    
                    </div>
                    <div class="right">
                        <h4>Android:</h4>
                        <img src="{{ asset('images/next_img_3.png') }}" alt="display_image" width="100%">
                        <img src="{{ asset('images/next_img_4.png') }}" alt="display_image" width="100%">
                    </div>
                </div>
                <button><a href="https://www.togoparts.com/app">Download togoparts app</a></button>
            </div>
        </div>
    </div>
</body>

</html>