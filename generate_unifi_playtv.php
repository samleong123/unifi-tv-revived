<?php
/**
Script by @samleong123.
Special thanks to @weareblahs.
Revived unifiPlayTV!
 **/
$userid = "YOUR_USER_NAME"; /**Put ur registered phone number with unifiPlayTV start with 0**/
$password = "YOUR_PASSWORD";/**Put ur unifiPlayTV password**/
$physicaldeviceid = "YOUR_PHYSICAL_DEVICE_ID";/** Retrieve physicalDeviceID from F12 Network when login to playtv.unifi.com.my**/

$url = "https://playtv.unifi.com.my:7049/VSP/V3/Authenticate";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"authenticateBasic":{"userID":"'.$userid.'","userType":"1","timeZone":"Asia/Brunei","isSupportWebpImgFormat":"0","clientPasswd":"'.$password.'","lang":"en"},"authenticateDevice":{"physicalDeviceID":"'.$physicaldeviceid.'","terminalID":"'.$physicaldeviceid.'","deviceModel":"PC Web TV"},"authenticateTolerant":{"areaCode":"1200","templateName":"default","bossID":"","userGroup":"-1"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$vuid = $result["VUID"];
$csession = $result["cSessionId"];
$userid = $result["profileID"];
$jsession = $result["jSessionID"];
$replaceDevice = $result["result"]["retCode"];
   
if (empty($vuid)) {echo "Uh-oh. Seems like your username / password is wrong. Please try again"; } else {
    
    
$url = "https://playtv.unifi.com.my:7049/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000009","mediaID":"44534208","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$tv1 = $result["playURL"];
echo '#EXTM3U x-tvg-url="https://weareblahs.github.io/epg/unifitv.xml" url-tvg="https://weareblahs.github.io/epg/unifitv.xml" refresh="1440" max-conn="1" refresh="24"';
echo '

#EXTM3U
#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="101" tvg-id="101" tvg-chno="101" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190708/20190708071026467w2e.png",TV1
'.$tv1;

$url = "https://playtv.unifi.com.my:7049/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000036","mediaID":"44534218","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$tv2 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="102" tvg-id="102" tvg-chno="102" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190708/20190708070724242ygr.png",TV2
'.$tv2;

$url = "https://playtv.unifi.com.my:7049/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000011","mediaID":"43361030","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$tv3 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="103" tvg-id="103" tvg-chno="103" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/202007/20200701/202007010436159112u3.png",TV3
'.$tv3;

$url = "https://playtv.unifi.com.my:7049/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000031","mediaID":"38477328","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$didiktv = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="107" tvg-id="107" tvg-chno="107" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/202102/20210223/20210223181442797931.png",DidikTV KPM
'.$didiktv;

$url = "https://playtv.unifi.com.my:7049/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000017","mediaID":"38477341","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$tv8 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Chinese Variety" ch-number="108" tvg-id="108" tvg-chno="108" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190708/20190708074041526yld.png",8TV
'.$tv8;
$url = "https://playtv.unifi.com.my:7049/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000020","mediaID":"38477354","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$tv9 = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="109" tvg-id="109" tvg-chno="109" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/2019071607262664255l.png",TV9
'.$tv9;
$url = "https://playtv.unifi.com.my:7049/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000070","mediaID":"38675356","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$salam = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="113" tvg-id="113" tvg-chno="113" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/20190716062504007e6f.png",Salam HD
'.$salam;

$url = "https://playtv.unifi.com.my:7049/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000014","mediaID":"38609447","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$AlHijrah = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Malaysian Variety" ch-number="114" tvg-id="114" tvg-chno="114" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/20190716072749378meg.png",TV Alhijrah
'.$AlHijrah;
   
$url = "https://playtv.unifi.com.my:7049/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000066","mediaID":"38703123","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$nhk = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="News" ch-number="643" tvg-id="643" tvg-chno="643" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190716/201907160704507932rh.png",NHK WORLD-JAPAN
'.$nhk;

$url = "https://playtv.unifi.com.my:7049/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000016","mediaID":"38654032","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$cna = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="News" ch-number="611" tvg-id="611" tvg-chno="611" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190708/201907080719495046uu.png",Channel NewsAsia
'.$cna;
   
   $url = "https://playtv.unifi.com.my:7049/VSP/V3/PlayChannel";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Cookie: JSESSIONID=$jsession; CSESSIONID=$csession; USER_ID=$userid;"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"channelID":"20000086","mediaID":"38729671","businessType":"BTV","isReturnProduct":"1","isHTTPS":"1","checkLock":{"checkType":"0"}}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true);
$luxe = $result["playURL"];
echo '

#KODIPROP:inputstream.adaptive.license_type=com.widevine.alpha
#KODIPROP:inputstream.adaptive.license_key=https://ottweb.hypp.tv:8064?deviceId='.$vuid
.'
#EXTINF:-1 group-title="Lifestyle & Knowledge" ch-number="529" tvg-id="529" tvg-chno="529" tvg-logo="https://playtv.unifi.com.my:7041/CPS/images/universal/film/logo/201907/20190708/20190708075136521klp.png",Luxe.TV HD
'.$luxe;
}

?>
