//$(function() {
//$(window).load(function() {
$(document).ready(function(){
//jQuery(window).load(function(){

    
    var $grid = $('.grid').packery({
        // options
        itemSelector: '.grid-item',
    });
       
    $grid.imagesLoaded().progress( function() {
        $grid.packery();
        //$grid.packery('layout');
        //$grid.packery('reloadItems');
    });
    
    
/*
    var $grid = $('.grid').imagesLoaded( function() {
        // init Packery after all images have loaded
        $grid.packery({
            // options...
            itemSelector: '.grid-item',
            columnWidth: '.grid-sizer',
            percentPosition: true
        });
        $grid.packery('layout');
    });
    
    */


/*
    var $grid = $('.grid').packery({
    // options
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer',
    percentPosition: true
    //gutter: 10
    });
    
    $grid.packery('layout');
    
    $grid.imagesLoaded().progress( function() {
        $grid.packery();
    });
    */
    
});