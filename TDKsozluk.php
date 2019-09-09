<?php
function TDKSozluk($kelime){
	$ch = curl_init("https://sozluk.gov.tr/gts?ara=$kelime");
	curl_setopt_array($ch, [
		CURLOPT_RETURNTRANSFER => True,
		CURLOPT_SSL_VERIFYPEER => False
	]);
	$sonuc = curl_exec($ch);
	curl_close($ch);
	$sonuc = json_decode($sonuc,True);
	return [
		"madde" => $sonuc[0]["madde"],
		"tip" => $sonuc[0]["anlamlarListe"][0]["ozelliklerListe"][0]["tam_adi"],
		"anlam" => $sonuc[0]["anlamlarListe"][0]["anlam"],
		"benzer" => $sonuc[0]["birlesikler"]
	];
}
?>
