var field = document.querySelector('[name="username"]');

field.onkeypress = function(e){
    var key = e.keyCode;
    return (key!== 32);
};
field.onpaste = function(e){
    e.preventDefault();
};
