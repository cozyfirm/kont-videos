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
import './admin/blog/blog.js';
import './admin/reviews/review.js';

/* Episodes JS */
import './public-part/app/episodes/review.js';
import './public-part/app/episodes/notes.js';
import './public-part/app/episodes/trailer.js';

// /* Mqtt scripts */
// import './public-part/app/mqtt/live.js';

/* Public app */
import './public-part/app/blog/blog.js';
import './public-part/app/pages/contact/contact-us.js';
$(document).ready(function() {
    $(".datepicker").datepicker({
        format: 'dd.mm.yyyy',
        autoclose: true,
    }); // Initialize the datepicker
});
