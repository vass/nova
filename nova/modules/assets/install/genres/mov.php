<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|---------------------------------------------------------------
| INSTALL - GENRE DATA (ST:MOV)
|---------------------------------------------------------------
|
| File: assets/install_data_mov.php
| System Version: 2.0
|
| Genre data compiled by David VanScott
|
*/

/*
|---------------------------------------------------------------
| Genre Variables
|---------------------------------------------------------------
*/
$g = 'mov';

/*
|---------------------------------------------------------------
| Genre Table Data (ST:MOV)
|---------------------------------------------------------------
*/
$data = array(
	'departments_'. $g 	=> 'depts',
	'ranks_'. $g		=> 'ranks',
	'positions_'. $g	=> 'positions',
	'catalogue_ranks'	=> 'catalogue_ranks'
);

$depts = array(
	array(
		'dept_name' => 'Command',
		'dept_desc' => "The Command department is ultimately responsible for the ship and its crew, and those within the department are responsible for commanding the vessel and representing the interests of Starfleet.",
		'dept_order' => 0,
		'dept_manifest' => 1),
	array(
		'dept_name' => 'Operations',
		'dept_desc' => "Responsible for the navigation and flight control of a vessel and its auxiliary craft, the Operations division includes pilots trained in both starship and auxiliary craft piloting as well as navigators and other personnel to help in running the various ancillary operations of the ship.",
		'dept_order' => 1,
		'dept_manifest' => 1),
	array(
		'dept_name' => 'Communications',
		'dept_desc' => "The Communications department is responsible for the operation of the Starfleet's communications systems. On many ships the Communications department is simply amalgamated with Operations; it is often only on Flagships (where a large amount of communications traffic can be received in a very short space of time) and Starbases (where there is an extremely large amount of communications traffic at almost all times).",
		'dept_order' => 2,
		'dept_manifest' => 1),
	array(
		'dept_name' => 'Security',
		'dept_desc' => "Merging the responsibilities of ship to ship and personnel combat into a single department, the armory division is responsible for the tactical readiness of the vessel and the security of the ship.",
		'dept_order' => 3,
		'dept_manifest' => 1),
	array(
		'dept_name' => 'Engineering',
		'dept_desc' => "The engineering division has the enormous task of keeping the ship working; they are responsible for making repairs, fixing problems, and making sure that the ship is ready for anything.",
		'dept_order' => 4,
		'dept_manifest' => 1),
	array(
		'dept_name' => 'Science',
		'dept_desc' => "From sensor readings to figuring out a way to enter the strange spacial anomaly, the science division is responsible for recording data, testing new ideas out, and making discoveries.",
		'dept_order' => 5,
		'dept_manifest' => 1),
	array(
		'dept_name' => 'Medical',
		'dept_desc' => "The medical division is responsible for the mental and physical health of the crew, from running annual physicals to combatting a strange plague that is afflicting the crew to helping a crew member deal with the loss of a loved one.",
		'dept_order' => 6,
		'dept_manifest' => 1)
);

$ranks = array(
	array(
		'rank_name' => 'Fleet Admiral',
		'rank_short_name' => 'FADM',
		'rank_image' => 'w-a5',
		'rank_order' => 0,
		'rank_class' => 1),
	array(
		'rank_name' => 'Fleet Admiral',
		'rank_short_name' => 'FADM',
		'rank_image' => 'y-a5',
		'rank_order' => 0,
		'rank_class' => 2),
	array(
		'rank_name' => 'Fleet Admiral',
		'rank_short_name' => 'FADM',
		'rank_image' => 'm-a5',
		'rank_order' => 0,
		'rank_class' => 3),
	array(
		'rank_name' => 'Fleet Admiral',
		'rank_short_name' => 'FADM',
		'rank_image' => 'r-a5',
		'rank_order' => 0,
		'rank_class' => 4),
	array(
		'rank_name' => 'Field Marshal',
		'rank_short_name' => 'FMSL',
		'rank_image' => 'b-a5',
		'rank_order' => 0,
		'rank_class' => 5),
	array(
		'rank_name' => 'Fleet Admiral',
		'rank_short_name' => 'FADM',
		'rank_image' => 'c-a5',
		'rank_order' => 0,
		'rank_class' => 6),
	array(
		'rank_name' => 'Fleet Admiral',
		'rank_short_name' => 'FADM',
		'rank_image' => 'd-a5',
		'rank_order' => 0,
		'rank_class' => 7),
	array(
		'rank_name' => 'Fleet Admiral',
		'rank_short_name' => 'FADM',
		'rank_image' => 'g-a5',
		'rank_order' => 0,
		'rank_class' => 8),
	array(
		'rank_name' => 'Fleet Admiral',
		'rank_short_name' => 'FADM',
		'rank_image' => 'p-a5',
		'rank_order' => 0,
		'rank_class' => 9),
	array(
		'rank_name' => 'Fleet Admiral',
		'rank_short_name' => 'FADM',
		'rank_image' => 's-a5',
		'rank_order' => 0,
		'rank_class' => 10),
	array(
		'rank_name' => 'Fleet Admiral',
		'rank_short_name' => 'FADM',
		'rank_image' => 'v-a5',
		'rank_order' => 0,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Admiral',
		'rank_short_name' => 'ADM',
		'rank_image' => 'w-a4',
		'rank_order' => 1,
		'rank_class' => 1),
	array(
		'rank_name' => 'Admiral',
		'rank_short_name' => 'ADM',
		'rank_image' => 'y-a4',
		'rank_order' => 1,
		'rank_class' => 2),
	array(
		'rank_name' => 'Admiral',
		'rank_short_name' => 'ADM',
		'rank_image' => 'm-a4',
		'rank_order' => 1,
		'rank_class' => 3),
	array(
		'rank_name' => 'Admiral',
		'rank_short_name' => 'ADM',
		'rank_image' => 'r-a4',
		'rank_order' => 1,
		'rank_class' => 4),
	array(
		'rank_name' => 'General',
		'rank_short_name' => 'GEN',
		'rank_image' => 'b-a4',
		'rank_order' => 1,
		'rank_class' => 5),
	array(
		'rank_name' => 'Admiral',
		'rank_short_name' => 'ADM',
		'rank_image' => 'c-a4',
		'rank_order' => 1,
		'rank_class' => 6),
	array(
		'rank_name' => 'Admiral',
		'rank_short_name' => 'ADM',
		'rank_image' => 'd-a4',
		'rank_order' => 1,
		'rank_class' => 7),
	array(
		'rank_name' => 'Admiral',
		'rank_short_name' => 'ADM',
		'rank_image' => 'g-a4',
		'rank_order' => 1,
		'rank_class' => 8),
	array(
		'rank_name' => 'Admiral',
		'rank_short_name' => 'ADM',
		'rank_image' => 'p-a4',
		'rank_order' => 1,
		'rank_class' => 9),
	array(
		'rank_name' => 'Admiral',
		'rank_short_name' => 'ADM',
		'rank_image' => 's-a4',
		'rank_order' => 1,
		'rank_class' => 10),
	array(
		'rank_name' => 'Admiral',
		'rank_short_name' => 'ADM',
		'rank_image' => 'v-a4',
		'rank_order' => 1,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Vice-Admiral',
		'rank_short_name' => 'VADM',
		'rank_image' => 'w-a3',
		'rank_order' => 2,
		'rank_class' => 1),
	array(
		'rank_name' => 'Vice-Admiral',
		'rank_short_name' => 'VADM',
		'rank_image' => 'y-a3',
		'rank_order' => 2,
		'rank_class' => 2),
	array(
		'rank_name' => 'Vice-Admiral',
		'rank_short_name' => 'VADM',
		'rank_image' => 'm-a3',
		'rank_order' => 2,
		'rank_class' => 3),
	array(
		'rank_name' => 'Vice-Admiral',
		'rank_short_name' => 'VADM',
		'rank_image' => 'r-a3',
		'rank_order' => 2,
		'rank_class' => 4),
	array(
		'rank_name' => 'Lieutenant General',
		'rank_short_name' => 'LTGEN',
		'rank_image' => 'b-a3',
		'rank_order' => 2,
		'rank_class' => 5),
	array(
		'rank_name' => 'Vice-Admiral',
		'rank_short_name' => 'VADM',
		'rank_image' => 'c-a3',
		'rank_order' => 2,
		'rank_class' => 6),
	array(
		'rank_name' => 'Vice-Admiral',
		'rank_short_name' => 'VADM',
		'rank_image' => 'd-a3',
		'rank_order' => 2,
		'rank_class' => 7),
	array(
		'rank_name' => 'Vice-Admiral',
		'rank_short_name' => 'VADM',
		'rank_image' => 'g-a3',
		'rank_order' => 2,
		'rank_class' => 8),
	array(
		'rank_name' => 'Vice-Admiral',
		'rank_short_name' => 'VADM',
		'rank_image' => 'p-a3',
		'rank_order' => 2,
		'rank_class' => 9),
	array(
		'rank_name' => 'Vice-Admiral',
		'rank_short_name' => 'VADM',
		'rank_image' => 's-a3',
		'rank_order' => 2,
		'rank_class' => 10),
	array(
		'rank_name' => 'Vice-Admiral',
		'rank_short_name' => 'VADM',
		'rank_image' => 'v-a3',
		'rank_order' => 2,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Rear-Admiral',
		'rank_short_name' => 'RADM',
		'rank_image' => 'w-a2',
		'rank_order' => 3,
		'rank_class' => 1),
	array(
		'rank_name' => 'Rear-Admiral',
		'rank_short_name' => 'RADM',
		'rank_image' => 'y-a2',
		'rank_order' => 3,
		'rank_class' => 2),
	array(
		'rank_name' => 'Rear-Admiral',
		'rank_short_name' => 'RADM',
		'rank_image' => 'm-a2',
		'rank_order' => 3,
		'rank_class' => 3),
	array(
		'rank_name' => 'Rear-Admiral',
		'rank_short_name' => 'RADM',
		'rank_image' => 'r-a2',
		'rank_order' => 3,
		'rank_class' => 4),
	array(
		'rank_name' => 'Major General',
		'rank_short_name' => 'MAJGEN',
		'rank_image' => 'b-a2',
		'rank_order' => 3,
		'rank_class' => 5),
	array(
		'rank_name' => 'Rear-Admiral',
		'rank_short_name' => 'RADM',
		'rank_image' => 'c-a2',
		'rank_order' => 3,
		'rank_class' => 6),
	array(
		'rank_name' => 'Rear-Admiral',
		'rank_short_name' => 'RADM',
		'rank_image' => 'd-a2',
		'rank_order' => 3,
		'rank_class' => 7),
	array(
		'rank_name' => 'Rear-Admiral',
		'rank_short_name' => 'RADM',
		'rank_image' => 'g-a2',
		'rank_order' => 3,
		'rank_class' => 8),
	array(
		'rank_name' => 'Rear-Admiral',
		'rank_short_name' => 'RADM',
		'rank_image' => 'p-a2',
		'rank_order' => 3,
		'rank_class' => 9),
	array(
		'rank_name' => 'Rear-Admiral',
		'rank_short_name' => 'RADM',
		'rank_image' => 's-a2',
		'rank_order' => 3,
		'rank_class' => 10),
	array(
		'rank_name' => 'Rear-Admiral',
		'rank_short_name' => 'RADM',
		'rank_image' => 'v-a2',
		'rank_order' => 3,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Commodore',
		'rank_short_name' => 'COMO',
		'rank_image' => 'w-a1',
		'rank_order' => 4,
		'rank_class' => 1),
	array(
		'rank_name' => 'Commodore',
		'rank_short_name' => 'COMO',
		'rank_image' => 'y-a1',
		'rank_order' => 4,
		'rank_class' => 2),
	array(
		'rank_name' => 'Commodore',
		'rank_short_name' => 'COMO',
		'rank_image' => 'm-a1',
		'rank_order' => 4,
		'rank_class' => 3),
	array(
		'rank_name' => 'Commodore',
		'rank_short_name' => 'COMO',
		'rank_image' => 'r-a1',
		'rank_order' => 4,
		'rank_class' => 4),
	array(
		'rank_name' => 'Brigadier General',
		'rank_short_name' => 'BGEN',
		'rank_image' => 'b-a1',
		'rank_order' => 4,
		'rank_class' => 5),
	array(
		'rank_name' => 'Commodore',
		'rank_short_name' => 'COMO',
		'rank_image' => 'c-a1',
		'rank_order' => 4,
		'rank_class' => 6),
	array(
		'rank_name' => 'Commodore',
		'rank_short_name' => 'COMO',
		'rank_image' => 'd-a1',
		'rank_order' => 4,
		'rank_class' => 7),
	array(
		'rank_name' => 'Commodore',
		'rank_short_name' => 'COMO',
		'rank_image' => 'g-a1',
		'rank_order' => 4,
		'rank_class' => 8),
	array(
		'rank_name' => 'Commodore',
		'rank_short_name' => 'COMO',
		'rank_image' => 'p-a1',
		'rank_order' => 4,
		'rank_class' => 9),
	array(
		'rank_name' => 'Commodore',
		'rank_short_name' => 'COMO',
		'rank_image' => 's-a1',
		'rank_order' => 4,
		'rank_class' => 10),
	array(
		'rank_name' => 'Commodore',
		'rank_short_name' => 'COMO',
		'rank_image' => 'v-a1',
		'rank_order' => 4,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Captain',
		'rank_short_name' => 'CAPT',
		'rank_image' => 'w-o6',
		'rank_order' => 5,
		'rank_class' => 1),
	array(
		'rank_name' => 'Captain',
		'rank_short_name' => 'CAPT',
		'rank_image' => 'y-o6',
		'rank_order' => 5,
		'rank_class' => 2),
	array(
		'rank_name' => 'Captain',
		'rank_short_name' => 'CAPT',
		'rank_image' => 'm-o6',
		'rank_order' => 5,
		'rank_class' => 3),
	array(
		'rank_name' => 'Captain',
		'rank_short_name' => 'CAPT',
		'rank_image' => 'r-o6',
		'rank_order' => 5,
		'rank_class' => 4),
	array(
		'rank_name' => 'Colonel',
		'rank_short_name' => 'COL',
		'rank_image' => 'b-o6',
		'rank_order' => 5,
		'rank_class' => 5),
	array(
		'rank_name' => 'Captain',
		'rank_short_name' => 'CAPT',
		'rank_image' => 'c-o6',
		'rank_order' => 5,
		'rank_class' => 6),
	array(
		'rank_name' => 'Captain',
		'rank_short_name' => 'CAPT',
		'rank_image' => 'd-o6',
		'rank_order' => 5,
		'rank_class' => 7),
	array(
		'rank_name' => 'Captain',
		'rank_short_name' => 'CAPT',
		'rank_image' => 'g-o6',
		'rank_order' => 5,
		'rank_class' => 8),
	array(
		'rank_name' => 'Captain',
		'rank_short_name' => 'CAPT',
		'rank_image' => 'p-o6',
		'rank_order' => 5,
		'rank_class' => 9),
	array(
		'rank_name' => 'Captain',
		'rank_short_name' => 'CAPT',
		'rank_image' => 's-o6',
		'rank_order' => 5,
		'rank_class' => 10),
	array(
		'rank_name' => 'Captain',
		'rank_short_name' => 'CAPT',
		'rank_image' => 'v-o6',
		'rank_order' => 5,
		'rank_class' => 11),
	
	array(
		'rank_name' => 'Commander',
		'rank_short_name' => 'CMDR',
		'rank_image' => 'w-o5',
		'rank_order' => 6,
		'rank_class' => 1),
	array(
		'rank_name' => 'Commander',
		'rank_short_name' => 'CMDR',
		'rank_image' => 'y-o5',
		'rank_order' => 6,
		'rank_class' => 2),
	array(
		'rank_name' => 'Commander',
		'rank_short_name' => 'CMDR',
		'rank_image' => 'm-o5',
		'rank_order' => 6,
		'rank_class' => 3),
	array(
		'rank_name' => 'Commander',
		'rank_short_name' => 'CMDR',
		'rank_image' => 'r-o5',
		'rank_order' => 6,
		'rank_class' => 4),
	array(
		'rank_name' => 'Lieutenant Colonel',
		'rank_short_name' => 'LTCOL',
		'rank_image' => 'b-o5',
		'rank_order' => 6,
		'rank_class' => 5),
	array(
		'rank_name' => 'Commander',
		'rank_short_name' => 'CMDR',
		'rank_image' => 'c-o5',
		'rank_order' => 6,
		'rank_class' => 6),
	array(
		'rank_name' => 'Commander',
		'rank_short_name' => 'CMDR',
		'rank_image' => 'd-o5',
		'rank_order' => 6,
		'rank_class' => 7),
	array(
		'rank_name' => 'Commander',
		'rank_short_name' => 'CMDR',
		'rank_image' => 'g-o5',
		'rank_order' => 6,
		'rank_class' => 8),
	array(
		'rank_name' => 'Commander',
		'rank_short_name' => 'CMDR',
		'rank_image' => 'p-o5',
		'rank_order' => 6,
		'rank_class' => 9),
	array(
		'rank_name' => 'Commander',
		'rank_short_name' => 'CMDR',
		'rank_image' => 's-o5',
		'rank_order' => 6,
		'rank_class' => 10),
	array(
		'rank_name' => 'Commander',
		'rank_short_name' => 'CMDR',
		'rank_image' => 'v-o5',
		'rank_order' => 6,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Lieutenant Commander',
		'rank_short_name' => 'LT CMDR',
		'rank_image' => 'w-o4',
		'rank_order' => 7,
		'rank_class' => 1),
	array(
		'rank_name' => 'Lieutenant Commander',
		'rank_short_name' => 'LT CMDR',
		'rank_image' => 'y-o4',
		'rank_order' => 7,
		'rank_class' => 2),
	array(
		'rank_name' => 'Lieutenant Commander',
		'rank_short_name' => 'LT CMDR',
		'rank_image' => 'm-o4',
		'rank_order' => 7,
		'rank_class' => 3),
	array(
		'rank_name' => 'Lieutenant Commander',
		'rank_short_name' => 'LT CMDR',
		'rank_image' => 'r-o4',
		'rank_order' => 7,
		'rank_class' => 4),
	array(
		'rank_name' => 'Major',
		'rank_short_name' => 'MAJ',
		'rank_image' => 'b-o4',
		'rank_order' => 7,
		'rank_class' => 5),
	array(
		'rank_name' => 'Lieutenant Commander',
		'rank_short_name' => 'LT CMDR',
		'rank_image' => 'c-o4',
		'rank_order' => 7,
		'rank_class' => 6),
	array(
		'rank_name' => 'Lieutenant Commander',
		'rank_short_name' => 'LT CMDR',
		'rank_image' => 'd-o4',
		'rank_order' => 7,
		'rank_class' => 7),
	array(
		'rank_name' => 'Lieutenant Commander',
		'rank_short_name' => 'LT CMDR',
		'rank_image' => 'g-o4',
		'rank_order' => 7,
		'rank_class' => 8),
	array(
		'rank_name' => 'Lieutenant Commander',
		'rank_short_name' => 'LT CMDR',
		'rank_image' => 'p-o4',
		'rank_order' => 7,
		'rank_class' => 9),
	array(
		'rank_name' => 'Lieutenant Commander',
		'rank_short_name' => 'LT CMDR',
		'rank_image' => 's-o4',
		'rank_order' => 7,
		'rank_class' => 10),
	array(
		'rank_name' => 'Lieutenant Commander',
		'rank_short_name' => 'LT CMDR',
		'rank_image' => 'v-o4',
		'rank_order' => 7,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Lieutenant',
		'rank_short_name' => 'LT',
		'rank_image' => 'w-o3',
		'rank_order' => 8,
		'rank_class' => 1),
	array(
		'rank_name' => 'Lieutenant',
		'rank_short_name' => 'LT',
		'rank_image' => 'y-o3',
		'rank_order' => 8,
		'rank_class' => 2),
	array(
		'rank_name' => 'Lieutenant',
		'rank_short_name' => 'LT',
		'rank_image' => 'm-o3',
		'rank_order' => 8,
		'rank_class' => 3),
	array(
		'rank_name' => 'Lieutenant',
		'rank_short_name' => 'LT',
		'rank_image' => 'r-o3',
		'rank_order' => 8,
		'rank_class' => 4),
	array(
		'rank_name' => 'Captain',
		'rank_short_name' => 'CAPT',
		'rank_image' => 'b-o3',
		'rank_order' => 8,
		'rank_class' => 5),
	array(
		'rank_name' => 'Lieutenant',
		'rank_short_name' => 'LT',
		'rank_image' => 'c-o3',
		'rank_order' => 8,
		'rank_class' => 6),
	array(
		'rank_name' => 'Lieutenant',
		'rank_short_name' => 'LT',
		'rank_image' => 'd-o3',
		'rank_order' => 8,
		'rank_class' => 7),
	array(
		'rank_name' => 'Lieutenant',
		'rank_short_name' => 'LT',
		'rank_image' => 'g-o3',
		'rank_order' => 8,
		'rank_class' => 8),
	array(
		'rank_name' => 'Lieutenant',
		'rank_short_name' => 'LT',
		'rank_image' => 'p-o3',
		'rank_order' => 8,
		'rank_class' => 9),
	array(
		'rank_name' => 'Lieutenant',
		'rank_short_name' => 'LT',
		'rank_image' => 's-o3',
		'rank_order' => 8,
		'rank_class' => 10),
	array(
		'rank_name' => 'Lieutenant',
		'rank_short_name' => 'LT',
		'rank_image' => 'v-o3',
		'rank_order' => 8,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Lieutenant JG',
		'rank_short_name' => 'LT(JG)',
		'rank_image' => 'w-o2',
		'rank_order' => 9,
		'rank_class' => 1),
	array(
		'rank_name' => 'Lieutenant JG',
		'rank_short_name' => 'LT(JG)',
		'rank_image' => 'y-o2',
		'rank_order' => 9,
		'rank_class' => 2),
	array(
		'rank_name' => 'Lieutenant JG',
		'rank_short_name' => 'LT(JG)',
		'rank_image' => 'm-o2',
		'rank_order' => 9,
		'rank_class' => 3),
	array(
		'rank_name' => 'Lieutenant JG',
		'rank_short_name' => 'LT(JG)',
		'rank_image' => 'r-o2',
		'rank_order' => 9,
		'rank_class' => 4),
	array(
		'rank_name' => '1st Lieutenant',
		'rank_short_name' => '1LT',
		'rank_image' => 'b-o2',
		'rank_order' => 9,
		'rank_class' => 5),
	array(
		'rank_name' => 'Lieutenant JG',
		'rank_short_name' => 'LT(JG)',
		'rank_image' => 'c-o2',
		'rank_order' => 9,
		'rank_class' => 6),
	array(
		'rank_name' => 'Lieutenant JG',
		'rank_short_name' => 'LT(JG)',
		'rank_image' => 'd-o2',
		'rank_order' => 9,
		'rank_class' => 7),
	array(
		'rank_name' => 'Lieutenant JG',
		'rank_short_name' => 'LT(JG)',
		'rank_image' => 'g-o2',
		'rank_order' => 9,
		'rank_class' => 8),
	array(
		'rank_name' => 'Lieutenant JG',
		'rank_short_name' => 'LT(JG)',
		'rank_image' => 'p-o2',
		'rank_order' => 9,
		'rank_class' => 9),
	array(
		'rank_name' => 'Lieutenant JG',
		'rank_short_name' => 'LT(JG)',
		'rank_image' => 's-o2',
		'rank_order' => 9,
		'rank_class' => 10),
	array(
		'rank_name' => 'Lieutenant JG',
		'rank_short_name' => 'LT(JG)',
		'rank_image' => 'v-o2',
		'rank_order' => 9,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Ensign',
		'rank_short_name' => 'EN',
		'rank_image' => 'w-o1',
		'rank_order' => 10,
		'rank_class' => 1),
	array(
		'rank_name' => 'Ensign',
		'rank_short_name' => 'EN',
		'rank_image' => 'y-o1',
		'rank_order' => 10,
		'rank_class' => 2),
	array(
		'rank_name' => 'Ensign',
		'rank_short_name' => 'EN',
		'rank_image' => 'm-o1',
		'rank_order' => 10,
		'rank_class' => 3),
	array(
		'rank_name' => 'Ensign',
		'rank_short_name' => 'EN',
		'rank_image' => 'r-o1',
		'rank_order' => 10,
		'rank_class' => 4),
	array(
		'rank_name' => '2nd Lieutenant',
		'rank_short_name' => '2LT',
		'rank_image' => 'b-o1',
		'rank_order' => 10,
		'rank_class' => 5),
	array(
		'rank_name' => 'Ensign',
		'rank_short_name' => 'EN',
		'rank_image' => 'c-o1',
		'rank_order' => 10,
		'rank_class' => 6),
	array(
		'rank_name' => 'Ensign',
		'rank_short_name' => 'EN',
		'rank_image' => 'd-o1',
		'rank_order' => 10,
		'rank_class' => 7),
	array(
		'rank_name' => 'Ensign',
		'rank_short_name' => 'EN',
		'rank_image' => 'g-o1',
		'rank_order' => 10,
		'rank_class' => 8),
	array(
		'rank_name' => 'Ensign',
		'rank_short_name' => 'EN',
		'rank_image' => 'p-o1',
		'rank_order' => 10,
		'rank_class' => 9),
	array(
		'rank_name' => 'Ensign',
		'rank_short_name' => 'EN',
		'rank_image' => 's-o1',
		'rank_order' => 10,
		'rank_class' => 10),
	array(
		'rank_name' => 'Ensign',
		'rank_short_name' => 'EN',
		'rank_image' => 'v-o1',
		'rank_order' => 10,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Master Chief Petty Officer',
		'rank_short_name' => 'MCPO',
		'rank_image' => 'w-e6',
		'rank_order' => 11,
		'rank_class' => 1),
	array(
		'rank_name' => 'Master Chief Petty Officer',
		'rank_short_name' => 'MCPO',
		'rank_image' => 'y-e6',
		'rank_order' => 11,
		'rank_class' => 2),
	array(
		'rank_name' => 'Master Chief Petty Officer',
		'rank_short_name' => 'MCPO',
		'rank_image' => 'm-e6',
		'rank_order' => 11,
		'rank_class' => 3),
	array(
		'rank_name' => 'Master Chief Petty Officer',
		'rank_short_name' => 'MCPO',
		'rank_image' => 'r-e6',
		'rank_order' => 11,
		'rank_class' => 4),
	array(
		'rank_name' => 'Sergeant Major',
		'rank_short_name' => 'SGTMAJ',
		'rank_image' => 'b-e6',
		'rank_order' => 11,
		'rank_class' => 5),
	array(
		'rank_name' => 'Master Chief Petty Officer',
		'rank_short_name' => 'MCPO',
		'rank_image' => 'c-e6',
		'rank_order' => 11,
		'rank_class' => 6),
	array(
		'rank_name' => 'Master Chief Petty Officer',
		'rank_short_name' => 'MCPO',
		'rank_image' => 'd-e6',
		'rank_order' => 11,
		'rank_class' => 7),
	array(
		'rank_name' => 'Master Chief Petty Officer',
		'rank_short_name' => 'MCPO',
		'rank_image' => 'g-e6',
		'rank_order' => 11,
		'rank_class' => 8),
	array(
		'rank_name' => 'Master Chief Petty Officer',
		'rank_short_name' => 'MCPO',
		'rank_image' => 'p-e6',
		'rank_order' => 11,
		'rank_class' => 9),
	array(
		'rank_name' => 'Master Chief Petty Officer',
		'rank_short_name' => 'MCPO',
		'rank_image' => 's-e6',
		'rank_order' => 11,
		'rank_class' => 10),
	array(
		'rank_name' => 'Master Chief Petty Officer',
		'rank_short_name' => 'MCPO',
		'rank_image' => 'v-e6',
		'rank_order' => 11,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Senior Chief Petty Officer',
		'rank_short_name' => 'SCPO',
		'rank_image' => 'w-e5',
		'rank_order' => 12,
		'rank_class' => 1),
	array(
		'rank_name' => 'Senior Chief Petty Officer',
		'rank_short_name' => 'SCPO',
		'rank_image' => 'y-e5',
		'rank_order' => 12,
		'rank_class' => 2),
	array(
		'rank_name' => 'Senior Chief Petty Officer',
		'rank_short_name' => 'SCPO',
		'rank_image' => 'm-e5',
		'rank_order' => 12,
		'rank_class' => 3),
	array(
		'rank_name' => 'Senior Chief Petty Officer',
		'rank_short_name' => 'SCPO',
		'rank_image' => 'r-e5',
		'rank_order' => 12,
		'rank_class' => 4),
	array(
		'rank_name' => 'Master Sergeant',
		'rank_short_name' => 'MSGT',
		'rank_image' => 'b-e5',
		'rank_order' => 12,
		'rank_class' => 5),
	array(
		'rank_name' => 'Senior Chief Petty Officer',
		'rank_short_name' => 'SCPO',
		'rank_image' => 'c-e5',
		'rank_order' => 12,
		'rank_class' => 6),
	array(
		'rank_name' => 'Senior Chief Petty Officer',
		'rank_short_name' => 'SCPO',
		'rank_image' => 'd-e5',
		'rank_order' => 12,
		'rank_class' => 7),
	array(
		'rank_name' => 'Senior Chief Petty Officer',
		'rank_short_name' => 'SCPO',
		'rank_image' => 'g-e5',
		'rank_order' => 12,
		'rank_class' => 8),
	array(
		'rank_name' => 'Senior Chief Petty Officer',
		'rank_short_name' => 'SCPO',
		'rank_image' => 'p-e5',
		'rank_order' => 12,
		'rank_class' => 9),
	array(
		'rank_name' => 'Senior Chief Petty Officer',
		'rank_short_name' => 'SCPO',
		'rank_image' => 's-e5',
		'rank_order' => 12,
		'rank_class' => 10),
	array(
		'rank_name' => 'Senior Chief Petty Officer',
		'rank_short_name' => 'SCPO',
		'rank_image' => 'v-e5',
		'rank_order' => 12,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Chief Petty Officer',
		'rank_short_name' => 'CPO',
		'rank_image' => 'w-e4',
		'rank_order' => 13,
		'rank_class' => 1),
	array(
		'rank_name' => 'Chief Petty Officer',
		'rank_short_name' => 'CPO',
		'rank_image' => 'y-e4',
		'rank_order' => 13,
		'rank_class' => 2),
	array(
		'rank_name' => 'Chief Petty Officer',
		'rank_short_name' => 'CPO',
		'rank_image' => 'm-e4',
		'rank_order' => 13,
		'rank_class' => 3),
	array(
		'rank_name' => 'Chief Petty Officer',
		'rank_short_name' => 'CPO',
		'rank_image' => 'r-e4',
		'rank_order' => 13,
		'rank_class' => 4),
	array(
		'rank_name' => 'Gunnery Sergeant',
		'rank_short_name' => 'GSGT',
		'rank_image' => 'b-e4',
		'rank_order' => 13,
		'rank_class' => 5),
	array(
		'rank_name' => 'Chief Petty Officer',
		'rank_short_name' => 'CPO',
		'rank_image' => 'c-e4',
		'rank_order' => 13,
		'rank_class' => 6),
	array(
		'rank_name' => 'Chief Petty Officer',
		'rank_short_name' => 'CPO',
		'rank_image' => 'd-e4',
		'rank_order' => 13,
		'rank_class' => 7),
	array(
		'rank_name' => 'Chief Petty Officer',
		'rank_short_name' => 'CPO',
		'rank_image' => 'g-e4',
		'rank_order' => 13,
		'rank_class' => 8),
	array(
		'rank_name' => 'Chief Petty Officer',
		'rank_short_name' => 'CPO',
		'rank_image' => 'p-e4',
		'rank_order' => 13,
		'rank_class' => 9),
	array(
		'rank_name' => 'Chief Petty Officer',
		'rank_short_name' => 'CPO',
		'rank_image' => 's-e4',
		'rank_order' => 13,
		'rank_class' => 10),
	array(
		'rank_name' => 'Chief Petty Officer',
		'rank_short_name' => 'CPO',
		'rank_image' => 'v-e4',
		'rank_order' => 13,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Petty Officer, 1st Class',
		'rank_short_name' => 'PO1',
		'rank_image' => 'w-e3',
		'rank_order' => 14,
		'rank_class' => 1),
	array(
		'rank_name' => 'Petty Officer, 1st Class',
		'rank_short_name' => 'PO1',
		'rank_image' => 'y-e3',
		'rank_order' => 14,
		'rank_class' => 2),
	array(
		'rank_name' => 'Petty Officer, 1st Class',
		'rank_short_name' => 'PO1',
		'rank_image' => 'm-e3',
		'rank_order' => 14,
		'rank_class' => 3),
	array(
		'rank_name' => 'Petty Officer, 1st Class',
		'rank_short_name' => 'PO1',
		'rank_image' => 'r-e3',
		'rank_order' => 14,
		'rank_class' => 4),
	array(
		'rank_name' => 'Staff Sergeant',
		'rank_short_name' => 'SSGT',
		'rank_image' => 'b-e3',
		'rank_order' => 14,
		'rank_class' => 5),
	array(
		'rank_name' => 'Petty Officer, 1st Class',
		'rank_short_name' => 'PO1',
		'rank_image' => 'c-e3',
		'rank_order' => 14,
		'rank_class' => 6),
	array(
		'rank_name' => 'Petty Officer, 1st Class',
		'rank_short_name' => 'PO1',
		'rank_image' => 'd-e3',
		'rank_order' => 14,
		'rank_class' => 7),
	array(
		'rank_name' => 'Petty Officer, 1st Class',
		'rank_short_name' => 'PO1',
		'rank_image' => 'g-e3',
		'rank_order' => 14,
		'rank_class' => 8),
	array(
		'rank_name' => 'Petty Officer, 1st Class',
		'rank_short_name' => 'PO1',
		'rank_image' => 'p-e3',
		'rank_order' => 14,
		'rank_class' => 9),
	array(
		'rank_name' => 'Petty Officer, 1st Class',
		'rank_short_name' => 'PO1',
		'rank_image' => 's-e3',
		'rank_order' => 14,
		'rank_class' => 10),
	array(
		'rank_name' => 'Petty Officer, 1st Class',
		'rank_short_name' => 'PO1',
		'rank_image' => 'v-e3',
		'rank_order' => 14,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Petty Officer, 2nd Class',
		'rank_short_name' => 'PO2',
		'rank_image' => 'w-e2',
		'rank_order' => 15,
		'rank_class' => 1),
	array(
		'rank_name' => 'Petty Officer, 2nd Class',
		'rank_short_name' => 'PO2',
		'rank_image' => 'y-e2',
		'rank_order' => 15,
		'rank_class' => 2),
	array(
		'rank_name' => 'Petty Officer, 2nd Class',
		'rank_short_name' => 'PO2',
		'rank_image' => 'm-e2',
		'rank_order' => 15,
		'rank_class' => 3),
	array(
		'rank_name' => 'Petty Officer, 2nd Class',
		'rank_short_name' => 'PO2',
		'rank_image' => 'r-e2',
		'rank_order' => 15,
		'rank_class' => 4),
	array(
		'rank_name' => 'Sergeant',
		'rank_short_name' => 'SGT',
		'rank_image' => 'b-e2',
		'rank_order' => 15,
		'rank_class' => 5),
	array(
		'rank_name' => 'Petty Officer, 2nd Class',
		'rank_short_name' => 'PO2',
		'rank_image' => 'c-e2',
		'rank_order' => 15,
		'rank_class' => 6),
	array(
		'rank_name' => 'Petty Officer, 2nd Class',
		'rank_short_name' => 'PO2',
		'rank_image' => 'd-e2',
		'rank_order' => 15,
		'rank_class' => 7),
	array(
		'rank_name' => 'Petty Officer, 2nd Class',
		'rank_short_name' => 'PO2',
		'rank_image' => 'g-e2',
		'rank_order' => 15,
		'rank_class' => 8),
	array(
		'rank_name' => 'Petty Officer, 2nd Class',
		'rank_short_name' => 'PO2',
		'rank_image' => 'p-e2',
		'rank_order' => 15,
		'rank_class' => 9),
	array(
		'rank_name' => 'Petty Officer, 2nd Class',
		'rank_short_name' => 'PO2',
		'rank_image' => 's-e2',
		'rank_order' => 15,
		'rank_class' => 10),
	array(
		'rank_name' => 'Petty Officer, 2nd Class',
		'rank_short_name' => 'PO2',
		'rank_image' => 'v-e2',
		'rank_order' => 15,
		'rank_class' => 11),
		
	array(
		'rank_name' => 'Able Crewman',
		'rank_short_name' => 'ABCR',
		'rank_image' => 'w-e1',
		'rank_order' => 16,
		'rank_class' => 1),
	array(
		'rank_name' => 'Able Crewman',
		'rank_short_name' => 'ABCR',
		'rank_image' => 'y-e1',
		'rank_order' => 16,
		'rank_class' => 2),
	array(
		'rank_name' => 'Able Crewman',
		'rank_short_name' => 'ABCR',
		'rank_image' => 'm-e1',
		'rank_order' => 16,
		'rank_class' => 3),
	array(
		'rank_name' => 'Able Crewman',
		'rank_short_name' => 'ABCR',
		'rank_image' => 'r-e1',
		'rank_order' => 16,
		'rank_class' => 4),
	array(
		'rank_name' => 'Private',
		'rank_short_name' => 'PVT',
		'rank_image' => 'b-e1',
		'rank_order' => 16,
		'rank_class' => 5),
	array(
		'rank_name' => 'Able Crewman',
		'rank_short_name' => 'ABCR',
		'rank_image' => 'c-e1',
		'rank_order' => 16,
		'rank_class' => 6),
	array(
		'rank_name' => 'Able Crewman',
		'rank_short_name' => 'ABCR',
		'rank_image' => 'd-e1',
		'rank_order' => 16,
		'rank_class' => 7),
	array(
		'rank_name' => 'Able Crewman',
		'rank_short_name' => 'ABCR',
		'rank_image' => 'g-e1',
		'rank_order' => 16,
		'rank_class' => 8),
	array(
		'rank_name' => 'Able Crewman',
		'rank_short_name' => 'ABCR',
		'rank_image' => 'p-e1',
		'rank_order' => 16,
		'rank_class' => 9),
	array(
		'rank_name' => 'Able Crewman',
		'rank_short_name' => 'ABCR',
		'rank_image' => 's-e1',
		'rank_order' => 16,
		'rank_class' => 10),
	array(
		'rank_name' => 'Able Crewman',
		'rank_short_name' => 'ABCR',
		'rank_image' => 'v-e1',
		'rank_order' => 16,
		'rank_class' => 11),
		
	array(
		'rank_name' => '',
		'rank_short_name' => '',
		'rank_image' => 'w-blank',
		'rank_order' => 17,
		'rank_class' => 1),
	array(
		'rank_name' => '',
		'rank_short_name' => '',
		'rank_image' => 'y-blank',
		'rank_order' => 17,
		'rank_class' => 2),
	array(
		'rank_name' => '',
		'rank_short_name' => '',
		'rank_image' => 'm-blank',
		'rank_order' => 17,
		'rank_class' => 3),
	array(
		'rank_name' => '',
		'rank_short_name' => '',
		'rank_image' => 'r-blank',
		'rank_order' => 17,
		'rank_class' => 4),
	array(
		'rank_name' => '',
		'rank_short_name' => '',
		'rank_image' => 'b-blank',
		'rank_order' => 17,
		'rank_class' => 5),
	array(
		'rank_name' => '',
		'rank_short_name' => '',
		'rank_image' => 'c-blank',
		'rank_order' => 17,
		'rank_class' => 6),
	array(
		'rank_name' => '',
		'rank_short_name' => '',
		'rank_image' => 'd-blank',
		'rank_order' => 17,
		'rank_class' => 7),
	array(
		'rank_name' => '',
		'rank_short_name' => '',
		'rank_image' => 'g-blank',
		'rank_order' => 17,
		'rank_class' => 8),
	array(
		'rank_name' => '',
		'rank_short_name' => '',
		'rank_image' => 'p-blank',
		'rank_order' => 17,
		'rank_class' => 9),
	array(
		'rank_name' => '',
		'rank_short_name' => '',
		'rank_image' => 's-blank',
		'rank_order' => 17,
		'rank_class' => 10),
	array(
		'rank_name' => '',
		'rank_short_name' => '',
		'rank_image' => 'v-blank',
		'rank_order' => 17,
		'rank_class' => 11),
);

$positions = array(
	array(
		'pos_name' => 'Commanding Officer',
		'pos_desc' => "Ultimately responsible for the ship and crew, the Commanding Officer is the most senior officer aboard a vessel. S/he is responsible for carrying out the orders of Starfleet, and for representing both Starfleet and the Federation.",
		'pos_dept' => 1,
		'pos_order' => 0,
		'pos_open' => 1,
		'pos_type' => 'senior'),
	array(
		'pos_name' => 'First Officer',
		'pos_desc' => "The liaison between captain and crew, the First Officer acts as the disciplinarian, personnel manager, advisor to the captain, and much more. S/he is also one of only two officers, along with the Chief Medical Officer, that can remove a Commanding Officer from duty.",
		'pos_dept' => 1,
		'pos_order' => 1,
		'pos_open' => 1,
		'pos_type' => 'senior'),
	array(
		'pos_name' => 'Chief of the Boat',
		'pos_desc' => "The senior-most Chief Petty Officer (including Senior and Master Chiefs), regardless of rating, is designated by the Commanding Officer as the Chief of the Boat (for vessels) or Command Chief (for starbases). In addition to his or her departmental responsibilities, the COB/CC performs the following duties: serves as a liaison between the Commanding Officer (or Executive Officer) and the enlisted crewmen; ensures enlisted crews understand Command policies; advises the Commanding Officer and Executive Officer regarding enlisted morale, and evaluates the quality of noncommissioned officer leadership, management, and supervisory training.\r\n\r\nThe COB/CC works with the other department heads, Chiefs, supervisors, and crewmen to insure discipline is equitably maintained, and the welfare, morale, and health needs of the enlisted personnel are met. The COB/CC is qualified to temporarily act as Commanding or Executive Officer if so ordered.",
		'pos_dept' => 1,
		'pos_order' => 2,
		'pos_open' => 1,
		'pos_type' => 'enlisted'),
	array(
		'pos_name' => 'Yeoman',
		'pos_desc' => "The Captain's Yeoman is for Petty Officers who wish to continue as administrators. It is technically a non-Mate position. Use of this position is completely at the discretion of the Commanding Officer. File work, and sensitive message transport are but two examples of the Yeoman's possible duties. The Yeoman assists the CO in day-to-day duties that the CO would otherwise not have the time to do.",
		'pos_dept' => 1,
		'pos_order' => 3,
		'pos_open' => 1,
		'pos_type' => 'enlisted'),
	array(
		'pos_name' => 'Chief Helmsman',
		'pos_desc' => "A Helm Officer must always be present on the bridge of a starship. S/he plots courses, supervises the computers piloting, corrects any flight deviations and pilots the ship manually when needed. The Chief Helmsman is the senior most Helm Officer aboard, serving as a Senior Officer, and chief of the personnel under him/her.",
		'pos_dept' => 2,
		'pos_order' => 0,
		'pos_open' => 1,
		'pos_type' => 'senior'),
	array(
		'pos_name' => 'Chief Navigator',
		'pos_desc' => "The Chief Navigator is the seniormost navigator on the ship and is responsible for all navigators aboard the vessel. Responsibilities of the navigators is include projecting the course of a starship and determining a ship's position, velocity and direction in relationship to a course. The navigator can also use the ship's navigational sensors to determine the positions, speeds and trajectories of other objects. Additionally, the navigator is in charge of coordinating phaser crews for real and simulated combat and for firing the weapons.",
		'pos_dept' => 2,
		'pos_order' => 1,
		'pos_open' => 1,
		'pos_type' => 'senior'),
	array(
		'pos_name' => 'Helmsman',
		'pos_desc' => "A Helm Officer must always be present on the bridge of a starship, and every vessel has a number of Helm Officers to allow shift rotations. S/he plots courses, supervises the computers piloting, corrects any flight deviations and pilots the ship manually when needed. Helm Officers report to the Chief Helmsman.",
		'pos_dept' => 2,
		'pos_order' => 2,
		'pos_open' => 4,
		'pos_type' => 'officer'),
	array(
		'pos_name' => 'Navigator',
		'pos_desc' => "The Navigator is responsible for projecting the course of a starship and determining a ship's position, velocity and direction in relationship to a course. The navigator can also use the ship's navigational sensors to determine the positions, speeds and trajectories of other objects. Additionally, the navigator is in charge of coordinating phaser crews for real and simulated combat and for firing the weapons.",
		'pos_dept' => 2,
		'pos_order' => 3,
		'pos_open' => 4,
		'pos_type' => 'officer'),
	array(
		'pos_name' => 'Shuttle Pilot',
		'pos_desc' => "All small spacecrafts aboard a starship, starbase or a facility are flown by Shuttle Pilots. This is often the proving ground for pilots until they earn a berth on a starship as a Helmsman or Navigator. They report to the Chief Helmsman.",
		'pos_dept' => 2,
		'pos_order' => 4,
		'pos_open' => 2,
		'pos_type' => 'enlisted'),
	array(
		'pos_name' => 'Chief Communications Officer',
		'pos_desc' => "Responsible for maintaining and upgrading the universal translator, controls the intercom and responsible for coordinating communications with other ships, stations or colonies/planets.",
		'pos_dept' => 3,
		'pos_order' => 0,
		'pos_open' => 1,
		'pos_type' => 'senior'),
	array(
		'pos_name' => 'Communications Officer',
		'pos_desc' => "The Communications officer is responsible for managing all incoming and outgoing transmissions. This role involves the study of new and old languages and text in an attempt to better understand and interpret their meaning.",
		'pos_dept' => 3,
		'pos_order' => 1,
		'pos_open' => 4,
		'pos_type' => 'officer'),
	array(
		'pos_name' => 'Chief Security Officer',
		'pos_desc' => "Her/his duty is to ensure the safety of ship and crew. Some take it as their personal duty to protect the Commanding Officer/First Officer on away teams. She/he is also responsible for people under arrest and the safety of guests, liked or not. S/he also is a department head and a member of the senior staff, responsible for all the crew members in her/his department and duty rosters.",
		'pos_dept' => 4,
		'pos_order' => 0,
		'pos_open' => 1,
		'pos_type' => 'senior'),
	array(
		'pos_name' => 'Security Officer',
		'pos_desc' => "There are several Security Officers aboard each vessel. They are assigned to their duties by the Chief of Security and mostly guard sensitive areas, protect people, patrol, and handle other threats to the Federation.",
		'pos_dept' => 4,
		'pos_order' => 1,
		'pos_open' => 5,
		'pos_type' => 'officer'),
	array(
		'pos_name' => 'Tactical Officer',
		'pos_desc' => "There are several Tactical Officers aboard each vessel. They are assigned to their duties by the Security Chief and handle all weapons aboard the ship, including manning tactical stations during armed space combat.",
		'pos_dept' => 4,
		'pos_order' => 2,
		'pos_open' => 3,
		'pos_type' => 'officer'),
	array(
		'pos_name' => 'Security Investigations Officer',
		'pos_desc' => "The Security Investigations Officer is an Enlisted Officer. S/He fulfills the role of a special investigator or detective when dealing with Starfleet matters aboard ship or on a planet. Coordinates with the Chief Armory Officer on all investigations as needed. The Security Investigations Officer reports to the Chief Armory Officer.",
		'pos_dept' => 4,
		'pos_order' => 5,
		'pos_open' => 2,
		'pos_type' => 'enlisted'),
	array(
		'pos_name' => 'Brig Officer',
		'pos_desc' => "The Brig Officer is an Armory Officer who has chosen to specialize in a specific role. S/he guards the brig and its cells. But there are other duties associated with this post as well. S/he is responsible for any prisoner transport, and the questioning of prisoners.",
		'pos_dept' => 4,
		'pos_order' => 10,
		'pos_open' => 5,
		'pos_type' => 'enlisted'),
	array(
		'pos_name' => 'Master-at-Arms',
		'pos_desc' => "The Master-at-Arms trains and supervises Armory crewmen in departmental operations, repairs, and protocols; maintains duty assignments for all Armory personnel; supervises weapons locker access and firearm deployment; and is qualified to temporarily act as Chief Armory Officer if so ordered. The Master-at-Arms reports to the Chief Armory Officer.",
		'pos_dept' => 4,
		'pos_order' => 15,
		'pos_open' => 1,
		'pos_type' => 'enlisted'),
	array(
		'pos_name' => 'Chief Engineer',
		'pos_desc' => "The Chief Engineer is responsible for the condition of all systems and equipment on board a Starfleet ship or facility. S/he oversees maintenance, repairs and upgrades of all equipment. S/he is also responsible for the many repairs teams during crisis situations.\r\n\r\nThe Chief Engineer is not only the department head but also a senior officer, responsible for all the crew members in her/his department and maintenance of the duty rosters.",
		'pos_dept' => 5,
		'pos_order' => 0,
		'pos_open' => 1,
		'pos_type' => 'senior'),
	array(
		'pos_name' => 'Assistant Chief Engineer',
		'pos_desc' => "The Assistant Chief Engineer assists the Chief Engineer in the daily work; in issues regarding mechanical, administrative matters and co-ordinating repairs with other departments.\r\n\r\nIf so required, the Assistant Chief Engineer must be able to take over as Chief Engineer, and thus must be versed in current information regarding the ship or facility.",
		'pos_dept' => 5,
		'pos_order' => 1,
		'pos_open' => 1,
		'pos_type' => 'officer'),
	array(
		'pos_name' => 'Engineer',
		'pos_desc' => "There are several non-specialized engineers aboard of each vessel. They are assigned to their duties by the Chief Engineer and his Assistant, performing a number of different tasks as required, i.e. general maintenance and repair. Generally, engineers as assigned to more specialized engineering person to assist in there work is so requested by the specialized engineer.",
		'pos_dept' => 5,
		'pos_order' => 5,
		'pos_open' => 10,
		'pos_type' => 'officer'),
	array(
		'pos_name' => 'Damage Control Specialist',
		'pos_desc' => "The Damage Control Specialist is a specialized Engineer. The Damage Control Specialist controls all damage control aboard the ship when it gets damaged in battle. S/he oversees all damage repair aboard the ship, and coordinates repair teams on the smaller jobs so the Chief Engineer can worry about other matters.\r\n\r\nA small team is assigned to the Damage Control Specialist which is made up from NCO personnel assigned by the Assistant and Chief Engineer. The Damage Control Specialist reports to the Assistant and Chief Engineer.",
		'pos_dept' => 5,
		'pos_order' => 10,
		'pos_open' => 5,
		'pos_type' => 'enlisted'),
	array(
		'pos_name' => 'Chief Science Officer',
		'pos_desc' => "The Chief Science Officer is responsible for all the scientific data the ship/facility collects, and the distribution of such data to specific section within the department for analysis. S/he is also responsible with providing the ship's captain with scientific information needed for command decisions.\r\n\r\nS/he also is a department head and a member of the Senior Staff and responsible for all the crew members in her/his department and duty rosters.",
		'pos_dept' => 6,
		'pos_order' => 0,
		'pos_open' => 1,
		'pos_type' => 'senior'),
	array(
		'pos_name' => 'Science Officer',
		'pos_desc' => "There are several general Science Officers aboard each vessel. They are assigned to their duties by the Chief Science Officer and his Assistant. Assignments include work for the Specialized Section heads, as well as duties for work being carried out by the Chief.",
		'pos_dept' => 6,
		'pos_order' => 5,
		'pos_open' => 5,
		'pos_type' => 'officer'),
	array(
		'pos_name' => 'Chief Medical Officer',
		'pos_desc' => "The Chief Medical Officer is responsible for the physical health of the entire crew, but does more than patch up injured crew members. His/her function is to ensure that they do not get sick or injured to begin with, and to this end monitors their health and conditioning with regular check ups. If necessary, the Chief Medical Officer can remove anyone from duty, even a Commanding Officer. Besides this s/he is available to provide medical advice to any individual who requests it.",
		'pos_dept' => 7,
		'pos_order' => 0,
		'pos_open' => 1,
		'pos_type' => 'senior'),
	array(
		'pos_name' => 'Counselor',
		'pos_desc' => "Because of their training in psychology, technically the ship's/facility's Counselor is considered part of Starfleet Medical. The Counselor is responsible both for advising the Commanding Officer in dealing with other people and races, and in helping crew members with personal, psychological, and emotional problems.\r\n\r\nThe Counselor reports to the Chief Medical Officer.",
		'pos_dept' => 7,
		'pos_order' => 2,
		'pos_open' => 1,
		'pos_type' => 'officer'),
	array(
		'pos_name' => 'Medical Officer',
		'pos_desc' => "Medical Officer undertake the majority of the work aboard the ship/facility, examining the crew, and administering medical care under the instruction of the Chief Medical Officer.",
		'pos_dept' => 7,
		'pos_order' => 5,
		'pos_open' => 5,
		'pos_type' => 'officer'),
	array(
		'pos_name' => 'Nurse',
		'pos_desc' => "Nurses are trained in basic medical care, and are capable of dealing with less serious medical cases. In more serious matters the nurse assist the medical officer in the examination and administration of medical care, be this injecting required drugs, or simply assuring the injured party that they will be ok. The Nurses also maintain the medical wards, overseeing the patients and ensuring they are receiving medication and care as instructed by the Medical Officer.",
		'pos_dept' => 7,
		'pos_order' => 10,
		'pos_open' => 10,
		'pos_type' => 'enlisted')
);

$catalogue_ranks = array(
	array(
		'rankcat_name' => 'Duty Uniforms',
		'rankcat_location' => 'default',
		'rankcat_credits' => "The Star Trek Movie era rank sets used in Nova were created by Kuro-chan of Kuro-RPG. The ranksets can be found at <a href='http://www.kuro-rpg.net' target='_blank''>Kuro-RPG</a>. Please do not copy or modify the images.",
		'rankcat_default' => 'y',
		'rankcat_genre' => $g)
);

/* End of file install_data_mov.php */
/* Location: ./application/assets/install/install_data_mov.php */