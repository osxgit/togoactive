<!DOCTYPE htmlPUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <title> {{ $mailData['data']['eventName'] }} Registration</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
</head>

<body>
    <div style="display:none !important;">
        <p >
            @if (!isset($mailData['data']['upgrade']) || $mailData['data']['upgrade'] == false)
                <?php echo $mailData['data']['successPage']['email_body'] ?>
            @else
                <p>Dear {{$mailData['data']['registrationData']['event_user']['user']['fullname']}},</p>
                <p>Thank You for Upgrading Your #{{$mailData['data']['event_object']['hashtag']}} Rewards!</p>
            @endif
        </p>
    </div>
    <table style="max-width: 700px;width: 100%;margin: auto;">
        <thead>
            <tr>
                <th style="padding: 10px;width: 50%;"></th>
                <th style="padding: 10px;width: 50%;">
                    <ul style="list-style: none;display: flex;justify-content: flex-end;">
                        <li style="border-left: 2px dashed #bbbbbb;padding: 0 8px;height: 30px;">
                            <a href="https://www.linkedin.com/company/togoparts-com/">
                                <img
                                    src="{{ asset('images/linkedin.png')}}"
                                    alt="icon" style="height: 28px;">
                            </a>
                        </li>
                        <li style="border-left: 2px dashed #bbbbbb;padding: 0 8px;height: 30px;">
                            <a href="https://www.instagram.com/togoparts_official/">
                                <img
                                    src="{{ asset('images/instagram.png')}}"
                                    alt="icon" style="height: 28px;">
                            </a>
                        </li>
                        <li style="border-left: 2px dashed #bbbbbb;padding: 0 8px;height: 30px;">
                            <a href="https://play.google.com/store/apps/details?id=com.togoparts&pli=1">
                                <img
                                    src="{{ asset('images/android_header.png')}}"
                                    alt="icon" style="height: 28px;">
                            </a>
                        </li>
                        <li style="border-left: 2px dashed #bbbbbb;padding: 0 8px;height: 30px;">
                            <a href="https://twitter.com/togoparts">
                                <img
                                    src="{{ asset('images/twitter_header.png')}}"
                                    alt="icon" style="height: 28px;">
                            </a>
                        </li>
                        <li style="border-left: 2px dashed #bbbbbb;padding: 0 8px;height: 30px;">
                            <a href="https://apps.apple.com/gb/app/togoparts/id1553612140">
                                <img
                                    src="{{ asset('images/apple_header.png')}}"
                                    alt="icon" style="height: 28px;">
                            </a>
                        </li>
                        <li style="border-left: 2px dashed #bbbbbb;padding: 0 8px;height: 30px;">
                            <a href="https://www.facebook.com/togoparts">
                                <img
                                    src="{{ asset('images/facebook_header.png')}}"
                                    alt="icon" style="height: 28px;">
                            </a>
                        </li>
                    </ul>
                </th>
            </tr>
            <tr>
                <th style="padding: 10px;width: 50%;">
                    @if(isset($mailData['data']['eventImages']['icon']) && $mailData['data']['eventImages']['icon'] !='')
                        <img src="{{url('https://static.togoactive.com/'.$mailData['data']['eventImages']['icon'])}}"
                            width="210" class="CToWUd" data-bit="iit">
                    @endif
                </th>
                <th style="padding: 10px;width: 50%;">
                    @if(isset($mailData['data']['eventImages']['icon']) && $mailData['data']['eventImages']['icon'] !='')
                        <img src="{{ asset('images/logo.png') }}"
                            alt="Togoparts" class="CToWUd" data-bit="iit">
                    @endif
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    {{-- <h2 style="font-family: arial;">{{$mailData['data']['eventName']}} <span style="text-transform: capitalize;">{{$mailData['data']['registrationData']['payment']['payment_type']}}</span></h2> --}}
                    <p style="margin: 10px 0;font-family: arial;font-size: 14px;font-weight: 100;">
                        @if (!isset($mailData['data']['upgrade']) || $mailData['data']['upgrade'] == false)
                            <?php echo $mailData['data']['successPage']['email_body'] ?>
                        @else
                            <p>Dear {{$mailData['data']['registrationData']['event_user']['user']['fullname']}},</p>
                            <p>Thank You for Upgrading Your #{{$mailData['data']['event_object']['hashtag']}} Rewards!</p>
                        @endif
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <table
                        style="width: 100%;max-width: 350px;margin: 10px auto;font-family: arial;text-align: left;font-size: 14px;">
                        <tr>
                            <td>
                                <h2 style="font-family: arial;margin: 0 0 10px; text-transform: capitalize;">{{$mailData['data']['registrationData']['payment']['payment_type']}} Summary</h2>
                                <p
                                    style="margin: 2px 0;font-family: arial;font-size: 14px;font-weight: 200;color: #252424;">
                                    {{\Carbon\Carbon::Parse($mailData['data']['registrationData']['payment']['created_at'])->timezone($mailData['data']['event_object']['timezone'])->isoFormat('LLLL')}} (GMT {{$mailData['data']['event_object']['timezone']}})

                                </p>
                                @if (($mailData['data']['registrationData']['payment']['status'] == 'successful' && isset($mailData['data']['registrationData']['payment']['user_reward']) && 0 != count($mailData['data']['registrationData']['payment']['user_reward']) ))
                                    <p style="margin: 2px 0;font-family: arial;font-size: 14px;font-weight: 200;color: #252424;">
                                        Txn ID: {{$mailData['data']['registrationData']['payment']['transaction_id']}}
                                    </p>
                                @endif
                                <p style="margin: 2px 0;font-family: arial;font-size: 14px;font-weight: 200;color: #252424;">
                                    Payment ID : {{$mailData['data']['registrationData']['payment']['payment_intent']}}
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table
                        style="width: 100%;border: 3px solid #e5e7eb;max-width: 350px;margin: 10px auto;font-family: arial;text-align: left;font-size: 14px;">
                        <tbody>
                            <tr>
                                <th style="padding: 10px;width: 50%;">Name</th>
                                <th style="padding: 10px;width: 50%;">{{$mailData['data']['registrationData']['event_user']['user']['fullname']}}</th>
                            </tr>
                            @if (isset($mailData['data']['registrationData']['event_user']['team_user']['team']) && $mailData['data']['registrationData']['event_user']['team_user']['team'])
                                <tr class="h-16">
                                    <th style="padding: 10px;width: 50%;">Team Name</th>
                                    <th style="padding: 10px;width: 50%;">{{ $mailData['data']['registrationData']['event_user']['team_user']['team']['team_name'] ?? '' }}</th>
                                </tr>
                            @endif

                            @if($mailData['data']['registrationData']['event_user']['group'])
                            <tr>
                                <th>{{$mailData['data']['groupingHeader']}}</th>
                                <th>{{$mailData['data']['registrationData']['event_user']['group']}}</th>
                            </tr>
                            @endif
                            <tr>
                                <th colspan="2" style="width: 100%;border-top: 3px solid #e5e7eb;"></th>
                            </tr>
                            @if (!isset($mailData['data']['upgrade']) || $mailData['data']['upgrade'] == false)
                                <tr>
                                    <th style="padding: 10px;width: 50%;">Participation Fee</th>
                                    <th style="padding: 10px;width: 50%;">Free</th>
                                </tr>
                            @endif
                            @if(isset($mailData['data']['registrationData']['payment']['user_reward']))
                                @foreach($mailData['data']['registrationData']['payment']['user_reward'] as $rewards)
                                    <tr>
                                        <th style="padding: 10px;width: 50%;">{{$rewards['rewards']['name']}} <br>
                                            <span
                                                style="font-style:normal;font-weight:400;font-size:12px;color:#6b7280">
                                                {!! isset($rewards['size']) ? 'Size: ' . $rewards['size'] . ' | ' : '' !!}  {!! isset($rewards['quantity']) ? ' Quantity: ' . $rewards['quantity'] : '' !!}</span>
                                        </th>
                                        <th>
                                            {{$rewards['currency']. ' '. number_format((float)$rewards['amount'],2)}}
                                        </th>
                                    </tr>
                                @endforeach
                            @endif

                            <tr>
                                <th colspan="2" style="width: 100%;border-top: 3px solid #e5e7eb;"></th>
                            </tr>

                            <tr>
                                <th style="padding: 10px;width: 50%;">Coupon Used</th>
                                <th style="padding: 10px;width: 50%;">
                                    {{($mailData['data']['registrationData']['payment']['coupon_code']!='' && isset($mailData['data']['registrationData']['payment']['user_reward']) && 0 != count($mailData['data']['registrationData']['payment']['user_reward']) ) ? $mailData['data']['registrationData']['payment']['coupon_code'] : 'NA'}}</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px;width: 50%;">Discount</th>
                                <th style="padding: 10px;width: 50%;">
                                    {{($mailData['data']['registrationData']['payment']['discount'] > 0 && $mailData['data']['registrationData']['payment']['status'] == 'successful' && isset($mailData['data']['registrationData']['payment']['user_reward']) && 0 != count($mailData['data']['registrationData']['payment']['user_reward']) ) ? $mailData['data']['registrationData']['payment']['currency'] .' '. number_format((float)$mailData['data']['registrationData']['payment']['discount'],2) : 'NA'}}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2" style="width: 100%;border-top: 3px solid #e5e7eb;"></th>
                            </tr>
                            <tr>
                                <th style="padding: 10px;width: 50%;">Total</th>
                                <th style="padding: 10px;width: 50%;">
                                    {{( $mailData['data']['registrationData']['payment']['status'] == 'successful' && isset($mailData['data']['registrationData']['payment']['user_reward']) && 0 != count($mailData['data']['registrationData']['payment']['user_reward']) ) ? $mailData['data']['registrationData']['payment']['currency'] .' '. number_format((float)$mailData['data']['registrationData']['payment']['total_paid'],2) : 'NA'}}
                                </th>
                            </tr>
                            @if (( $mailData['data']['registrationData']['payment']['status'] == 'successful' && isset($mailData['data']['registrationData']['payment']['user_reward']) && 0 != count($mailData['data']['registrationData']['payment']['user_reward'])))
                                <tr>
                                    <th colspan="2" style="width: 100%;border-top: 3px solid #e5e7eb;"></th>
                                </tr>

                                <tr>
                                    <th colspan="2" style="padding: 10px;width: 50%;">
                                        <h5 style="margin: 0 0 10px;">Address :</h5>
                                        <p style="margin: 5px 0">{{$mailData['data']['registrationData']['event_user']['address'] ?? ''."
                                            ".$mailData['data']['registrationData']['event_user']['blk'] ?? ''."
                                            ".$mailData['data']['registrationData']['event_user']['city'] ?? ''."
                                            ".$mailData['data']['registrationData']['event_user']['state'] ?? ''."
                                            ".$mailData['data']['registrationData']['event_user']['subdistrict'] ?? ''."
                                            ".$mailData['data']['registrationData']['event_user']['country'] ?? ''."
                                            ".$mailData['data']['registrationData']['event_user']['postal_code'] ?? '' }}</p>
                                    </th>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">
                    @if( $mailData['data']['registrationData']['payment']['status'] != 'successful' || ( $mailData['data']['registrationData']['event_user']['is_paid_user'] == 0 && ($mailData['data']['upgrade'] == false) )  )
                    <?php echo $mailData['data']['successPage']['no_purchase_made'] ?>
                    @elseif($mailData['data']['canUpgrade'] ==1)
                    <?php echo $mailData['data']['successPage']['partial_purchase_made'] ?>
                    @elseif($mailData['data']['canUpgrade'] ==0)
                    <?php echo $mailData['data']['successPage']['all_purchase_made'] ?>
                    @endif
                    <hr>
                    @if (!isset($mailData['data']['upgrade']) || $mailData['data']['upgrade'] == false)
                        @if ($mailData['data']['successPage']['active_custom_message']==1)
                        <?php echo $mailData['data']['successPage']['custom_message'] ?>
                        <hr>
                        @endif
                        <h3>
                            <?php echo $mailData['data']['successPage']['invite_friend'] ?>
                        </h3>
                        <div>
                            <div style="display: block; width: 100%;">
                                <button
                                    style="background: #58b56d;display: flex;padding: 10px 0;align-items: center;border: navajowhite;justify-content: center;border-radius: 5px;margin: 10px auto;width: 350px;">
                                    <a href="https://api.whatsapp.com/send/?text=<?php echo $mailData['data']['social_desc']; ?><?php echo ' '.$mailData['data']['refUrl']; ?>"
                                        style="color: #fff;display: block;text-align: center;width: 100%;font-size:20px;font-weight: 900;
                                        text-decoration: none;" target="_blank"
                                        data-href="<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>/"
                                        data-action="share/whatsapp/share">
                                        <img style="margin-right: 5px;width: 22px;height: 22px;margin-bottom: -4px;" src="{{ asset('images/whatsapp_icon.png')}}"
                                            alt="icon" class="CToWUd" data-bit="iit" />
                                        <span style="bottom: 3px !important; position: relative;">Invite via Whatsapp</span>
                                    </a>
                                </button>
                            </div>
                            <div style="display: block; width: 100%;">
                                <button
                                    style="background: #3e84db;display: flex;padding: 10px 0;align-items: center;border: navajowhite;justify-content: center;border-radius: 5px;margin: 10px auto;width: 350px;">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $mailData['data']['refUrl']; ?>"
                                        style="color: #fff;display: block;text-align: center;width: 100%;font-size:20px;font-weight: 900;
                                        text-decoration: none;" target="_blank"
                                        data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/sharer/sharer.php?u%3Dhttps://events.togoparts.com/togoeco2023&amp;source=gmail&amp;ust=1680080306199000&amp;usg=AOvVaw0CjWD3k1AinGmIO0vSkfZF">
                                        <img style="margin-right: 5px;width: 22px;height: 22px;margin-bottom: -4px;" src="{{ asset('images/facebook_icon.png')}}"
                                            alt="icon" class="CToWUd" data-bit="iit" />
                                        <span style="bottom: 3px !important; position: relative;">Invite via Facebook</span>
                                    </a>
                                </button>
                            </div>
                            <div style="display: block; width: 100%;">
                                <button
                                    style="background: #4ba6ee;display: flex;padding: 10px 0;align-items: center;border: navajowhite;justify-content: center;border-radius: 5px;margin: 10px auto;width: 350px;">
                                    <a href="https://twitter.com/intent/tweet?text=<?php echo $mailData['data']['social_desc']; ?>&url=<?php echo $mailData['data']['refUrl']; ?>"
                                        style="color: #fff;display: block;text-align: center;width: 100%;font-size:20px; font-weight: 900;
                                        text-decoration: none;" target="_blank"
                                        data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/intent/tweet?text%3D%26url%3Dhttps://events.togoparts.com/togoeco2023&amp;source=gmail&amp;ust=1680080306200000&amp;usg=AOvVaw1pIDIfuLsX44rwWCCmKk2U">
                                        <img style="margin-right: 5px;width: 22px;height: 22px;margin-bottom: -4px;" src="{{ asset('images/twitter_icon.png')}}"
                                            alt="icon" class="CToWUd" data-bit="iit" />
                                        <span style="bottom: 3px !important; position: relative;">Invite via Twitter</span>
                                    </a>
                                </button>
                            </div>
                            <div style="display: block; width: 100%;">
                                <button
                                    style="background: #0077b5;display: flex;padding: 10px 0;align-items: center;border: navajowhite;justify-content: center;border-radius: 5px;margin: 10px auto;width: 350px;">
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $mailData['data']['refUrl']; ?>"
                                        style="color: #fff;display: block;text-align: center;width: 100%;font-size:20px; font-weight: 900;
                                        text-decoration: none;" target="_blank"
                                        data-saferedirecturl="https://www.google.com/url?q=https://www.linkedin.com/sharing/share-offsite/?url%3Dhttps://events.togoparts.com/togoeco2023&amp;source=gmail&amp;ust=1680080306200000&amp;usg=AOvVaw2ppQeb_eOBVZjgJ0XDDzek">
                                        <img style="margin-right: 5px;width: 22px;height: 22px;margin-bottom: -4px;" src="{{ asset('images/linkdin_icon.png')}}"
                                            alt="icon" class="CToWUd" data-bit="iit" />
                                        <span style="bottom: 3px !important; position: relative;">Invite via LinkedIn </span>
                                    </a>
                                </button>
                            </div>
                            <div style="display: block; width: 100%;">
                                <button
                                    style="background: #0088cc;display: flex;padding: 10px 0;align-items: center;border: navajowhite;justify-content: center;border-radius: 5px;margin: 10px auto;width: 350px;">
                                    <a href="https://telegram.me/share/url?url=<?php echo $mailData['data']['refUrl']   ; ?>&text=<?php echo $mailData['data']['social_desc']; ?>"
                                        style="color: #fff;display: block;text-align: center;width: 100%;font-size:20px; font-weight: 900;
                                        text-decoration: none;" target="_blank"
                                        data-href="<?php echo env("APP_URL").'/'.$mailData['data']['event_slug'] ?>"
                                        data-share="telegram">
                                        <img style="margin-right: 5px;width: 22px;height: 22px;margin-bottom: -4px;" src="{{ asset('images/telegram_icon.png')}}"
                                            alt="icon" class="CToWUd" data-bit="iit" />
                                        <span style="bottom: 3px !important; position: relative;">Invite via Telegram</span>
                                    </a>
                                </button>
                            </div>
                            <p style="margin-bottom: 6px;">Alternatively, you can also share the referral code with your
                                friends.</p>
                            <h3 style="color: #6E6E6E; font-weight: 400; padding: 0;">Referral Code: <span
                                    style="font-weight: 600; color: #0D88CE;">{{$mailData['data']['registrationData']['event_user']['user']['username']}}</span></h3>
                        </div>
                    @endif

                </th>
            </tr>
            @if (!isset($mailData['data']['upgrade']) || $mailData['data']['upgrade'] == false)
                <tr>
                    <th colspan="2">
                        @if($mailData['data']['registrationData']['event_user']['user']['strava_id'] ==0 || $mailData['data']['registrationData']['event_user']['user']['strava_id'] =="")
                        <table>
                            <tr>
                                <td>
                                    <h3 style="color:#F6861F;font-size: 18pt;">Next Steps</h3>
                                    <ul style="list-style:none;font-weight:400;font-size: 14pt;
                                    padding: 0;">
                                        <li style="margin:10px 0 !important">1. First, download the <span style="font-weight:700;">TOGOPARTS</span> app on your mobile phone </li>
                                        <li style="margin:10px 0 !important">2. Once you have downloaded the app, open it and click on the <span style="font-weight:700;">"RECORD"</span> button to
                                            start
                                            recording your live activities. </li>
                                        <li style="margin:10px 0 !important">3. The app will then take you to the Strava app, which is used to record your rides. Please
                                            ensure
                                            that
                                            your privacy settings on Strava are set to <span style="font-weight:700;">"EVERYONE"</span> so that your rides can be
                                            recorded.
                                        </li>
                                        <li style="margin:10px 0 !important">4. Once you have verified and adjusted your Strava privacy settings as needed, you can begin
                                            your
                                            ride.
                                        </li>
                                        <li style="margin:10px 0 !important">5. Make sure to start your ride during
                                           <strong>
                                            (from {{\Carbon\Carbon::Parse($mailData['data']['event_object']['dates']['leaderboard_start_date'] )->isoFormat('LLL')}} hrs to
                         {{\Carbon\Carbon::Parse( $mailData['data']['event_object']['dates']['leaderboard_end_date'] )->isoFormat('LLL')}} hrs)
                                        </strong>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3 style="color:#F6861F;font-size: 18pt;">Connect to STRAVA</h3>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight:400;font-size: 14pt;">
                                    If you have not authorised togoparts to connect to yur strava account or
                            if you are unsure if you have done so already,
                            <a href="https://www.togoparts.com/strava-connect"><span style="color: #0D88CE; font-weight: 600;">CONNECT WITH STRAVA</span><a> now
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3 style="color:#F6861F;font-size: 18pt;">Set STRAVA permissions</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="font-weight:400;font-size: 14pt;">If you have connected with strava after registration with all the boxes ticked, you are good to go.
                                        Otherwise, double-check to ensure that your <span style="color: #34353C; font-weight: 700;">privacy settings</span> are set to <span style="color: #34353C; font-weight: 700;">Everyone</span> for
                                        your
                                        activities to be recorded.</p>
                                </td>
                            </tr>
                        </table>
                        @endif
                        <table style="width: 100%;max-width: 600px;margin: 20px auto;">
                            <thead>
                                <tr>
                                    <th>iOS:</th>
                                    <th>Android:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th><img src="{{ asset('images/next_img_1.png') }}"
                                            alt="display_image" width="100%" style="width: 200px;" data-bit="iit"
                                            tabindex="0"></th>
                                    <th><img src="{{ asset('images/next_img_3.png') }}"
                                            alt="display_image" width="100%" style="width: 200px;" data-bit="iit"
                                            tabindex="0"></th>
                                </tr>
                                <tr>
                                    <th><img src="{{ asset('images/next_img_2.png') }}"
                                            alt="display_image" width="100%" style="width: 200px;" data-bit="iit"
                                            tabindex="0"></th>
                                    <th><img src="{{ asset('images/next_img_4.png') }}"
                                            alt="display_image" width="100%" style="width: 200px;" data-bit="iit"
                                            tabindex="0"></th>
                                </tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                    <a style="font-family: arial;background: #F6861F;color: #fff;text-decoration: none;font-weight: 500;padding: 10px 25px;border-radius: 5px;margin: 20px auto 0;display: block;width: fit-content;font-size: 15px;" href="https://www.togoparts.com/app">Download Togoparts App</a>
                    </th>
                </tr>
            @endif
        </tfoot>
    </table>
</body>

</html>
