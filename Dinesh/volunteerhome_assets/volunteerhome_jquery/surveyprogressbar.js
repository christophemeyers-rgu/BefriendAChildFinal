
moveProgressBar();
//===============================================================================  on browser resize
$(window).resize(function() {
    moveProgressBar();
});
//===============================================================================  SIGNATURE PROGRESS
function moveProgressBar() {
    var getPercent = ($('.progress-wrap').data('progress-percent') / 100);
    var getProgressWrapWidth = $('.progress-wrap').width();
    var progressTotal = getPercent * getProgressWrapWidth;
    var animationLength = 2500;
//==================================================================== animate percentage bar to data percentage length
    $('.progress-bar').animate({
        left: progressTotal
    }, animationLength);
}