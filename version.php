<?php
// This file is part of Klassenbuch module for Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Klassenbuch plugin version info
 *
 * @package    mod_klassenbuch
 * @copyright  2012 Synergy Learning / Davo Smith (based on book module)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$module->version   = 2013070800; // The current module version (Date: YYYYMMDDXX).
$module->requires  = 2011120500; // Requires this Moodle version.
$module->cron      = 0;          // Period for cron to check this module (secs).
$module->component = 'mod_klassenbuch'; // Full name of the plugin (used for diagnostics).

$module->maturity  = MATURITY_STABLE;
$module->release   = "2.2 (2013070800)"; // User-friendly version number.
