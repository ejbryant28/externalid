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
 * Form for editing HTML block instances.
 *
 * @package   block_externalid
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 class block_externalid extends block_base {

    function init() {
        $this->title = get_string('pluginname', 'block_externalid');
    }

    function has_config() {
        return true;
    }
    
    function add_external_id_field() {
        require_once($CFG->dirroot.'/user/profile/definelib.php');

        $description = ["text" => "temp description", "format" => 1];
        $newfieldparams = new stdClass;
        $newfieldparams->shortname = 'externalid';
        $newfieldparams->name= 'External ID';
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
    function get_content() {
        global $USER;

        if ($this->content !== NULL) {
            return $this->content;
        }

        $externalid = profile_user_record($USER->id)->externalid;

        $this->content = new stdClass;
        $this->content->text = $externalid;
        $this->content->footer = 'Goodbye, World';
        return $this->content;
    }
}