<?php
// This file is part of Klassenbuch plugin for Moodle - http://moodle.org/
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
 * HTML import lib
 *
 * @package    klassenbuchtool
 * @subpackage teacherimport
 * @copyright  2011 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

function klassenbuchtool_teacherimport_extend_settings_navigation(settings_navigation $settingsnav,
                                                                  navigation_node $klassenbuchnode) {
    global $USER, $PAGE, $CFG, $DB, $OUTPUT;

    if ($PAGE->cm->modname !== 'klassenbuch') {
        return;
    }

    $context = context_module::instance($PAGE->cm->id);

    if (has_capability('klassenbuchtool/teacherimport:import', $context)) {
        $url = new moodle_url('/mod/klassenbuch/tool/teacherimport/index.php', array('id' => $PAGE->cm->id));
        $klassenbuchnode->add(get_string('import', 'klassenbuchtool_teacherimport'), $url, navigation_node::TYPE_SETTING,
                              null, null, null);
    }
}