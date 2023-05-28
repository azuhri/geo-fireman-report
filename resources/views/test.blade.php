<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">  
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    @vite('resources/css/app.css')  
    <title>Welcome To Cleopatra</title>
  <style id="apexcharts-css">@keyframes opaque {
    0% {
        opacity: 0
    }
  
    to {
        opacity: 1
    }
  }
  
  @keyframes resizeanim {
    0%,to {
        opacity: 0
    }
  }
  
  .apexcharts-canvas {
    position: relative;
    user-select: none
  }
  
  .apexcharts-canvas ::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 6px
  }
  
  .apexcharts-canvas ::-webkit-scrollbar-thumb {
    border-radius: 4px;
    background-color: rgba(0,0,0,.5);
    box-shadow: 0 0 1px rgba(255,255,255,.5);
    -webkit-box-shadow: 0 0 1px rgba(255,255,255,.5)
  }
  
  .apexcharts-inner {
    position: relative
  }
  
  .apexcharts-text tspan {
    font-family: inherit
  }
  
  .legend-mouseover-inactive {
    transition: .15s ease all;
    opacity: .2
  }
  
  .apexcharts-legend-text {
    padding-left: 15px;
    margin-left: -15px;
  }
  
  .apexcharts-series-collapsed {
    opacity: 0
  }
  
  .apexcharts-tooltip {
    border-radius: 5px;
    box-shadow: 2px 2px 6px -4px #999;
    cursor: default;
    font-size: 14px;
    left: 62px;
    opacity: 0;
    pointer-events: none;
    position: absolute;
    top: 20px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    white-space: nowrap;
    z-index: 12;
    transition: .15s ease all
  }
  
  .apexcharts-tooltip.apexcharts-active {
    opacity: 1;
    transition: .15s ease all
  }
  
  .apexcharts-tooltip.apexcharts-theme-light {
    border: 1px solid #e3e3e3;
    background: rgba(255,255,255,.96)
  }
  
  .apexcharts-tooltip.apexcharts-theme-dark {
    color: #fff;
    background: rgba(30,30,30,.8)
  }
  
  .apexcharts-tooltip * {
    font-family: inherit
  }
  
  .apexcharts-tooltip-title {
    padding: 6px;
    font-size: 15px;
    margin-bottom: 4px
  }
  
  .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
    background: #eceff1;
    border-bottom: 1px solid #ddd
  }
  
  .apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
    background: rgba(0,0,0,.7);
    border-bottom: 1px solid #333
  }
  
  .apexcharts-tooltip-text-goals-value,.apexcharts-tooltip-text-y-value,.apexcharts-tooltip-text-z-value {
    display: inline-block;
    margin-left: 5px;
    font-weight: 600
  }
  
  .apexcharts-tooltip-text-goals-label:empty,.apexcharts-tooltip-text-goals-value:empty,.apexcharts-tooltip-text-y-label:empty,.apexcharts-tooltip-text-y-value:empty,.apexcharts-tooltip-text-z-value:empty,.apexcharts-tooltip-title:empty {
    display: none
  }
  
  .apexcharts-tooltip-text-goals-label,.apexcharts-tooltip-text-goals-value {
    padding: 6px 0 5px
  }
  
  .apexcharts-tooltip-goals-group,.apexcharts-tooltip-text-goals-label,.apexcharts-tooltip-text-goals-value {
    display: flex
  }
  
  .apexcharts-tooltip-text-goals-label:not(:empty),.apexcharts-tooltip-text-goals-value:not(:empty) {
    margin-top: -6px
  }
  
  .apexcharts-tooltip-marker {
    width: 12px;
    height: 12px;
    position: relative;
    top: 0;
    margin-right: 10px;
    border-radius: 50%
  }
  
  .apexcharts-tooltip-series-group {
    padding: 0 10px;
    display: none;
    text-align: left;
    justify-content: left;
    align-items: center
  }
  
  .apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
    opacity: 1
  }
  
  .apexcharts-tooltip-series-group.apexcharts-active,.apexcharts-tooltip-series-group:last-child {
    padding-bottom: 4px
  }
  
  .apexcharts-tooltip-series-group-hidden {
    opacity: 0;
    height: 0;
    line-height: 0;
    padding: 0!important
  }
  
  .apexcharts-tooltip-y-group {
    padding: 6px 0 5px
  }
  
  .apexcharts-custom-tooltip,.apexcharts-tooltip-box {
    padding: 4px 8px
  }
  
  .apexcharts-tooltip-boxPlot {
    display: flex;
    flex-direction: column-reverse
  }
  
  .apexcharts-tooltip-box>div {
    margin: 4px 0
  }
  
  .apexcharts-tooltip-box span.value {
    font-weight: 700
  }
  
  .apexcharts-tooltip-rangebar {
    padding: 5px 8px
  }
  
  .apexcharts-tooltip-rangebar .category {
    font-weight: 600;
    color: #777
  }
  
  .apexcharts-tooltip-rangebar .series-name {
    font-weight: 700;
    display: block;
    margin-bottom: 5px
  }
  
  .apexcharts-xaxistooltip,.apexcharts-yaxistooltip {
    opacity: 0;
    pointer-events: none;
    color: #373d3f;
    font-size: 13px;
    text-align: center;
    border-radius: 2px;
    position: absolute;
    z-index: 10;
    background: #eceff1;
    border: 1px solid #90a4ae
  }
  
  .apexcharts-xaxistooltip {
    padding: 9px 10px;
    transition: .15s ease all
  }
  
  .apexcharts-xaxistooltip.apexcharts-theme-dark {
    background: rgba(0,0,0,.7);
    border: 1px solid rgba(0,0,0,.5);
    color: #fff
  }
  
  .apexcharts-xaxistooltip:after,.apexcharts-xaxistooltip:before {
    left: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none
  }
  
  .apexcharts-xaxistooltip:after {
    border-color: transparent;
    border-width: 6px;
    margin-left: -6px
  }
  
  .apexcharts-xaxistooltip:before {
    border-color: transparent;
    border-width: 7px;
    margin-left: -7px
  }
  
  .apexcharts-xaxistooltip-bottom:after,.apexcharts-xaxistooltip-bottom:before {
    bottom: 100%
  }
  
  .apexcharts-xaxistooltip-top:after,.apexcharts-xaxistooltip-top:before {
    top: 100%
  }
  
  .apexcharts-xaxistooltip-bottom:after {
    border-bottom-color: #eceff1
  }
  
  .apexcharts-xaxistooltip-bottom:before {
    border-bottom-color: #90a4ae
  }
  
  .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after,.apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
    border-bottom-color: rgba(0,0,0,.5)
  }
  
  .apexcharts-xaxistooltip-top:after {
    border-top-color: #eceff1
  }
  
  .apexcharts-xaxistooltip-top:before {
    border-top-color: #90a4ae
  }
  
  .apexcharts-xaxistooltip-top.apexcharts-theme-dark:after,.apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
    border-top-color: rgba(0,0,0,.5)
  }
  
  .apexcharts-xaxistooltip.apexcharts-active {
    opacity: 1;
    transition: .15s ease all
  }
  
  .apexcharts-yaxistooltip {
    padding: 4px 10px
  }
  
  .apexcharts-yaxistooltip.apexcharts-theme-dark {
    background: rgba(0,0,0,.7);
    border: 1px solid rgba(0,0,0,.5);
    color: #fff
  }
  
  .apexcharts-yaxistooltip:after,.apexcharts-yaxistooltip:before {
    top: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none
  }
  
  .apexcharts-yaxistooltip:after {
    border-color: transparent;
    border-width: 6px;
    margin-top: -6px
  }
  
  .apexcharts-yaxistooltip:before {
    border-color: transparent;
    border-width: 7px;
    margin-top: -7px
  }
  
  .apexcharts-yaxistooltip-left:after,.apexcharts-yaxistooltip-left:before {
    left: 100%
  }
  
  .apexcharts-yaxistooltip-right:after,.apexcharts-yaxistooltip-right:before {
    right: 100%
  }
  
  .apexcharts-yaxistooltip-left:after {
    border-left-color: #eceff1
  }
  
  .apexcharts-yaxistooltip-left:before {
    border-left-color: #90a4ae
  }
  
  .apexcharts-yaxistooltip-left.apexcharts-theme-dark:after,.apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
    border-left-color: rgba(0,0,0,.5)
  }
  
  .apexcharts-yaxistooltip-right:after {
    border-right-color: #eceff1
  }
  
  .apexcharts-yaxistooltip-right:before {
    border-right-color: #90a4ae
  }
  
  .apexcharts-yaxistooltip-right.apexcharts-theme-dark:after,.apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
    border-right-color: rgba(0,0,0,.5)
  }
  
  .apexcharts-yaxistooltip.apexcharts-active {
    opacity: 1
  }
  
  .apexcharts-yaxistooltip-hidden {
    display: none
  }
  
  .apexcharts-xcrosshairs,.apexcharts-ycrosshairs {
    pointer-events: none;
    opacity: 0;
    transition: .15s ease all
  }
  
  .apexcharts-xcrosshairs.apexcharts-active,.apexcharts-ycrosshairs.apexcharts-active {
    opacity: 1;
    transition: .15s ease all
  }
  
  .apexcharts-ycrosshairs-hidden {
    opacity: 0
  }
  
  .apexcharts-selection-rect {
    cursor: move
  }
  
  .svg_select_boundingRect,.svg_select_points_rot {
    pointer-events: none;
    opacity: 0;
    visibility: hidden
  }
  
  .apexcharts-selection-rect+g .svg_select_boundingRect,.apexcharts-selection-rect+g .svg_select_points_rot {
    opacity: 0;
    visibility: hidden
  }
  
  .apexcharts-selection-rect+g .svg_select_points_l,.apexcharts-selection-rect+g .svg_select_points_r {
    cursor: ew-resize;
    opacity: 1;
    visibility: visible
  }
  
  .svg_select_points {
    fill: #efefef;
    stroke: #333;
    rx: 2
  }
  
  .apexcharts-svg.apexcharts-zoomable.hovering-zoom {
    cursor: crosshair
  }
  
  .apexcharts-svg.apexcharts-zoomable.hovering-pan {
    cursor: move
  }
  
  .apexcharts-menu-icon,.apexcharts-pan-icon,.apexcharts-reset-icon,.apexcharts-selection-icon,.apexcharts-toolbar-custom-icon,.apexcharts-zoom-icon,.apexcharts-zoomin-icon,.apexcharts-zoomout-icon {
    cursor: pointer;
    width: 20px;
    height: 20px;
    line-height: 24px;
    color: #6e8192;
    text-align: center
  }
  
  .apexcharts-menu-icon svg,.apexcharts-reset-icon svg,.apexcharts-zoom-icon svg,.apexcharts-zoomin-icon svg,.apexcharts-zoomout-icon svg {
    fill: #6e8192
  }
  
  .apexcharts-selection-icon svg {
    fill: #444;
    transform: scale(.76)
  }
  
  .apexcharts-theme-dark .apexcharts-menu-icon svg,.apexcharts-theme-dark .apexcharts-pan-icon svg,.apexcharts-theme-dark .apexcharts-reset-icon svg,.apexcharts-theme-dark .apexcharts-selection-icon svg,.apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg,.apexcharts-theme-dark .apexcharts-zoom-icon svg,.apexcharts-theme-dark .apexcharts-zoomin-icon svg,.apexcharts-theme-dark .apexcharts-zoomout-icon svg {
    fill: #f3f4f5
  }
  
  .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg,.apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,.apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg {
    fill: #008ffb
  }
  
  .apexcharts-theme-light .apexcharts-menu-icon:hover svg,.apexcharts-theme-light .apexcharts-reset-icon:hover svg,.apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,.apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,.apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,.apexcharts-theme-light .apexcharts-zoomout-icon:hover svg {
    fill: #333
  }
  
  .apexcharts-menu-icon,.apexcharts-selection-icon {
    position: relative
  }
  
  .apexcharts-reset-icon {
    margin-left: 5px
  }
  
  .apexcharts-menu-icon,.apexcharts-reset-icon,.apexcharts-zoom-icon {
    transform: scale(.85)
  }
  
  .apexcharts-zoomin-icon,.apexcharts-zoomout-icon {
    transform: scale(.7)
  }
  
  .apexcharts-zoomout-icon {
    margin-right: 3px
  }
  
  .apexcharts-pan-icon {
    transform: scale(.62);
    position: relative;
    left: 1px;
    top: 0
  }
  
  .apexcharts-pan-icon svg {
    fill: #fff;
    stroke: #6e8192;
    stroke-width: 2
  }
  
  .apexcharts-pan-icon.apexcharts-selected svg {
    stroke: #008ffb
  }
  
  .apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
    stroke: #333
  }
  
  .apexcharts-toolbar {
    position: absolute;
    z-index: 11;
    max-width: 176px;
    text-align: right;
    border-radius: 3px;
    padding: 0 6px 2px;
    display: flex;
    justify-content: space-between;
    align-items: center
  }
  
  .apexcharts-menu {
    background: #fff;
    position: absolute;
    top: 100%;
    border: 1px solid #ddd;
    border-radius: 3px;
    padding: 3px;
    right: 10px;
    opacity: 0;
    min-width: 110px;
    transition: .15s ease all;
    pointer-events: none
  }
  
  .apexcharts-menu.apexcharts-menu-open {
    opacity: 1;
    pointer-events: all;
    transition: .15s ease all
  }
  
  .apexcharts-menu-item {
    padding: 6px 7px;
    font-size: 12px;
    cursor: pointer
  }
  
  .apexcharts-theme-light .apexcharts-menu-item:hover {
    background: #eee
  }
  
  .apexcharts-theme-dark .apexcharts-menu {
    background: rgba(0,0,0,.7);
    color: #fff
  }
  
  @media screen and (min-width:768px) {
    .apexcharts-canvas:hover .apexcharts-toolbar {
        opacity: 1
    }
  }
  
  .apexcharts-canvas .apexcharts-element-hidden,.apexcharts-datalabel.apexcharts-element-hidden,.apexcharts-hide .apexcharts-series-points {
    opacity: 0
  }
  
  .apexcharts-datalabel,.apexcharts-datalabel-label,.apexcharts-datalabel-value,.apexcharts-datalabels,.apexcharts-pie-label {
    cursor: default;
    pointer-events: none
  }
  
  .apexcharts-pie-label-delay {
    opacity: 0;
    animation-name: opaque;
    animation-duration: .3s;
    animation-fill-mode: forwards;
    animation-timing-function: ease
  }
  
  .apexcharts-annotation-rect,.apexcharts-area-series .apexcharts-area,.apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,.apexcharts-gridline,.apexcharts-line,.apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,.apexcharts-point-annotation-label,.apexcharts-radar-series path,.apexcharts-radar-series polygon,.apexcharts-toolbar svg,.apexcharts-tooltip .apexcharts-marker,.apexcharts-xaxis-annotation-label,.apexcharts-yaxis-annotation-label,.apexcharts-zoom-rect {
    pointer-events: none
  }
  
  .apexcharts-marker {
    transition: .15s ease all
  }
  
  .resize-triggers {
    animation: 1ms resizeanim;
    visibility: hidden;
    opacity: 0;
    height: 100%;
    width: 100%;
    overflow: hidden
  }
  
  .contract-trigger:before,.resize-triggers,.resize-triggers>div {
    content: " ";
    display: block;
    position: absolute;
    top: 0;
    left: 0
  }
  
  .resize-triggers>div {
    height: 100%;
    width: 100%;
    background: #eee;
    overflow: auto
  }
  
  .contract-trigger:before {
    overflow: hidden;
    width: 200%;
    height: 200%
  }
  </style><script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script></head>
  <body class="bg-gray-100">
  
  
  <!-- start navbar -->
  <div class="md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-300">
      
      <!-- logo -->
      <div class="flex-none w-56 flex flex-row items-center">
        <img src="img/logo.png" class="w-10 flex-none">
        <strong class="capitalize ml-1 flex-1">cleopatra</strong>
  
        <button id="sliderBtn" class="flex-none text-right text-gray-900 hidden md:block">
          <i class="fad fa-list-ul"></i>
        </button>
      </div>
      <!-- end logo -->   
      
      <!-- navbar content toggle -->
      <button id="navbarToggle" class="hidden md:block md:fixed right-0 mr-6">
        <i class="fad fa-chevron-double-down"></i>
      </button>
      <!-- end navbar content toggle -->
  
      <!-- navbar content -->
      <div id="navbar" class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-between items-center md:flex-col md:items-center">
        <!-- left -->
        <div class="text-gray-600 md:w-full md:flex md:flex-row md:justify-evenly md:pb-10 md:mb-10 md:border-b md:border-gray-200">
          <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-envelope-open-text"></i></a>        
          <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-comments-alt"></i></a>        
          <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-check-circle"></i></a>        
          <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-calendar-exclamation"></i></a>        
        </div>
        <!-- end left -->      
  
        <!-- right -->
        <div class="flex flex-row-reverse items-center"> 
  
          <!-- user -->
          <div class="dropdown relative md:static">
  
            <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
              <div class="w-8 h-8 overflow-hidden rounded-full">
                <img class="w-full h-full object-cover" src="img/user.svg">
              </div> 
  
              <div class="ml-2 capitalize flex ">
                <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">moeSaid</h1>
                <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
              </div>                        
            </button>
  
            <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>
  
            <div class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">
  
              <!-- item -->
              <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                <i class="fad fa-user-edit text-xs mr-1"></i> 
                edit my profile
              </a>     
              <!-- end item -->
  
              <!-- item -->
              <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                <i class="fad fa-inbox-in text-xs mr-1"></i> 
                my inbox
              </a>     
              <!-- end item -->
  
              <!-- item -->
              <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                <i class="fad fa-badge-check text-xs mr-1"></i> 
                tasks
              </a>     
              <!-- end item -->
  
              <!-- item -->
              <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                <i class="fad fa-comment-alt-dots text-xs mr-1"></i> 
                chats
              </a>     
              <!-- end item -->
  
              <hr>
  
              <!-- item -->
              <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                <i class="fad fa-user-times text-xs mr-1"></i> 
                log out
              </a>     
              <!-- end item -->
  
            </div>
          </div>
          <!-- end user -->
  
          <!-- notifcation -->
          <div class="dropdown relative mr-5 md:static">
  
            <button class="text-gray-500 menu-btn p-0 m-0 hover:text-gray-900 focus:text-gray-900 focus:outline-none transition-all ease-in-out duration-300">
              <i class="fad fa-bells"></i>               
            </button>
  
            <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>
  
            <div class="menu hidden rounded bg-white md:right-0 md:w-full shadow-md absolute z-20 right-0 w-84 mt-5 py-2 animated faster">
              <!-- top -->
              <div class="px-4 py-2 flex flex-row justify-between items-center capitalize font-semibold text-sm">
                <h1>notifications</h1>
                <div class="bg-teal-100 border border-teal-200 text-teal-500 text-xs rounded px-1">
                  <strong>5</strong>
                </div>
              </div>
              <hr>
              <!-- end top -->
  
              <!-- body -->
  
              <!-- item -->
              <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">
  
                <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                  <i class="fad fa-birthday-cake text-sm"></i>
                </div>
  
                <div class="flex-1 flex flex-rowbg-green-100">
                  <div class="flex-1">
                    <h1 class="text-sm font-semibold">poll..</h1>
                    <p class="text-xs text-gray-500">text here also</p>
                  </div>
                  <div class="text-right text-xs text-gray-500">
                    <p>4 min ago</p>
                  </div>
                </div>
  
              </a>
              <hr>
              <!-- end item -->
  
              <!-- item -->
              <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">
  
                <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                  <i class="fad fa-user-circle text-sm"></i>
                </div>
  
                <div class="flex-1 flex flex-rowbg-green-100">
                  <div class="flex-1">
                    <h1 class="text-sm font-semibold">mohamed..</h1>
                    <p class="text-xs text-gray-500">text here also</p>
                  </div>
                  <div class="text-right text-xs text-gray-500">
                    <p>78 min ago</p>
                  </div>
                </div>
  
              </a>
              <hr>
              <!-- end item -->
  
              <!-- item -->
              <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">
  
                <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                  <i class="fad fa-images text-sm"></i>
                </div>
  
                <div class="flex-1 flex flex-rowbg-green-100">
                  <div class="flex-1">
                    <h1 class="text-sm font-semibold">new imag..</h1>
                    <p class="text-xs text-gray-500">text here also</p>
                  </div>
                  <div class="text-right text-xs text-gray-500">
                    <p>65 min ago</p>
                  </div>
                </div>
  
              </a>
              <hr>
              <!-- end item -->
  
              <!-- item -->
              <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">
  
                <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                  <i class="fad fa-alarm-exclamation text-sm"></i>
                </div>
  
                <div class="flex-1 flex flex-rowbg-green-100">
                  <div class="flex-1">
                    <h1 class="text-sm font-semibold">time is up..</h1>
                    <p class="text-xs text-gray-500">text here also</p>
                  </div>
                  <div class="text-right text-xs text-gray-500">
                    <p>1 min ago</p>
                  </div>
                </div>
  
              </a>
              <!-- end item -->
  
  
              <!-- end body -->
  
              <!-- bottom -->
              <hr>
              <div class="px-4 py-2 mt-2">
                <a href="#" class="border border-gray-300 block text-center text-xs uppercase rounded p-1 hover:text-teal-500 transition-all ease-in-out duration-500">
                  view all
                </a>
              </div>
              <!-- end bottom -->            
            </div>
          </div>
          <!-- end notifcation -->
  
          <!-- messages -->
          <div class="dropdown relative mr-5 md:static">
  
            <button class="text-gray-500 menu-btn p-0 m-0 hover:text-gray-900 focus:text-gray-900 focus:outline-none transition-all ease-in-out duration-300">
              <i class="fad fa-comments"></i>               
            </button>
  
            <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>
  
            <div class="menu hidden md:w-full md:right-0 rounded bg-white shadow-md absolute z-20 right-0 w-84 mt-5 py-2 animated faster">
              <!-- top -->
              <div class="px-4 py-2 flex flex-row justify-between items-center capitalize font-semibold text-sm">
                <h1>messages</h1>
                <div class="bg-teal-100 border border-teal-200 text-teal-500 text-xs rounded px-1">
                  <strong>3</strong>
                </div>
              </div>
              <hr>
              <!-- end top -->
  
              <!-- body -->
  
              <!-- item -->
              <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">
  
                <div class="w-10 h-10 rounded-full overflow-hidden mr-3 bg-gray-100 border border-gray-300">
                  <img class="w-full h-full object-cover" src="img/user1.jpg" alt="">
                </div>
  
                <div class="flex-1 flex flex-rowbg-green-100">
                  <div class="flex-1">
                    <h1 class="text-sm font-semibold">mohamed said</h1>
                    <p class="text-xs text-gray-500">yeah i know</p>
                  </div>
                  <div class="text-right text-xs text-gray-500">
                    <p>4 min ago</p>
                  </div>
                </div>
  
              </a>
              <hr>
              <!-- end item --> 
  
              <!-- item -->
              <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">
  
                <div class="w-10 h-10 rounded-full overflow-hidden mr-3 bg-gray-100 border border-gray-300">
                  <img class="w-full h-full object-cover" src="img/user2.jpg" alt="">
                </div>
  
                <div class="flex-1 flex flex-rowbg-green-100">
                  <div class="flex-1">
                    <h1 class="text-sm font-semibold">sull goldmen</h1>
                    <p class="text-xs text-gray-500">for sure</p>
                  </div>
                  <div class="text-right text-xs text-gray-500">
                    <p>1 day ago</p>
                  </div>
                </div>
  
              </a>
              <hr>
              <!-- end item -->
  
              <!-- item -->
              <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">
  
                <div class="w-10 h-10 rounded-full overflow-hidden mr-3 bg-gray-100 border border-gray-300">
                  <img class="w-full h-full object-cover" src="img/user3.jpg" alt="">
                </div>
  
                <div class="flex-1 flex flex-rowbg-green-100">
                  <div class="flex-1">
                    <h1 class="text-sm font-semibold">mick</h1>
                    <p class="text-xs text-gray-500">is typing ....</p>
                  </div>
                  <div class="text-right text-xs text-gray-500">
                    <p>31 feb</p>
                  </div>
                </div>
  
              </a>
              <!-- end item -->
  
  
              <!-- end body -->
  
              <!-- bottom -->
              <hr>
              <div class="px-4 py-2 mt-2">
                <a href="#" class="border border-gray-300 block text-center text-xs uppercase rounded p-1 hover:text-teal-500 transition-all ease-in-out duration-500">
                  view all
                </a>
              </div>
              <!-- end bottom -->            
            </div>
          </div>
          <!-- end messages -->               
  
  
        </div>
        <!-- end right -->
      </div>
      <!-- end navbar content -->
  
    </div>
  <!-- end navbar -->
  
  
  <!-- strat wrapper -->
  <div class="h-screen flex flex-row flex-wrap">
    
      <!-- start sidebar -->
    <div id="sideBar" class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">
      
  
      <!-- sidebar content -->
      <div class="flex flex-col">
  
        <!-- sidebar toggle -->
        <div class="text-right hidden md:block mb-4">
          <button id="sideBarHideBtn">
            <i class="fad fa-times-circle"></i>
          </button>
        </div>
        <!-- end sidebar toggle -->
  
        <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">homes</p>
  
        <!-- link -->
        <a href="./index.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-chart-pie text-xs mr-2"></i>                
          Analytics dashboard
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="./index-1.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-shopping-cart text-xs mr-2"></i>
          ecommerce dashboard
        </a>
        <!-- end link -->
  
        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">apps</p>
  
        <!-- link -->
        <a href="./email.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-envelope-open-text text-xs mr-2"></i>
          email
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-comments text-xs mr-2"></i>
          chat
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-shield-check text-xs mr-2"></i>
          todo
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-calendar-edit text-xs mr-2"></i>
          calendar
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-file-invoice-dollar text-xs mr-2"></i>
          invoice
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-folder-open text-xs mr-2"></i>
          file manager
        </a>
        <!-- end link -->   
        
        
        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">UI Elements</p>
  
        <!-- link -->
        <a href="./typography.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-text text-xs mr-2"></i>
          typography
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="./alert.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-whistle text-xs mr-2"></i>
          alerts
        </a>
        <!-- end link -->
        
  
        <!-- link -->
        <a href="./buttons.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-cricket text-xs mr-2"></i>
          buttons
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-box-open text-xs mr-2"></i>
          Content
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-swatchbook text-xs mr-2"></i>
          colors
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-atom-alt text-xs mr-2"></i>
          icons
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-club text-xs mr-2"></i>
          card
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-cheese-swiss text-xs mr-2"></i>
          Widgets
        </a>
        <!-- end link -->
  
        <!-- link -->
        <a href="#" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-computer-classic text-xs mr-2"></i>
          Components
        </a>
        <!-- end link -->
        
        
  
      </div>
      <!-- end sidebar content -->
  
    </div>
    <!-- end sidbar -->
  
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16"> 
  
      <!-- congrats & summary -->
      <div class="grid grid-cols-3 lg:grid-cols-1 gap-5">
        <!-- congrats -->
  <div class="card col-span-1">
  
      <div class="card-body h-full flex flex-col justify-between">
  
          <div>
              <h1 class="text-lg font-bold tracking-wide">Congratulations Moe!</h1>
              <p class="text-gray-600 mt-2">Best seller of the month</p>
          </div>
      
          <div class="flex flex-row mt-10 items-end">
      
              <div class="flex-1">
                  <h1 class="font-extrabold text-4xl text-teal-400">$89k</h1>
                  <p class="mt-3 mb-4 text-xs text-gray-500">You have done 57.6% more sales today.</p>
                  <a href="#" class="btn-shadow py-3">
                      view sales
                  </a>
              </div>
      
              <div class="flex-1 ml-10 w-32 h-32 lg:w-auto lg:h-auto overflow-hidden">
                  <img class="object-cover" src="img/congrats.svg">
              </div>
      
          </div>
  
      </div>
      
  </div>
  <!-- end congrats -->
        <div class="card p-0 overflow-hidden col-span-2 lg:col-span-1 flex flex-row lg:flex-col">
       
      <!-- right -->
      <div class="border-r border-gray-200 w-2/3 lg:w-full lg:mb-5">
          
          <!-- top -->
          <div class="p-5 flex flex-row flex-wrap justify-between items-center">
              <h2 class="font-bold text-lg">Order Summary</h2>
              <div class="flex flex-row justify-center items-center">
                  <a href="#" class="btn mr-4 text-sm py-2 block">month</a>
                  <a href="#" class="btn-shadow text-sm py-2 block">week</a>
              </div>
          </div>
          <!-- end top -->
  
          <!-- chart -->                
          <div id="SummaryChart" style="min-height: 227.422px;"><div id="apexchartsl60rhtq8" class="apexcharts-canvas apexchartsl60rhtq8 apexcharts-theme-light" style="width: 342px; height: 212.422px;"><svg id="SvgjsSvg1158" width="342" height="212.4223602484472" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="342" height="212.4223602484472"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 106.211px;"></div></foreignObject><rect id="SvgjsRect1162" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1224" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1160" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 30)"><defs id="SvgjsDefs1159"><clipPath id="gridRectMaskl60rhtq8"><rect id="SvgjsRect1164" width="349" height="170.4223602484472" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskl60rhtq8"></clipPath><clipPath id="nonForecastMaskl60rhtq8"></clipPath><clipPath id="gridRectMarkerMaskl60rhtq8"><rect id="SvgjsRect1165" width="346" height="171.4223602484472" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1170" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1171" stop-opacity="0.9" stop-color="rgba(79,209,197,0.9)" offset="0"></stop><stop id="SvgjsStop1172" stop-opacity="0.7" stop-color="rgba(255,255,255,0.7)" offset="0.9"></stop><stop id="SvgjsStop1173" stop-opacity="0.7" stop-color="rgba(255,255,255,0.7)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1179" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1180" stop-opacity="0.9" stop-color="rgba(79,209,197,0.9)" offset="0"></stop><stop id="SvgjsStop1181" stop-opacity="0.7" stop-color="rgba(255,255,255,0.7)" offset="0.9"></stop><stop id="SvgjsStop1182" stop-opacity="0.7" stop-color="rgba(255,255,255,0.7)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1163" x1="0" y1="0" x2="0" y2="167.4223602484472" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="167.4223602484472" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><line id="SvgjsLine1189" x1="0" y1="168.4223602484472" x2="0" y2="174.4223602484472" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1190" x1="34.2" y1="168.4223602484472" x2="34.2" y2="174.4223602484472" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1191" x1="68.4" y1="168.4223602484472" x2="68.4" y2="174.4223602484472" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1192" x1="102.60000000000001" y1="168.4223602484472" x2="102.60000000000001" y2="174.4223602484472" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1193" x1="136.8" y1="168.4223602484472" x2="136.8" y2="174.4223602484472" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1194" x1="171" y1="168.4223602484472" x2="171" y2="174.4223602484472" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1195" x1="205.2" y1="168.4223602484472" x2="205.2" y2="174.4223602484472" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1196" x1="239.39999999999998" y1="168.4223602484472" x2="239.39999999999998" y2="174.4223602484472" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1197" x1="273.59999999999997" y1="168.4223602484472" x2="273.59999999999997" y2="174.4223602484472" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1198" x1="307.79999999999995" y1="168.4223602484472" x2="307.79999999999995" y2="174.4223602484472" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1199" x1="341.99999999999994" y1="168.4223602484472" x2="341.99999999999994" y2="174.4223602484472" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><g id="SvgjsG1185" class="apexcharts-grid"><g id="SvgjsG1186" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1200" x1="0" y1="0" x2="342" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1201" x1="0" y1="27.903726708074533" x2="342" y2="27.903726708074533" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1202" x1="0" y1="55.807453416149066" x2="342" y2="55.807453416149066" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1203" x1="0" y1="83.7111801242236" x2="342" y2="83.7111801242236" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1204" x1="0" y1="111.61490683229813" x2="342" y2="111.61490683229813" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1205" x1="0" y1="139.51863354037266" x2="342" y2="139.51863354037266" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1206" x1="0" y1="167.4223602484472" x2="342" y2="167.4223602484472" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1187" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1208" x1="0" y1="167.4223602484472" x2="342" y2="167.4223602484472" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1207" x1="0" y1="1" x2="0" y2="167.4223602484472" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1166" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1167" class="apexcharts-series" seriesName="serie1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1174" d="M 0 167.4223602484472 L 0 72.5496894409938C 11.97 72.5496894409938 22.230000000000004 41.855590062111816 34.2 41.855590062111816C 46.17 41.855590062111816 56.43000000000001 80.92080745341616 68.4 80.92080745341616C 80.37 80.92080745341616 90.63000000000001 8.371118012422357 102.60000000000001 8.371118012422357C 114.57000000000001 8.371118012422357 124.83000000000001 133.93788819875778 136.8 133.93788819875778C 148.77 133.93788819875778 159.03 75.34006211180125 171 75.34006211180125C 182.97 75.34006211180125 193.23000000000002 136.72826086956522 205.20000000000002 136.72826086956522C 217.17000000000002 136.72826086956522 227.43 80.92080745341616 239.4 80.92080745341616C 251.37 80.92080745341616 261.63 39.065217391304344 273.6 39.065217391304344C 285.57 39.065217391304344 295.83000000000004 119.9860248447205 307.8 119.9860248447205C 319.77 119.9860248447205 330.03000000000003 75.34006211180125 342 75.34006211180125C 342 75.34006211180125 342 75.34006211180125 342 167.4223602484472M 342 75.34006211180125z" fill="url(#SvgjsLinearGradient1170)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskl60rhtq8)" pathTo="M 0 167.4223602484472 L 0 72.5496894409938C 11.97 72.5496894409938 22.230000000000004 41.855590062111816 34.2 41.855590062111816C 46.17 41.855590062111816 56.43000000000001 80.92080745341616 68.4 80.92080745341616C 80.37 80.92080745341616 90.63000000000001 8.371118012422357 102.60000000000001 8.371118012422357C 114.57000000000001 8.371118012422357 124.83000000000001 133.93788819875778 136.8 133.93788819875778C 148.77 133.93788819875778 159.03 75.34006211180125 171 75.34006211180125C 182.97 75.34006211180125 193.23000000000002 136.72826086956522 205.20000000000002 136.72826086956522C 217.17000000000002 136.72826086956522 227.43 80.92080745341616 239.4 80.92080745341616C 251.37 80.92080745341616 261.63 39.065217391304344 273.6 39.065217391304344C 285.57 39.065217391304344 295.83000000000004 119.9860248447205 307.8 119.9860248447205C 319.77 119.9860248447205 330.03000000000003 75.34006211180125 342 75.34006211180125C 342 75.34006211180125 342 75.34006211180125 342 167.4223602484472M 342 75.34006211180125z" pathFrom="M -1 195.32608695652175 L -1 195.32608695652175 L 34.2 195.32608695652175 L 68.4 195.32608695652175 L 102.60000000000001 195.32608695652175 L 136.8 195.32608695652175 L 171 195.32608695652175 L 205.20000000000002 195.32608695652175 L 239.4 195.32608695652175 L 273.6 195.32608695652175 L 307.8 195.32608695652175 L 342 195.32608695652175"></path><path id="SvgjsPath1175" d="M 0 72.5496894409938C 11.97 72.5496894409938 22.230000000000004 41.855590062111816 34.2 41.855590062111816C 46.17 41.855590062111816 56.43000000000001 80.92080745341616 68.4 80.92080745341616C 80.37 80.92080745341616 90.63000000000001 8.371118012422357 102.60000000000001 8.371118012422357C 114.57000000000001 8.371118012422357 124.83000000000001 133.93788819875778 136.8 133.93788819875778C 148.77 133.93788819875778 159.03 75.34006211180125 171 75.34006211180125C 182.97 75.34006211180125 193.23000000000002 136.72826086956522 205.20000000000002 136.72826086956522C 217.17000000000002 136.72826086956522 227.43 80.92080745341616 239.4 80.92080745341616C 251.37 80.92080745341616 261.63 39.065217391304344 273.6 39.065217391304344C 285.57 39.065217391304344 295.83000000000004 119.9860248447205 307.8 119.9860248447205C 319.77 119.9860248447205 330.03000000000003 75.34006211180125 342 75.34006211180125" fill="none" fill-opacity="1" stroke="#4fd1c5" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskl60rhtq8)" pathTo="M 0 72.5496894409938C 11.97 72.5496894409938 22.230000000000004 41.855590062111816 34.2 41.855590062111816C 46.17 41.855590062111816 56.43000000000001 80.92080745341616 68.4 80.92080745341616C 80.37 80.92080745341616 90.63000000000001 8.371118012422357 102.60000000000001 8.371118012422357C 114.57000000000001 8.371118012422357 124.83000000000001 133.93788819875778 136.8 133.93788819875778C 148.77 133.93788819875778 159.03 75.34006211180125 171 75.34006211180125C 182.97 75.34006211180125 193.23000000000002 136.72826086956522 205.20000000000002 136.72826086956522C 217.17000000000002 136.72826086956522 227.43 80.92080745341616 239.4 80.92080745341616C 251.37 80.92080745341616 261.63 39.065217391304344 273.6 39.065217391304344C 285.57 39.065217391304344 295.83000000000004 119.9860248447205 307.8 119.9860248447205C 319.77 119.9860248447205 330.03000000000003 75.34006211180125 342 75.34006211180125" pathFrom="M -1 195.32608695652175 L -1 195.32608695652175 L 34.2 195.32608695652175 L 68.4 195.32608695652175 L 102.60000000000001 195.32608695652175 L 136.8 195.32608695652175 L 171 195.32608695652175 L 205.20000000000002 195.32608695652175 L 239.4 195.32608695652175 L 273.6 195.32608695652175 L 307.8 195.32608695652175 L 342 195.32608695652175" fill-rule="evenodd"></path><g id="SvgjsG1168" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1228" r="0" cx="0" cy="0" class="apexcharts-marker wktnrog6y no-pointer-events" stroke="#ffffff" fill="#008ffb" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1176" class="apexcharts-series" seriesName="serie2" data:longestSeries="true" rel="2" data:realIndex="1"><path id="SvgjsPath1183" d="M 0 167.4223602484472 L 0 44.64596273291926C 11.97 44.64596273291926 22.230000000000004 69.75931677018635 34.2 69.75931677018635C 46.17 69.75931677018635 56.43000000000001 53.017080745341616 68.4 53.017080745341616C 80.37 53.017080745341616 90.63000000000001 36.2748447204969 102.60000000000001 36.2748447204969C 114.57000000000001 36.2748447204969 124.83000000000001 106.03416149068323 136.8 106.03416149068323C 148.77 106.03416149068323 159.03 103.24378881987579 171 103.24378881987579C 182.97 103.24378881987579 193.23000000000002 108.82453416149069 205.20000000000002 108.82453416149069C 217.17000000000002 108.82453416149069 227.43 108.82453416149069 239.4 108.82453416149069C 251.37 108.82453416149069 261.63 66.96894409937889 273.6 66.96894409937889C 285.57 66.96894409937889 295.83000000000004 92.08229813664597 307.8 92.08229813664597C 319.77 92.08229813664597 330.03000000000003 103.24378881987579 342 103.24378881987579C 342 103.24378881987579 342 103.24378881987579 342 167.4223602484472M 342 103.24378881987579z" fill="url(#SvgjsLinearGradient1179)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMaskl60rhtq8)" pathTo="M 0 167.4223602484472 L 0 44.64596273291926C 11.97 44.64596273291926 22.230000000000004 69.75931677018635 34.2 69.75931677018635C 46.17 69.75931677018635 56.43000000000001 53.017080745341616 68.4 53.017080745341616C 80.37 53.017080745341616 90.63000000000001 36.2748447204969 102.60000000000001 36.2748447204969C 114.57000000000001 36.2748447204969 124.83000000000001 106.03416149068323 136.8 106.03416149068323C 148.77 106.03416149068323 159.03 103.24378881987579 171 103.24378881987579C 182.97 103.24378881987579 193.23000000000002 108.82453416149069 205.20000000000002 108.82453416149069C 217.17000000000002 108.82453416149069 227.43 108.82453416149069 239.4 108.82453416149069C 251.37 108.82453416149069 261.63 66.96894409937889 273.6 66.96894409937889C 285.57 66.96894409937889 295.83000000000004 92.08229813664597 307.8 92.08229813664597C 319.77 92.08229813664597 330.03000000000003 103.24378881987579 342 103.24378881987579C 342 103.24378881987579 342 103.24378881987579 342 167.4223602484472M 342 103.24378881987579z" pathFrom="M -1 195.32608695652175 L -1 195.32608695652175 L 34.2 195.32608695652175 L 68.4 195.32608695652175 L 102.60000000000001 195.32608695652175 L 136.8 195.32608695652175 L 171 195.32608695652175 L 205.20000000000002 195.32608695652175 L 239.4 195.32608695652175 L 273.6 195.32608695652175 L 307.8 195.32608695652175 L 342 195.32608695652175"></path><path id="SvgjsPath1184" d="M 0 44.64596273291926C 11.97 44.64596273291926 22.230000000000004 69.75931677018635 34.2 69.75931677018635C 46.17 69.75931677018635 56.43000000000001 53.017080745341616 68.4 53.017080745341616C 80.37 53.017080745341616 90.63000000000001 36.2748447204969 102.60000000000001 36.2748447204969C 114.57000000000001 36.2748447204969 124.83000000000001 106.03416149068323 136.8 106.03416149068323C 148.77 106.03416149068323 159.03 103.24378881987579 171 103.24378881987579C 182.97 103.24378881987579 193.23000000000002 108.82453416149069 205.20000000000002 108.82453416149069C 217.17000000000002 108.82453416149069 227.43 108.82453416149069 239.4 108.82453416149069C 251.37 108.82453416149069 261.63 66.96894409937889 273.6 66.96894409937889C 285.57 66.96894409937889 295.83000000000004 92.08229813664597 307.8 92.08229813664597C 319.77 92.08229813664597 330.03000000000003 103.24378881987579 342 103.24378881987579" fill="none" fill-opacity="1" stroke="#4fd1c5" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMaskl60rhtq8)" pathTo="M 0 44.64596273291926C 11.97 44.64596273291926 22.230000000000004 69.75931677018635 34.2 69.75931677018635C 46.17 69.75931677018635 56.43000000000001 53.017080745341616 68.4 53.017080745341616C 80.37 53.017080745341616 90.63000000000001 36.2748447204969 102.60000000000001 36.2748447204969C 114.57000000000001 36.2748447204969 124.83000000000001 106.03416149068323 136.8 106.03416149068323C 148.77 106.03416149068323 159.03 103.24378881987579 171 103.24378881987579C 182.97 103.24378881987579 193.23000000000002 108.82453416149069 205.20000000000002 108.82453416149069C 217.17000000000002 108.82453416149069 227.43 108.82453416149069 239.4 108.82453416149069C 251.37 108.82453416149069 261.63 66.96894409937889 273.6 66.96894409937889C 285.57 66.96894409937889 295.83000000000004 92.08229813664597 307.8 92.08229813664597C 319.77 92.08229813664597 330.03000000000003 103.24378881987579 342 103.24378881987579" pathFrom="M -1 195.32608695652175 L -1 195.32608695652175 L 34.2 195.32608695652175 L 68.4 195.32608695652175 L 102.60000000000001 195.32608695652175 L 136.8 195.32608695652175 L 171 195.32608695652175 L 205.20000000000002 195.32608695652175 L 239.4 195.32608695652175 L 273.6 195.32608695652175 L 307.8 195.32608695652175 L 342 195.32608695652175" fill-rule="evenodd"></path><g id="SvgjsG1177" class="apexcharts-series-markers-wrap" data:realIndex="1"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1229" r="0" cx="0" cy="0" class="apexcharts-marker w9ee54asb no-pointer-events" stroke="#ffffff" fill="#00e396" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1169" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1178" class="apexcharts-datalabels" data:realIndex="1"></g></g><g id="SvgjsG1188" class="apexcharts-grid-borders" style="display: none;"></g><line id="SvgjsLine1209" x1="0" y1="0" x2="342" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1210" x1="0" y1="0" x2="342" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1211" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1212" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1225" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1226" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1227" class="apexcharts-point-annotations"></g><rect id="SvgjsRect1230" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect1231" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 143, 251);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 227, 150);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
          <!-- end chart -->
  
      </div>
      <!-- end right -->
  
      <!-- left -->
      <div class="w-1/3 lg:w-full">
          
          <!-- top -->
          <div class="p-5 border-b border-gray-200">
              <h2 class="font-bold text-lg mb-6">Sales History</h2>
  
              <div class="flex flex-row justify-between mb-3">
                  <div class="">
                      <h4 class="text-gray-600 font-thin">Puma Shoes</h4>
                      <p class="text-gray-400 text-xs font-hairline">30 min ago</p>
                  </div>
                  <div class="text-sm font-medium">
                      <span class="text-green-400">+</span> $250
                  </div>
              </div>
  
              <div class="flex flex-row justify-between mb-3">
                  <div class="">
                      <h4 class="text-gray-600 font-thin">Google Pixel 4 xl</h4>
                      <p class="text-gray-400 text-xs font-hairline">1 day ago</p>
                  </div>
                  <div class="text-sm font-medium">
                      <span class="text-red-400">-</span> $10
                  </div>
              </div>
              
              <div class="flex flex-row justify-between">
                  <div class="">
                      <h4 class="text-gray-600 font-thin">Nike Air Jordan</h4>
                      <p class="text-gray-400 text-xs font-hairline">2 hour ago</p>
                  </div>
                  <div class="text-sm font-medium">
                      <span class="text-red-400">-</span> $98
                  </div>
              </div>
  
              
  
          </div>
          <!-- end top -->
  
          <!-- bottom -->
          <div class="p-5">
              <h2 class="font-bold text-lg mb-2">Sales History</h2>
              <strong class="text-teal-400 font-extrabold text-xl">$82,950.96</strong>
  
              <div class="bg-gray-300 h-2 rounded-full mt-2 relative">
                  <div class="rounded-full bg-teal-400 h-full w-3/4 shadow-md"></div>
              </div>
          </div>
          <!-- end bottom -->
  
      </div>
      <!-- end left -->
  
  </div>
  
  
        
      </div>
      <!-- end congrats & summary -->
  
      <!-- status -->
      <div class="grid grid-cols-5 gap-5 mt-5 lg:grid-cols-2">
  
      <!-- status -->
      <div class="card col-span-1">
          <div class="card-body">
              <h5 class="uppercase text-xs tracking-wider font-extrabold">today</h5>
              <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">383</span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2">89</span> orders</span></h1>
              <p class="capitalize text-xs text-gray-500">( $<span class="num-2">47</span> in the last year )</p>
          </div>
      </div>
      <!-- status -->
  
      <!-- status -->
      <div class="card col-span-1">
          <div class="card-body">
              <h5 class="uppercase text-xs tracking-wider font-extrabold">yesterday</h5>
              <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">546</span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2">9</span> orders</span></h1>
              <p class="capitalize text-xs text-gray-500">( $<span class="num-2">76</span> in the last year )</p>
          </div>
      </div>
      <!-- status -->
  
      <!-- status -->
      <div class="card col-span-1">
          <div class="card-body">
              <h5 class="uppercase text-xs tracking-wider font-extrabold">last week</h5>
              <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">257</span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2">10</span> orders</span></h1>
              <p class="capitalize text-xs text-gray-500">( $<span class="num-2">77</span> in the last year )</p>
          </div>
      </div>
      <!-- status -->
  
      <!-- status -->
      <div class="card col-span-1">
          <div class="card-body">
              <h5 class="uppercase text-xs tracking-wider font-extrabold">last month</h5>
              <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">101</span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2">3</span> orders</span></h1>
              <p class="capitalize text-xs text-gray-500">( $<span class="num-2">26</span> in the last year )</p>
          </div>
      </div>
      <!-- status -->
  
      <!-- status -->
      <div class="card col-span-1 lg:col-span-2">
          <div class="card-body">
              <h5 class="uppercase text-xs tracking-wider font-extrabold">last 90-days</h5>
              <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3">491</span>  <span class="text-xs tracking-widest font-extrabold"> / <span class="num-2">87</span> orders</span></h1>
              <p class="capitalize text-xs text-gray-500">( $<span class="num-2">71</span> in the last year )</p>
          </div>
      </div>
      <!-- status -->
      
   
  </div>
      <!-- end status -->
  
      <!-- best seller & traffic -->
      <div class="grid grid-cols-2 lg:grid-cols-1 gap-5 mt-5">
        <div class="card">
  
      <div class="card-body">
          <div class="flex flex-row justify-between items-center">
              <h1 class="font-extrabold text-lg">best sellers</h1>
              <a href="#" class="btn-gray text-sm">view all</a>
          </div>
      
          <table class="table-auto w-full mt-5 text-right">
      
              <thead>
                  <tr>
                      <td class="py-4 font-extrabold text-sm text-left">product</td>
                      <td class="py-4 font-extrabold text-sm">price</td>
                      <td class="py-4 font-extrabold text-sm">sold</td>
                      <td class="py-4 font-extrabold text-sm">profit</td>
                  </tr>
              </thead>
      
              <tbody>
      
                  <!-- item -->
                  <tr class="">
                      <td class="py-4 text-sm text-gray-600 flex flex-row items-center text-left">
                          <div class="w-8 h-8 overflow-hidden mr-3">
                              <img src="img/sneakers.svg" class="object-cover">
                          </div>
                          Sneakers and Tennis 
                      </td>
                      <td class="py-4 text-xs text-gray-600">$ <span class="num-2">11</span></td>
                      <td class="py-4 text-xs text-gray-600"><span class="num-3">871</span></td>
                      <td class="py-4 text-xs text-gray-600">$ <span class="num-4">4222</span></td>
                  </tr>
                  <!-- end item -->
      
                  <!-- item -->
                  <tr class="">
                      <td class="py-4 text-sm text-gray-600 flex flex-row items-center">
                          <div class="w-8 h-8 overflow-hidden mr-3">
                              <img src="img/socks.svg" class="object-cover">
                          </div>
                          Crazy Socks &amp; Graphic Socks for Men
                      </td>
                      <td class="py-4 text-xs text-gray-600">$ <span class="num-2">80</span></td>
                      <td class="py-4 text-xs text-gray-600"><span class="num-3">464</span></td>
                      <td class="py-4 text-xs text-gray-600">$ <span class="num-4">7261</span></td>
                  </tr>
                  <!-- end item -->
      
                  <!-- item -->
                  <tr class="">
                      <td class="py-4 text-sm text-gray-600 flex flex-row items-center">
                          <div class="w-8 h-8 overflow-hidden mr-3">
                              <img src="img/soccer.svg" class="object-cover">
                          </div>
                          Adidas Soccer Ball
                      </td>
                      <td class="py-4 text-xs text-gray-600">$ <span class="num-2">44</span></td>
                      <td class="py-4 text-xs text-gray-600"><span class="num-3">605</span></td>
                      <td class="py-4 text-xs text-gray-600">$ <span class="num-4">1118</span></td>
                  </tr>
                  <!-- end item -->
      
                  <!-- item -->
                  <tr class="">
                      <td class="py-4 text-sm text-gray-600 flex flex-row items-center">
                          <div class="w-8 h-8 overflow-hidden mr-3">
                              <img src="img/food.svg" class="object-cover">
                          </div>
                          Best Chocolate Chip Cookies
                      </td>
                      <td class="py-4 text-xs text-gray-600">$ <span class="num-2">81</span></td>
                      <td class="py-4 text-xs text-gray-600"><span class="num-3">627</span></td>
                      <td class="py-4 text-xs text-gray-600">$ <span class="num-4">8164</span></td>
                  </tr>
                  <!-- end item -->
      
              </tbody>
      
          </table>
      
      </div>
  </div>
        <div class="card">    
  
      <div class="card-body">
          <h2 class="font-bold text-lg mb-10">Recent Orders</h2>
      
      <!-- start a table -->
      <table class="table-fixed w-full">
          
          <!-- table head -->
          <thead class="text-left">
              <tr>
                  <th class="w-1/2 pb-10 text-sm font-extrabold tracking-wide">customer</th>
                  <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Product</th>
                  <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Invoice</th>
                  <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">price</th>
                  <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">status</th>
              </tr>
          </thead>
          <!-- end table head -->
  
          <!-- table body -->
          <tbody class="text-left text-gray-600">
  
              <!-- item -->
              <tr>
                  <!-- name -->
                  <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                      <div class="w-8 h-8 overflow-hidden rounded-full">
                          <img src="img/user2.jpg" class="object-cover">
                      </div>
                      <p class="ml-3 name-1">Brooklyn</p>                    
                  </th>
                  <!-- name -->
                  
                  <!-- product -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                  <!-- product -->
  
                  <!-- invoice -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4">8228</span></th>
                  <!-- invoice -->
  
                  <!-- price -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2">56</span></th>
                  <!-- price -->
  
                  <!-- status -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                  <!-- status -->
  
              </tr>
              <!-- item -->
  
  
              <!-- item -->
              <tr>
                  <!-- name -->
                  <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                      <div class="w-8 h-8 overflow-hidden rounded-full">
                          <img src="img/user3.jpg" class="object-cover">
                      </div>
                      <p class="ml-3 name-1">Arjuna</p>                    
                  </th>
                  <!-- name -->
                  
                  <!-- product -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                  <!-- product -->
  
                  <!-- invoice -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4">5864</span></th>
                  <!-- invoice -->
  
                  <!-- price -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2">37</span></th>
                  <!-- price -->
  
                  <!-- status -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                  <!-- status -->
  
              </tr>
              <!-- item -->
  
  
              <!-- item -->
              <tr>
                  <!-- name -->
                  <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                      <div class="w-8 h-8 overflow-hidden rounded-full">
                          <img src="img/user2.jpg" class="object-cover">
                      </div>
                      <p class="ml-3 name-1">Alexei</p>                    
                  </th>
                  <!-- name -->
                  
                  <!-- product -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                  <!-- product -->
  
                  <!-- invoice -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4">5365</span></th>
                  <!-- invoice -->
  
                  <!-- price -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2">48</span></th>
                  <!-- price -->
  
                  <!-- status -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                  <!-- status -->
  
              </tr>
              <!-- item -->
  
              <!-- item -->
              <tr>
                  <!-- name -->
                  <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                      <div class="w-8 h-8 overflow-hidden rounded-full">
                          <img src="img/user1.jpg" class="object-cover">
                      </div>
                      <p class="ml-3 name-1">Bowen</p>                    
                  </th>
                  <!-- name -->
                  
                  <!-- product -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                  <!-- product -->
  
                  <!-- invoice -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4">2498</span></th>
                  <!-- invoice -->
  
                  <!-- price -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2">39</span></th>
                  <!-- price -->
  
                  <!-- status -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                  <!-- status -->
  
              </tr>
              <!-- item -->
  
              <!-- item -->
              <tr>
                  <!-- name -->
                  <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                      <div class="w-8 h-8 overflow-hidden rounded-full">
                          <img src="img/user3.jpg" class="object-cover">
                      </div>
                      <p class="ml-3 name-1">Darren</p>                    
                  </th>
                  <!-- name -->
                  
                  <!-- product -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">Nike Sport</th>
                  <!-- product -->
  
                  <!-- invoice -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">#<span class="num-4">10573</span></th>
                  <!-- invoice -->
  
                  <!-- price -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">$<span class="num-2">47</span></th>
                  <!-- price -->
  
                  <!-- status -->
                  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">shipped</th>
                  <!-- status -->
  
              </tr>
              <!-- item -->            
  
              
  
  
          </tbody>
          <!-- end table body -->
  
      </table>
      <!-- end a table -->
      </div>
  
  </div> 
            
      </div>
      <!-- end best seller & traffic -->
          
  
    </div>
    <!-- end content -->
  
  </div>
  <!-- end wrapper -->
  
  <!-- script -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="js/scripts.js"></script>
  <!-- end script -->
  
  
  
  <svg id="SvgjsSvg1075" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1076"></defs><polyline id="SvgjsPolyline1077" points="0,0"></polyline><path id="SvgjsPath1078" d="M-1 272.8623188405797L-1 272.8623188405797C-1 272.8623188405797 44.9 272.8623188405797 44.9 272.8623188405797C44.9 272.8623188405797 89.8 272.8623188405797 89.8 272.8623188405797C89.8 272.8623188405797 134.7 272.8623188405797 134.7 272.8623188405797C134.7 272.8623188405797 179.6 272.8623188405797 179.6 272.8623188405797C179.6 272.8623188405797 224.5 272.8623188405797 224.5 272.8623188405797C224.5 272.8623188405797 269.4 272.8623188405797 269.4 272.8623188405797C269.4 272.8623188405797 314.3 272.8623188405797 314.3 272.8623188405797C314.3 272.8623188405797 359.2 272.8623188405797 359.2 272.8623188405797C359.2 272.8623188405797 404.1 272.8623188405797 404.1 272.8623188405797C404.1 272.8623188405797 449 272.8623188405797 449 272.8623188405797C449 272.8623188405797 449 272.8623188405797 449 272.8623188405797 "></path></svg></body></html>