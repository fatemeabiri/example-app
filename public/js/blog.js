// require('./bootstrap');
$(document).ready(function(){
   // alert(2);
    $('#myTab a[href="#profile"]').tab('show') // Select tab by name
    $('#myTab li:first-child a').tab('show') // Select first tab
    $('#myTab li:last-child a').tab('show') // Select last tab
    $('#myTab li:nth-child(3) a').tab('show') // Select third tab
    $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show');
        alert(2);
    })
});
