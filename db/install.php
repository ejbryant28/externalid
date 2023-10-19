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
 * Externalid block installation.
 *
 * @package    externalid
 * @copyright  2023 EJ Bryant <ejbryant28@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Perform the post-install procedures.
 */
function xmldb_block_externalid_install() {
    global $CFG;
    require_once($CFG->dirroot.'/user/profile/definelib.php');

    $description = ["text" => "temp description", "format" => 1];
    $newfieldparams = new stdClass;
    $newfieldparams->shortname = 'externalid';
    $newfieldparams->name = 'External ID';
    $newfieldparams->datatype = 'text';
    $newfieldparams->description = $description;
    $newfieldparams->categoryid = 2;
    $newfieldparams->sortorder = 9;
    $newfieldparams->required = 1;
    $newfieldparams->locked = 0;
    $newfieldparams->visible = 1;
    $newfieldparams->forceunique = 0;
    $newfieldparams->signup = 0;
    $newfieldparams->defaultdata = 'ABC123';
    $newfieldparams->defaultdataformat = 0;
    $newfieldparams->param1 = 30;
    $newfieldparams->param2 = 2048;
    $newfieldparams->param3 = 0;

    profile_save_field($newfieldparams, []);

    return $newfieldparams;

}
