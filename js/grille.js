var $grid = $('.grid').packery({
  // options
  itemSelector: '.grid-item',
columnWidth: '.grid-sizer',
  percentPosition: true
  //gutter: 10
});

$grid.packery('layout');