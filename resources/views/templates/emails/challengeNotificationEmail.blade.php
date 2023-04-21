<!DOCTYPE htmlPUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<title> {{$mailData['data']['achievement']['title']}} </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td align="center" bgcolor="#efefef">
                    <table width="600" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>

                                                <td height="38" align="right" valign="middle" bgcolor="#FFFFFF">
                                                    <a href="https://play.google.com/store/apps/details?id=com.togoparts" target="_blank" style="text-decoration:none">
                                                        <img src="{{ asset('images/notifications_files/android.jpg')}}" alt="Togoparts Play Store" width="31" height="17" border="0">
                                                    </a>
                                                    <a href="https://twitter.com/togoparts" target="_blank" style="text-decoration:none">
                                                        <img src="{{ asset('images/notifications_files/tw.jpg')}}" alt="twitter" width="31" height="17" border="0">
                                                    </a>
                                                    <a href="https://apps.apple.com/gb/app/togoparts/id1553612140" target="_blank" style="text-decoration:none">
                                                        <img src="{{ asset('images/notifications_files/apple.jpg')}}" alt="Togoparts Apple Store" width="23" height="18" border="0">
                                                    </a>
                                                    <a href="http://www.facebook.com/togoparts" target="_blank" style="text-decoration:none">
                                                        <img src="{{ asset('images/notifications_files/fb.jpg')}}" alt="facebook" width="16" height="17" border="0" style="margin-right:20px;">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top" style="background-color:f7f7f7;">
                                                    <table cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="background-color:f7f7f7;" width="220">
                                                                    <div style="margin:10px 0 10px 20px;">
                                                                        <a href="{{$mailData['challenge_url']}}" target="_blank">

                                                                            <img src="{{url('https://static.togoactive.com/'.$mailData['data']['event']['images']['icon'])}}" border="0" width="216" style="display:block;height:auto;">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td style="background-color:f7f7f7;" width="160">&nbsp;
                                                                </td>
                                                                <td style="background-color:f7f7f7;" width="220">
                                                                    <div style="margin:10px 20px 10px 0;">
                                                                        <a href="{{$mailData['challenge_url']}}" target="_blank">
                                                                            <img src="{{ asset('images/notifications_files/togoparts_logo210x25.png')}}" border="0" width="210" height="25" style="display:blockl;">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top" bgcolor="#FFFFFF">
                                                    <span style="font-family:Arial,Helvetica,sans-serif; color:#000; font-size:16px;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="20">&nbsp;</td>
                                                                    <td>
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="left" valign="top">&nbsp;
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" valign="top">
                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table width="800" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td align="left" valign="top" bgcolor="#FFFFFF">
                                                                                                                        <span style="font-family:Arial,Helvetica,sans-serif; color:#000; font-size:16px;">
                                                                                                                            <table width="500" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;">
                                                                                                                                <tbody>
                                                                                                                                    <tr>
                                                                                                                                        <td>
                                                                                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                                                <tbody>
                                                                                                                                                    <tr>
                                                                                                                                                        <td align="left" valign="top">
                                                                                                                                                            <div style="float:left;width:100%;background-color:#ffffff">
                                                                                                                                                                <div style="float:left;width:100%;text-align:center;margin:0;margin-top:30px;">
                                                                                                                                                                </div>
                                                                                                                                                                <div style="float:none;margin:0 auto; width:85%;">
                                                                                                                                                                    <div style="float:left;width:100%;text-align:center;margin:0px 10px 30px 10px;color:#777777;">
                                                                                                                                                                        Hey
                                                                                                                                                                        {{$mailData['data']['user']['username'] ?? $mailData['data']['user']['fullname']}},
                                                                                                                                                                    </div>
                                                                                                                                                                    <div style="float:left;width:100%;text-align:center;margin-bottom:10px; font-weight: bold; font-size: 22px;">
                                                                                                                                                                        👏
                                                                                                                                                                        🎉
                                                                                                                                                                        Congrats
                                                                                                                                                                        on
                                                                                                                                                                        unlocking
                                                                                                                                                                        the
                                                                                                                                                                        {{$mailData['data']['achievement']['title']}}
                                                                                                                                                                        achievement!
                                                                                                                                                                    </div>
                                                                                                                                                                    <div style="float:left;width:100%;text-align:center;margin-bottom:10px;color:#777777; font-size: 18px;">
                                                                                                                                                                        {{$mailData['data']['achievement']['email_text']}}
                                                                                                                                                                    </div>
                                                                                                                                                                    <div style="float:left;width:100%;text-align:center;margin-top:20px;">
                                                                                                                                                                        <div style="float:left;text-align:center; border-radius: 5px;border: 1px solid #f2f2f2; padding: 32px 32px;margin-bottom: 32px;" class="w-full border-2 border-gray-300 rounded-lg flex flex-col px-10 py-8 mb-4 justify-center items-center" bis_skin_checked="1">
                                                                                                                                                                            <div style="height: 128px;width: 128px;align-items: center; justify-content: center;  padding: 1.25rem;background-color: #F2F2F2; border-radius: 9999px; margin: 0 auto;" bis_skin_checked="1">
                                                                                                                                                                                <img class="achicon" src="{{$mailData['data']['achievement']['icon']}}" alt="" style="height: 128px;">
                                                                                                                                                                            </div>
                                                                                                                                                                            <h2 style="float:left;width:100%;text-align:center;margin:0;font-size: 22px; margin-top: 32px;">
                                                                                                                                                                                <span class="chName">
                                                                                                                                                                                    {{$mailData['data']['event']['slug']}}</span>:
                                                                                                                                                                                <span class="achName">{{$mailData['data']['achievement']['title']}}</span>
                                                                                                                                                                            </h2>
                                                                                                                                                                            <span style="float:left;width:100%;text-align:center;margin:0;     font-size: 18px; margin-top:8px; color: #777777;"><span class="achDesc">
                                                                                                                                                                                    <p><span style="font-family: docs-Poppins; font-size: 13px; white-space: pre-wrap; background-color: #ffffff;">{{$mailData['data']['achievement']['description']}}
                                                                                                                                                                                        </span>
                                                                                                                                                                                    </p>
                                                                                                                                                                                </span></span>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div style="
    text-align: center;
">
                                                                                                                                                                            <p style="float:left;width:100%;text-align:center;margin:0;font-size: 22px; font-weight: bold; margin-bottom: 10px; ">
                                                                                                                                                                                Share
                                                                                                                                                                                Your
                                                                                                                                                                                Achievement!
                                                                                                                                                                            </p>
                                                                                                                                                                            <p style="float:left;width:100%;text-align:center;margin:0;     font-size: 18px; margin-top:8px; color: #777777;margin-bottom:24px;">
                                                                                                                                                                                Flaunt
                                                                                                                                                                                your
                                                                                                                                                                                hard-earned
                                                                                                                                                                                achievement
                                                                                                                                                                                with
                                                                                                                                                                                your
                                                                                                                                                                                friends
                                                                                                                                                                                and
                                                                                                                                                                                family.
                                                                                                                                                                                😃
                                                                                                                                                                            </p>
                                                                                                                                                                            <div style="display:block;justify-content:space-between;width:100%;text-align:center; justify-content: center;align-items: center;">
                                                                                                                                                                                <div style="padding:5px;">
                                                                                                                                                                                    @php
                                                                                                                                                                                    $username
                                                                                                                                                                                    =
                                                                                                                                                                                    (!empty($mailData['data']['user']['username']))
                                                                                                                                                                                    ?
                                                                                                                                                                                    $mailData['data']['user']['username']
                                                                                                                                                                                    :
                                                                                                                                                                                    $mailData['data']['user']['fullname'];
                                                                                                                                                                                    $user_id
                                                                                                                                                                                    =
                                                                                                                                                                                    $mailData['data']['user']['id'];
                                                                                                                                                                                    $achievement_id
                                                                                                                                                                                    =
                                                                                                                                                                                    $mailData['data']['achievement']['id'];
                                                                                                                                                                                    $slug
                                                                                                                                                                                    =
                                                                                                                                                                                    $mailData['data']['event']['slug'];
                                                                                                                                                                                    $refUrl
                                                                                                                                                                                    =
                                                                                                                                                                                    'https://www.togoparts.com/user/profile/'.$user_id.'/'.$username.'/'.$slug.'/list/1/'.$achievement_id;

                                                                                                                                                                                    $fb_url
                                                                                                                                                                                    =
                                                                                                                                                                                    'https://www.facebook.com/sharer/sharer.php?u='.$refUrl;

                                                                                                                                                                                    $whatsapp_url
                                                                                                                                                                                    =
                                                                                                                                                                                    'https://wa.me/?text='.$mailData['data']['achievement']['description'].''.$refUrl;
                                                                                                                                                                                    $twitter_url
                                                                                                                                                                                    =
                                                                                                                                                                                    'https://twitter.com/intent/tweet?url='.$refUrl;
                                                                                                                                                                                    @endphp
                                                                                                                                                                                    <a target="_blank" href="{{$fb_url}}" style="background: #0D88CE;color:#fff;min-width:200px;color:#fff;font-weight:bold;font-size: 18px;height:40px;border-radius:5px;padding:14px 63px;text-decoration:none;">
                                                                                                                                                                                        <img src="{{ asset('images/notifications_files/fb.png')}}" style="margin: -4px 10px;    height: 17px;">
                                                                                                                                                                                        <span class="m-0 ml-2">Share
                                                                                                                                                                                            on
                                                                                                                                                                                            Facebook</span></a>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div style="padding:5px;margin-top:25px;">
                                                                                                                                                                                    <a target="_blank" href="{{$whatsapp_url}}" style="background: #06C281;color:#fff;min-width:200px;color:#fff;font-weight:bold;font-size: 18px;height:40px;border-radius:5px;padding:14px 62px;text-decoration:none;">
                                                                                                                                                                                        <img src="{{ asset('images/notifications_files/whatsapp.png')}} " style="margin: -4px 10px;    height: 17px;">
                                                                                                                                                                                        <span class="m-0 ml-2">Share
                                                                                                                                                                                            on
                                                                                                                                                                                            Whatsapp</span></a>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div style="padding:5px;margin-top:25px;">
                                                                                                                                                                                    <a target="_blank" href="{{$twitter_url}}" style="background: #4BA6EE;color:#fff;min-width:200px;color:#fff;font-weight:bold;font-size: 18px;height:40px;border-radius:5px;padding:14px 72px;text-decoration:none;">
                                                                                                                                                                                        <img src=" {{ asset('images/notifications_files/twitter.png')}}" style="margin: -4px 10px;    height: 17px;">
                                                                                                                                                                                        <span class="m-0 ml-2">Share
                                                                                                                                                                                            on
                                                                                                                                                                                            Twitter</span></a>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            <p style="float:left;width:100%;text-align:center;margin:0;     font-size: 18px; margin-top:50px;font-family: arial; color: #777777;margin-bottom:24px;">
                                                                                                                                                                                Want
                                                                                                                                                                                to
                                                                                                                                                                                see
                                                                                                                                                                                what
                                                                                                                                                                                more
                                                                                                                                                                                you
                                                                                                                                                                                can
                                                                                                                                                                                earn?
                                                                                                                                                                                <a href="{{$mailData['challenge_url']}}" style="text-decoration: none;" target="_blank"><span style="color:#F6861F;">View
                                                                                                                                                                                        all
                                                                                                                                                                                        achievements</span></a>
                                                                                                                                                                            </p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </td>
                                                                                                                                                    </tr>
                                                                                                                                                </tbody>
                                                                                                                                            </table>
                                                                                                                                        </td>
                                                                                                                                        <td width="20">
                                                                                                                                            &nbsp;
                                                                                                                                        </td>
                                                                                                                                    </tr>
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                        </span>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td align="center" valign="top">
                                                                                                                        &nbsp;<a href="https://www.togoparts.com/challenges/cron/2023/forwardbound37/achievements/[[UNSUB_LINK_EN]]" style="text-decoration: underline; color:#ff8a16;">&nbsp;</a>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <div style="min-width: 375px; background-color: #34393D">
                                                                                        </div>
                                                                                        <table style="background-color:  #34393D;width: 100%;color: #fff;  padding: 30px;   text-align: center;">
                                                                                            <tbody>
                                                                                                <tr style="display:inline;">
                                                                                                    <td style="padding: 0px 20px;">
                                                                                                        <div>
                                                                                                            <div>
                                                                                                                <img src="{{ asset('images/notifications_files/sing.png')}}" alt="">
                                                                                                                <p>Singapore
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            <div>
                                                                                                                <div>
                                                                                                                    <a href="https://www.instagram.com/togopartssg/?hl=en" style=" text-decoration: none; color: #bbbbbb;"><img src="{{ asset('images/notifications_files/instanew.png')}}  " alt="" style="height: 13px;">
                                                                                                                        togopartssg</a>
                                                                                                                </div>
                                                                                                                <div style="margin-top: 5px;">
                                                                                                                    <a href="https://www.facebook.com/togoparts/" style=" text-decoration: none; color: #bbbbbb;"><img src="{{ asset('images/notifications_files/fbnew.png')}}  " alt="" style="height: 13px;">
                                                                                                                        togoparts</a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td style="padding: 0px 20px;">
                                                                                                        <div>
                                                                                                            <div>
                                                                                                                <img src="{{ asset('images/notifications_files/malay.png')}}" alt="">
                                                                                                                <p>Malaysia
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            <div>
                                                                                                                <div>
                                                                                                                    <a href="https://www.instagram.com/togopartsmy/?hl=en" style=" text-decoration: none; color: #bbbbbb;"><img src="{{ asset('images/notifications_files/instanew.png')}}" alt="" style="height: 13px;">
                                                                                                                        togopartsmy</a>
                                                                                                                </div>
                                                                                                                <div style="margin-top: 5px;">
                                                                                                                    <a href="https://www.facebook.com/TogopartsMalaysia/" style=" text-decoration: none; color: #bbbbbb;"><img src="{{ asset('images/notifications_files/fbnew.png')}}" alt="" style="height: 13px;">togopartsmalaysia</a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td style="padding: 0px 20px;">
                                                                                                        <div>
                                                                                                            <div>
                                                                                                                <img src="{{ asset('images/notifications_files/indo.png')}} " alt="">
                                                                                                                <p>Indonesia
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            <div>
                                                                                                                <div>
                                                                                                                    <a href="https://www.instagram.com/togopartsidn/?hl=en" style=" text-decoration: none; color: #bbbbbb;"><img src="{{ asset('images/notifications_files/instanew.png')}}" alt="" style="height: 13px;">
                                                                                                                        togopartsidn</a>
                                                                                                                </div>
                                                                                                                <div style="margin-top: 5px;">
                                                                                                                    <a href="https://www.facebook.com/TogopartsIndonesia/" style=" text-decoration: none; color: #bbbbbb;"><img src="{{ asset('images/notifications_files/fbnew.png')}}" alt="" style="height: 13px;">
                                                                                                                        togopartsindonesia</a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td style="padding: 0px 20px;">
                                                                                                        <div>
                                                                                                            <div>
                                                                                                                <img src="{{ asset('images/notifications_files/phil.png')}}" alt="">
                                                                                                                <p>Philippines
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            <div>
                                                                                                                <div>
                                                                                                                    <a href="https://www.instagram.com/togopartsph/" style=" text-decoration: none; color: #bbbbbb;"><img src="{{ asset('images/notifications_files/instanew.png')}}" alt="" style="height: 13px;">
                                                                                                                        togopartsph</a>
                                                                                                                </div>
                                                                                                                <div style="margin-top: 5px;">
                                                                                                                    <a href="https://www.facebook.com/TogopartsPH/" style=" text-decoration: none; color: #bbbbbb;"><img src="{{ asset('images/notifications_files/fbnew.png')}}" alt="" style="height: 13px;">
                                                                                                                        togopartsph</a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td width="20">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top">
                                                    <img src="{{ asset('images/notifications_files/shadow.jpg')}}" width="600" height="33">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="top">&nbsp;<a href="https://www.togoparts.com/challenges/cron/2023/forwardbound37/achievements/[[UNSUB_LINK_EN]]" style="text-decoration: underline; color:#ff8a16;">&nbsp;</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>