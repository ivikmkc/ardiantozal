<?php
// Powered X-Rere Script
// Supported I-WRAH Tools
// Punya MasbimCH

echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", SCTV'."\n";
echo jembuwt('https://app-etslive-2.vidio.com/live/' ,'204')."\n";

echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", INDOSIAR'."\n";
echo jembuwt('https://app-etslive-2.vidio.com/live/' ,'205')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", O-Chanel'."\n";
// echo jembuwt('https://app-etslive-2.vidio.com/live/' ,'206')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", Kompas TV'."\n";
// echo jembuwt('https://app-etslive-2.vidio.com/live/' ,'874')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", TV One'."\n";
// echo jembuwt('https://kmklive-lh.akamaihd.net/i/tvone_ta_regular@577566/' ,'783')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", Berita Satu'."\n";
// echo jembuwt('https://kmklive-lh.akamaihd.net/i/beritasatu_ta_regular@94480/' ,'6165')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", Metro TV'."\n";
// echo jembuwt('https://app-etslive-2.vidio.com/live/' ,'777')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", ANTV'."\n";
// echo jembuwt('https://app-etslive-2.vidio.com/live/' ,'782')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", Trans TV'."\n";
// echo jembuwt('https://app-etslive-2.vidio.com/live/' ,'733')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", RCTI'."\n";
// echo jembuwt('https://app-etslive-2.vidio.com/live/' ,'665')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", Trans7'."\n";
// echo jembuwt('https://app-etslive-2.vidio.com/live/' ,'734')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", MNCTV'."\n";
// echo jembuwt('https://app-etslive-2.vidio.com/live/' ,'870')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", JAK TV'."\n";
// echo jembuwt('https://kmklive-lh.akamaihd.net/i/jaktv_ta_regular@94476/' ,'5415')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", GTV'."\n";
// echo jembuwt('https://app-etslive-2.vidio.com/live/' ,'778')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", NET TV'."\n";
// echo jembuwt('https://app-etslive-2.vidio.com/live/','875')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", RTV'."\n";
// echo jembuwt('https://kmklive-lh.akamaihd.net/i/rtv_ta_geo@137568/' ,'1561')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", I-News'."\n";
// echo jembuwt('https://kmklive-lh.akamaihd.net/i/inews_ta_regular@94479/' ,'5409')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", O SHop'."\n";
// echo jembuwt('https://kmklive-lh.akamaihd.net/i/oshop_ta_regular@586951/' ,'6166')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", TVRI'."\n";
// echo jembuwt('https://kmklive-lh.akamaihd.net/i/tvri_ta_regular@94480/' ,'6441')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", MYTV'."\n";
// echo jembuwt('https://app-etslive-2.vidio.com/live/' ,'734')."\n";

// echo '#EXTINF:-1 tvg-logo="" group-title="LOKAL", DAAI TV'."\n";
// echo jembuwt('https://kmklive-lh.akamaihd.net/i/daaitv_ta_regular@198086/' ,'6482')."\n";


function jembuwt($url, $aw){
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://www.vidio.com/live/'.$aw.'/tokens');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

	$headers = array();
	$headers[] = 'Authority: www.vidio.com';
	$headers[] = 'Content-Length: 0';
	$headers[] = 'Origin: https://www.vidio.com';
	$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36';
	$headers[] = 'Dnt: 1';
	$headers[] = 'Accept: */*';
	$headers[] = 'Sec-Fetch-Site: same-origin';
	$headers[] = 'Sec-Fetch-Mode: cors';
	$headers[] = 'Referer: https://www.vidio.com/live/205-live-streaming-indosiar-tv-online-indonesia-vidio-com';
	$headers[] = 'Accept-Encoding: gzip, deflate, br';
	$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}

	$result = json_decode($result, true);
	$token = $result['token'];
	curl_close($ch);
	
	if (preg_match("/@/", $url)) {
		$urlreq = $url.'/master.m3u8?'.$token;
	}else{
		$urlreq = $url.$aw.'/master.m3u8?'.$token;
	}
	// echo $urlreq;
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $urlreq);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

	curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

	$headers = array();
	$headers[] = 'Authority: app-etslive-2.vidio.com';
	$headers[] = 'Origin: https://www.vidio.com';
	$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36';
	$headers[] = 'Dnt: 1';
	$headers[] = 'Accept: */*';
	$headers[] = 'Sec-Fetch-Site: same-site';
	$headers[] = 'Sec-Fetch-Mode: cors';
	$headers[] = 'Referer: https://www.vidio.com/';
	$headers[] = 'Accept-Encoding: gzip, deflate, br';
	$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
	    echo 'Error:' . curl_error($ch);
	}
	$result = preg_replace('/#(.*?)\n/', '', $result);
	// $result = explode("\n", );
	$result = preg_replace('/#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=(.*?)RESOLUTION(.*?)\n/', '', $result);
	$tot = count(explode("\n", $result));
	if ($tot <= 1) {
		echo 'https://cdn-production-thumbor-vidio.akamaized.net/iCK1LEwF_Id8Zemlc84HDAzkywU=/830x460/filters:quality(80)/vidio-web-prod-livestreaming/uploads/livestreaming/blocking_banner_image/783/49b007.jpg';
	}else{
		$dat = explode("\n", $result);
		// echo $dat[0];
		preg_match_all('/(.*?)_720(.*?)\n/', $result, $match);
		// preg_match_all('/(.*?)_480(.*?)\n/', $result, $match);
		if (count($match[0])<=1) {
			preg_match_all('/(.*?)_480(.*?)\n/', $result, $match);
				if (count($match[0])<=1) {
				preg_match_all('/(.*?)_360(.*?)\n/', $result, $match);
			}
		}
		// var_dump($match[0]); //ini buat manggil result cuman resolusi 720

		if (count($match[0])>1) {
			echo $match[0][1]; //Low Bandwith Select
		}else{
			echo $match[0][0];
		}

		// var_dump(explode("\n", $result)); // Ini buat liat semua resolusi
		// echo $result[5]; // ini buat manggil result index ke 5 /hls-b/ ingest_205_720p
	}

	curl_close($ch);

	
}

