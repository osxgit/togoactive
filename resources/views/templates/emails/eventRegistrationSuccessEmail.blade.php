<!DOCTYPE htmlPUBLIC “-//W3C//DTD XHTML 1.0 Transitional//EN” “http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd”>
<html xmlns=“http://www.w3.org/1999/xhtml” lang=“en”>

<head>
    <title> {{ $mailData['data']['eventName'] }} Registration</title>
    <meta http-equiv=“Content-Type” content=“text/html; charset=utf-8">
    <meta http-equiv=“X-UA-Compatible” content=“IE=edge”>
    <meta name=“viewport” content=“width=device-width, initial-scale=1.0">
    <meta name=“color-scheme” content=“light dark”>
    <meta name=“supported-color-schemes” content=“light dark”>

</head>

<body>

    <table style="max-width: 700px;width: 100%;margin: auto;">
        <thead>
            <tr>
                <th style="padding: 10px;width: 50%;"></th>
                <th style="padding: 10px;width: 50%;">
                    <ul style="list-style: none;display: flex;justify-content: flex-end;">
                        <li style="border-left: 2px dashed #bbbbbb;padding: 0 8px;height: 30px;"><a><img
                                    src="{{ asset('images/android_header.png')}}"
                                    alt="icon" style="height: 28px;"></a></li>
                        <li style="border-left: 2px dashed #bbbbbb;padding: 0 8px;height: 30px;"><a><img
                                    src="{{ asset('images/twitter_header.png')}}"
                                    alt="icon" style="height: 28px;"></a></li>
                        <li style="border-left: 2px dashed #bbbbbb;padding: 0 8px;height: 30px;"><a><img
                                    src="{{ asset('images/apple_header.png')}}"
                                    alt="icon" style="height: 28px;"></a></li>
                        <li style="border-left: 2px dashed #bbbbbb;padding: 0 8px;height: 30px;"><a><img
                                    src="{{ asset('images/facebook_header.png')}}"
                                    alt="icon" style="height: 28px;"></a></li>
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
                    <h2 style="font-family: arial;">{{$mailData['data']['eventName']}} Upgrade</h2>
                    <p style="margin: 10px 0;font-family: arial;font-size: 14px;font-weight: 100;">
                        {!! $mailData['data']['successPage']['email_body'] !!}
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <table
                        style="width: 100%;max-width: 450px;margin: 10px auto;font-family: arial;text-align: left;font-size: 14px;">
                        <tr>
                            <td>
                                <h2 style="font-family: arial;margin: 0 0 10px;">Registration Summary</h2>
                                <p
                                    style="margin: 2px 0;font-family: arial;font-size: 14px;font-weight: 100;color: #777777;">
                                    {{$mailData['data']['registrationData']['payment']['created_at']}}
                                </p>
                                @if($mailData['data']['registrationData']['event_user']['is_paid_user'] ==1)
                                    <p style="margin: 2px 0;font-family: arial;font-size: 14px;font-weight: 100;color: #777777;">
                                        Txn ID: {{$mailData['data']['registrationData']['payment']['transaction_id']}}
                                    </p>
                                    <p style="margin: 2px 0;font-family: arial;font-size: 14px;font-weight: 100;color: #777777;">
                                        Payment ID : {{$mailData['data']['registrationData']['payment']['payment_intent']}}
                                    </p>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table
                        style="width: 100%;border: 3px solid #e5e7eb;max-width: 450px;margin: 10px auto;font-family: arial;text-align: left;font-size: 14px;">
                        <tbody>
                            <tr>
                                <th style="padding: 10px;width: 50%;">Name</th>
                                <th style="padding: 10px;width: 50%;">{{$mailData['data']['registrationData']['event_user']['user']['fullname']}}</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px;width: 50%;">Phone Number</th>
                                <th style="padding: 10px;width: 50%;">phone</th>
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
                            <tr>
                                <th colspan="2" style="width: 100%;border-top: 3px solid #e5e7eb;"></th>
                            </tr>
                            <tr>
                                <th style="padding: 10px;width: 50%;">Participation Fee</th>
                                <th style="padding: 10px;width: 50%;">Free</th>
                            </tr>
                            @if($mailData['data']['registrationData']['event_user']['is_paid_user'] ==1)
                                @foreach($mailData['data']['registrationData']['payment']['user_reward'] as $rewards)
                                    <tr>
                                        <th colspan="2" style="padding: 10px;width: 50%;">{{$rewards['rewards']['name']}} <br>
                                            <span
                                                style="font-family:'Poppins';font-style:normal;font-weight:400;font-size:10px;color:#6b7280">
                                                {!! isset($rewards['rewards']['size']) ? 'Size: ' . $rewards['rewards']['size'] . ' | ' : '' !!}  {!! isset($rewards['rewards']['quantity']) ? ' Quantity: ' . $rewards['rewards']['quantity'] : '' !!}</span>
                                        </th>
                                        <th>
                                            {{$rewards['rewards']['currency']. ' '. number_format((float)$rewards['rewards']['amount'],2)}}
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
                                    {{($mailData['data']['registrationData']['payment']['coupon_code']!='') ? $mailData['data']['registrationData']['payment']['coupon_code'] : 'NA'}}</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px;width: 50%;">Discount</th>
                                <th style="padding: 10px;width: 50%;">{{($mailData['data']['registrationData']['payment']['discount'] > 0) ? number_format((float)$mailData['data']['registrationData']['payment']['discount'],2) : 'NA'}}</th>
                            </tr>
                            <tr>
                                <th colspan="2" style="width: 100%;border-top: 3px solid #e5e7eb;"></th>
                            </tr>
                            <tr>
                                <th style="padding: 10px;width: 50%;">Total</th>
                                <th style="padding: 10px;width: 50%;">{{($mailData['data']['registrationData']['payment']['total_amount'] > 0) ? number_format((float)$mailData['data']['registrationData']['payment']['total_amount'],2) : 'NA'}} </th>
                            </tr>
                            <tr>
                                <th colspan="2" style="width: 100%;border-top: 3px solid #e5e7eb;"></th>
                            </tr>
                            @if($mailData['data']['registrationData']['event_user']['is_paid_user'] ==1)
                            <tr>
                                <th colspan="2" style="padding: 10px;width: 50%;">
                                    <h5 style="margin: 0 0 10px;">Address :</h5>
                                    <p style="margin: 5px 0">{{$mailData['data']['registrationData']['event_user']['address']."
                                        ".$mailData['data']['registrationData']['event_user']['blk']."
                                        ".$mailData['data']['registrationData']['event_user']['city']."
                                        ".$mailData['data']['registrationData']['event_user']['state']."
                                        ".$mailData['data']['registrationData']['event_user']['subdistrict']."
                                        ".$mailData['data']['registrationData']['event_user']['postal_code']."
                                        ".$mailData['data']['registrationData']['event_user']['country'] }}</p>
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
                    <h3>Invite your friends to join the event <br> and earn achievement and discounts!</h3>
                    <div>
                        <div style="display: block; width: 100%;">
                            <button
                                style="background: #58b56d;display: flex;padding: 10px 0;align-items: center;border: navajowhite;justify-content: center;border-radius: 5px;margin: 10px auto;width: 270px;">
                                <a href="//api.whatsapp.com/send?text=<?php echo '' ?><?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>"
                                    style="color: #fff;display: flex;align-items: center;gap: 5px;" target="_blank"
                                    data-href="<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>"
                                    data-action="share/whatsapp/share">
                                    <img src="{{ asset('images/whatsapp_icon.png')}}"
                                        alt="icon" class="CToWUd" data-bit="iit" />
                                    Invite via Whatsapp
                                </a>
                            </button>
                        </div>
                        <div style="display: block; width: 100%;">
                            <button
                                style="background: #3e84db;display: flex;padding: 10px 0;align-items: center;border: navajowhite;justify-content: center;border-radius: 5px;margin: 10px auto;width: 270px;">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?> "
                                    style="color: #fff;display: flex;align-items: center;gap: 5px;" target="_blank"
                                    data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/sharer/sharer.php?u%3Dhttps://events.togoparts.com/togoeco2023&amp;source=gmail&amp;ust=1680080306199000&amp;usg=AOvVaw0CjWD3k1AinGmIO0vSkfZF">
                                    <img src="{{ asset('images/facebook_icon.png')}}"
                                        alt="icon" class="CToWUd" data-bit="iit" />
                                    Invite via Facebook
                                </a>
                            </button>
                        </div>
                        <div style="display: block; width: 100%;">
                            <button
                                style="background: #4ba6ee;display: flex;padding: 10px 0;align-items: center;border: navajowhite;justify-content: center;border-radius: 5px;margin: 10px auto;width: 270px;">
                                <a href="https://twitter.com/intent/tweet?text=<?php echo '' ?>&url=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>"
                                    style="color: #fff;display: flex;align-items: center;gap: 5px;" target="_blank"
                                    data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/intent/tweet?text%3D%26url%3Dhttps://events.togoparts.com/togoeco2023&amp;source=gmail&amp;ust=1680080306200000&amp;usg=AOvVaw1pIDIfuLsX44rwWCCmKk2U">
                                    <img src="{{ asset('images/twitter_icon.png')}}"
                                        alt="icon" class="CToWUd" data-bit="iit" />
                                    Invite via Twitter
                                </a>
                            </button>
                        </div>
                        <div style="display: block; width: 100%;">
                            <button
                                style="background: #0077b5;display: flex;padding: 10px 0;align-items: center;border: navajowhite;justify-content: center;border-radius: 5px;margin: 10px auto;width: 270px;">
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>"
                                    style="color: #fff;display: flex;align-items: center;gap: 5px;" target="_blank"
                                    data-saferedirecturl="https://www.google.com/url?q=https://www.linkedin.com/sharing/share-offsite/?url%3Dhttps://events.togoparts.com/togoeco2023&amp;source=gmail&amp;ust=1680080306200000&amp;usg=AOvVaw2ppQeb_eOBVZjgJ0XDDzek">
                                    <img src="{{ asset('images/linkdin_icon.png')}}"
                                        alt="icon" class="CToWUd" data-bit="iit" />
                                    Invite via LinkedIn
                                </a>
                            </button>
                        </div>
                        <div style="display: block; width: 100%;">
                            <button
                                style="background: #0088cc;display: flex;padding: 10px 0;align-items: center;border: navajowhite;justify-content: center;border-radius: 5px;margin: 10px auto;width: 270px;">
                                <a href="https://telegram.me/share/url?url=<?php echo $mailData['data']['event_base_url'].$mailData['data']['event_slug'] ?>&text=<?php '' ?>"
                                    style="color: #fff;display: flex;align-items: center;gap: 5px;" target="_blank"
                                    data-href="<?php echo env("APP_URL").'/'.$mailData['data']['event_slug'] ?>"
                                    data-share="telegram">
                                    <img src="{{ asset('images/telegram_icon.png')}}"
                                        alt="icon" class="CToWUd" data-bit="iit" />
                                    Invite via Telegram
                                </a>
                            </button>
                        </div>
                        <p style="margin-bottom: 6px;">Alternatively, you can also share the referral code with your
                            friends.</p>
                        <h3 style="color: #6E6E6E; font-weight: 400; padding: 0;">Referral Code: <span
                                style="font-weight: 600; color: #0D88CE;">{{$mailData['data']['registrationData']['event_user']['user']['username']}}</span></h3>
                    </div>
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    @if($mailData['data']['registrationData']['event_user']['user']['strava_id'] ==0 || $mailData['data']['registrationData']['event_user']['user']['strava_id'] =="")
                    <table>
                        <tr>
                            <td>
                                <h3 style="padding-top: 20px;">Connect to STRAVA</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                If you have not authorised togoparts to connect to yur strava account or
                        if you are unsure if you have done so already,
                        <span style="color: #0D88CE; font-weight: 600;">CONNECT WITH STRAVA</span>now
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 style="padding-top: 20px;">Set STRAVA permissions</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>If you have connected with strava after registration with all the boxes ticked, you are good to go.
                                    Otherwise, double-check to ensure that your <span style="color: #34353C; font-weight: 600;">privacy settings</span> are set to <span style="color: #34353C; font-weight: 600;">Everyone</span> for
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
                <th>
                    <button><a href="https://www.togoparts.com/app">Download togoparts app</a></button>
                </th>
            </tr>
        </tfoot>
    </table>
</body>

</html>
