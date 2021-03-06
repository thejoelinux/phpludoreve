<?php
/*
This file is part of phpLudoreve.

    phpLudoreve is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    (at your option) any later version.

    phpLudoreve is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with phpLudoreve.  If not, see <http://www.gnu.org/licenses/>.
*/

// controller 
$render = "list";

switch($_REQUEST["a"]) {
	case "new":
		$subscription = new Subscription(0);
		$subscription->member_id = $_REQUEST["i"];
		$_REQUEST["i"] = 0;
		$render = "subscriptions/edit";
	break;

	case "edit":
		try {
			$subscription = Subscription::fetch($data->db_escape_string($_REQUEST["i"]));
			if($subscription->id != 0) {
				$render = "subscriptions/edit";
			} else {
				$render = "subscriptions/not_found"; // TODO
			}
		} catch(data_exception $e) {
			$render = "data_exception";
		}
	break;
}	
// view part
include("views/".$render.".php");
?>
