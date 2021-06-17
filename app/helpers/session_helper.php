<?php
	session_start();
	/**
	 * @return bool
	 * Check si l'utilisateur est connecté via le cookie dee seession
	 */
	function isLoggedIn() {
		if (isset($_SESSION['profile_id'])) {
			return true;
		} else {
			return false;
		}
	}

    function isAdmin() {
        if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
            return true;
        } else {
            return false;
        }
    }
