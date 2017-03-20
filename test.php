<?php
for ($i=0; $i < 1000; $i++) { 
	$players['player'.$i] = 0;
}

print 'Il y a '.count($players)." joueurs \r\n" ;
print 'Ronde avec '.$totalmatch.' matchs'." \r\n" ;
print howManyRound($players) . ' rondes'." \r\n" ;

for ($i=0; $i < howManyRound($players); $i++) { 
	print 'ronde '.$i." \r\n" ;

	$matchs = createRound($players);

	foreach ($matchs as $key => $value) {
	if(rand(0,1)==0){
		$players[$value[0]] += 3;
	}else{
		$players[$value[1]] += 3;
	}
	}
}

asort($players);
var_dump($players);

function createRound(&$players){
	$totalmatch = round((count($players)/2));
	$match = [];

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
	return $match;
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

function howManyRound($players){
	for ($i=1; $i < 50; $i++) { 
		if(count($players) <= pow(2,$i)){
			return $i ;
		}
	}
}
?> 
