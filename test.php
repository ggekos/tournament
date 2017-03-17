<?php
for ($i=0; $i < 1001; $i++) { 
	$players['player'.$i] = rand(0,27);
}
$totalmatch = round((count($players)/2));
$match = [];

print 'Il y a '.count($players)." joueurs \r\n" ;
print 'Ronde avec '.$totalmatch.' matchs'." \r\n" ;

asort($players);

if(count($players)%2 == 1){
	//test si le gars a pas deja eu un bye
	$match[] = [key($players),'johny'];
}
$opponents = array_reverse($players);
foreach (array_reverse($players) as $player => $point) {
	if(alreadyInMatch($player, $match)){
		continue;
	}
	$matchnotok = true;
	$i=0;
	reset($opponents);
	while ($matchnotok != false) {
		if(key($opponents)!= $player && !alreadyInMatch(key($opponents), $match)){
			$match[]=[$player, key($opponents)];
			$matchnotok = false ;
		}
		next($opponents);
		$i++;
	}
}

foreach ($match as $key => $mat) {
	print "match $key ";
	foreach ($mat as $player) {
		print $player.' '.$players[$player].' ';
	}
	print "\r\n";
}

function alreadyInMatch($player, $match){
	foreach ($match as $opp) {
		if(in_array($player,$opp,true)){
			return true;
		}
	}
	return false;
}

function alreadyMatch($player1, $player2, $history){
	return false;
}
?> 
