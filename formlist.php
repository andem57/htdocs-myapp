<?php
header('Access-Control-Allow-Origin: *');
define("WNM",  ['Элемент','Объект']);
$prmdpth = (!empty($_POST['depth'])) ? $_POST['depth'] : 1 ;

define("MXLV",  $prmdpth);
$n1 = rand(10,30);
$amlist = [];

function creatmlist($plvl, $pn1) {
  $pamlist = [];
  for ($i=0; $i < $pn1; $i++) {
    $n2 = rand(1,100);
    $wtp = ($n2 % 2 === 0 or (($plvl+1) > MXLV)) ? 0 : 1;
    $pamlist[] = ["name" => WNM[$wtp].'_уровень-'.$plvl.'_N-'.$i,
                 "type" => $wtp,
                 "value" => ($wtp === 1) ? creatmlist(($plvl+1), rand(1,5)) : rand(1,10000)];
  }
  return $pamlist;
}

$amlist = creatmlist(1, $n1);

$arrmlist = [ [ "name" => "розы",
               "type" => 1,
               "value" => [["name" => "лилии",
                 "type" => 0,
                 "value" => 25],
                 [ "name" => "ромашка",
                   "type" => 0,
                   "value" => 7
                 ],
                 [ "name" => "ирис",
                   "type" => 0,
                   "value" => 7
                 ]]
             ],
             [ "name" => "тюльпаны",
               "type" => 0,
               "value" => 25,
             ],
             [ "name" => "орхидеи",
               "type" => 0,
               "value" => 7
             ]
           ];
//echo json_encode($arrmlist);
echo json_encode($amlist);

?>
