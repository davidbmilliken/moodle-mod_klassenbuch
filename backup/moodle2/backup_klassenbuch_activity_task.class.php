<?php
// This file is part of Moodle - http://moodle.org/
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
 * Description of klassenbuch backup task
 *
 * @package    mod_klassenbuch
 * @copyright  2010-2011 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;
global $CFG;
require_once($CFG->dirroot.'/mod/klassenbuch/backup/moodle2/backup_klassenbuch_stepslib.php');    // Because it exists (must).
require_once($CFG->dirroot.'/mod/klassenbuch/backup/moodle2/backup_klassenbuch_settingslib.php'); // Because it exists (optional).

/**
 * klassenbuch backup task that provides all the settings and steps to perform one
 * complete backup of the activity
 */
class backup_klassenbuch_activity_task extends backup_activity_task {

    /**
     * Define (add) particular settings this activity can have
     *
     * @return void
     */
    protected function define_my_settings() {
        // No particular settings for this activity.
    }

    /**
     * Define (add) particular steps this activity can have
     *
     * @return void
     */
    protected function define_my_steps() {
        // Klassenbuch only has one structure step.
        $this->add_step(new backup_klassenbuch_activity_structure_step('klassenbuch_structure', 'klassenbuch.xml'));
    }

    /**
     * Code the transformations to perform in the activity in
     * order to get transportable (encoded) links
     *
     * @param string $content
     * @return string encoded content
     */
    static public function encode_content_links($content) {
        global $CFG;

        $base = preg_quote($CFG->wwwroot, "/");

        // Link to the list of klassenbuchs.
        $search  = "/($base\/mod\/klassenbuch\/index.php\?id=)([0-9]+)/";
        $content = preg_replace($search, '$@KLASSENBUCHINDEX*$2@$', $content);

        // Link to klassenbuch view by moduleid.
        $search  = "/($base\/mod\/klassenbuch\/view.php\?id=)([0-9]+)(&|&amp;)chapterid=([0-9]+)/";
        $content = preg_replace($search, '$@KLASSENBUCHVIEWBYIDCH*$2*$4@$', $content);

        $search  = "/($base\/mod\/klassenbuch\/view.php\?id=)([0-9]+)/";
        $content = preg_replace($search, '$@KLASSENBUCHVIEWBYID*$2@$', $content);

        // Link to klassenbuch view by klassenbuchid.
        $search  = "/($base\/mod\/klassenbuch\/view.php\?b=)([0-9]+)(&|&amp;)chapterid=([0-9]+)/";
        $content = preg_replace($search, '$@KLASSENBUCHVIEWBYBCH*$2*$4@$', $content);

        $search  = "/($base\/mod\/klassenbuch\/view.php\?b=)([0-9]+)/";
        $content = preg_replace($search, '$@KLASSENBUCHVIEWBYB*$2@$', $content);

        return $content;
    }
}
