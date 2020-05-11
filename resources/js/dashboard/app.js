// origin + pathname because the href may contain query parameters (this for the case of the home page only as the other we are going to match by regex)
currentRoute = location.origin + location.pathname.replace(/\/*$/,'');

$ = jQuery = require('jquery');
// require('../../../vendor/proengsoft/laravel-jsvalidation/public/js/jsvalidation.js');
require('bootstrap3');
Swal = require('sweetalert2');
require('select2');
require('admin-lte');
require('icheck');
require('bootstrap-datepicker');

require('datatables.net-bs');

require('./functions.js')();
require('./custom.js')();
