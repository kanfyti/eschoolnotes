<?php
	require_once 'getAllNotes.php';
	require_once 'vars.php';
    
    $username = $_POST['username'];
    $hash_password = hash("sha256", $_POST['password']);
    $userId = $_POST['userId'];
	$eiId = $_POST['eiId'];
	
	$notes_json = getAllNotes($username, $hash_password, $userId, $eiId);
	$notes = notesProcessing($notes_json);
	print_r($notes);

	function notesProcessing($notes_json) {
		global $unitIdToSubjects;
		$notes = array();
		for ($i = 0; $i < count($notes_json["result"]); ++$i) {
			$currNote = $notes_json["result"][$i];
			$currSubject = $unitIdToSubjects[$currNote["unitId"]];
			if (!$notes[$currSubject]) {
				$notes[$currSubject] = array(
					"sumNotesWithCoeff" => 0.0,
					"sumCoeff"          => 0.0,
					"overallNote"       => 0.0
				);
			}
			if (isset($currNote["markVal"])) {
				$notes[$currSubject]["sumNotesWithCoeff"] += (float)$currNote["markVal"] * (float)$currNote["mktWt"];
				$notes[$currSubject]["sumCoeff"] += (float)$currNote["mktWt"];
				$notes[$currSubject]["overallNote"] = round($notes[$currSubject]["sumNotesWithCoeff"] / $notes[$currSubject]["sumCoeff"], 2);
			}
		}
		return $notes;
	}
?>