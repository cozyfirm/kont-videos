import './bootstrap';

// import 'jquery-ui/ui/widgets/datepicker'; // Make sure this line is present
// import 'jquery-ui/themes/base/theme.css'; // Optional: Include the theme CSS

import 'bootstrap-datepicker/dist/css/bootstrap-datepicker.css';
import 'bootstrap-datepicker';

import { Player } from 'player.js';

// Set playerjs globally
window.playerjs = { Player };


/* Import Admin JavaScript data */
import './admin/layout/menu.js';
import './admin/layout/filters.js';


/* Import Submit script */
import "./style/submit.js";
import "./public-part/app/users/profile-photo.js";

/**
 *  Import public scripts such as:
 *      1. Auth scripts
 *      2. Layout scripts
 *      3. App scripts
 */

import './public-part/auth/auth.js';
import './public-part/app/layout/menu.js';
import './public-part/app/layout/accordion.js';
import './public-part/app/shared/episodes.js';

import './public-part/app/player/player.js';


$(document).ready(function() {
    $(".datepicker").datepicker({
        format: 'mm.dd.yyyy',
        autoclose: true,
    }); // Initialize the datepicker
});