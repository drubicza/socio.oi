<?php
$banner = "\033[1;34m_______                       ______
___    |_______ _____ ____  _____  /__
\033[92m__  /| |__  __ \_  _ \_  / / /__  //_/
_  ___ |_  / / //  __// /_/ / _  ,<
\033[1;31m/_/  |_|/_/ /_/ \___/ \__,_/  /_/|_|
              \033[1;34m_________        ______          ______
              __  ____/______ ____  /_ ______ ____  /__
              \033[92m_  /     _  __ `/__  __ \_  __ `/__  //_/
              / /___   / /_/ / _  /_/ // /_/ / _  ,<
              \033[1;31m\____/   \__,_/  /_.___/ \__,_/  /_/|_|

          \033[1;37mSubscribe My Channel : Aneuk Cabak
 ";

function kunci($banner)
{
    $i = 0;

    while (true) {
        system("clear");
        echo $banner;
        echo "\n\n\033[1;32mMasukkan Password : ";
        $passw = trim(fgets(STDIN));

        if ($passw == "izindulu") {
            break;
        } else {
            echo "\033[1;31mPassword Salah.! Silahkan nonton video lagi, Passwordnya ada di dalam video";
            sleep(5);
            $i++;

            if ($i == 3) {
                echo "\n\033[1;0mSilahkan nonton video lagi, Passwordnya ada di dalam video\n";
                sleep(5);
                exit();
            }
        }
    }
}

kunci($banner);
system("clear");
echo $banner;
echo "\n\n\n\033[1;33mTry To Login \033[1;0m";
sleep(1);
echo ".";
sleep(1);
echo ".";

@system("clear");
echo "\033[1;36m________              _____
__  ___/______ __________(_)______
\033[1;36m_____ \ _  __ \_  ___/__  / _  __ \  \033[92m+-++-++-++-++-++-++-+
\033[1;36m____/ / / /_/ // /__  _  /  / /_/ /  \033[92m|N||e||t||w||o||r||k|
\033[1;36m/____/  \____/ \___/  /_/   \____/   \033[92m+-++-++-++-++-++-++-+
\n";

require("config.php");

$claim     = "http://admin.earningbytecoin.ariful.info/api/status/add/view/4F5A9C3D9A86FA54EACEDDD635185/9b811261-7eb2-4198-ab17-3746da763446/";
$url       = "http://admin.earningbytecoin.ariful.info/api/status/by/random/0/4F5A9C3D9A86FA54EACEDDD635185/9b811261-7eb2-4198-ab17-3746da763446/";
$poin      = "http://admin.earningbytecoin.ariful.info/api/earning/by/user/".$user."/".$key."/4F5A9C3D9A86FA54EACEDDD635185/9b811261-7eb2-4198-ab17-3746da763446/";
$headers   = array();
$headers[] = "User-Agent:okhttp/3.3.1";

echo "          \033[1;31mSubscribe \033[1;36mMy Channel \033[1;33m: \033[92mAneuk Cabak\n";
echo "\n\033[1;33mStarting bot..!!\n\n";

while (true) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($ch);
    curl_close($ch);
    $jsn = json_decode($result, true);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $claim);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "id=".$jsn[0]["id"]."&user=".$user."&key=".$key);
    $result = curl_exec($ch);
    curl_close($ch);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $poin);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($ch);
    curl_close($ch);
    $jsn = json_decode($result, true);
    echo "\033[1;36mTotal Earning \033[1;31m: \033[92m".$jsn["values"][0]["value"]."\n";
    sleep(10);
}
?>
