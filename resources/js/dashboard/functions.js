module.exports = function() { 
    this.submitLogoutForm = function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    };
}