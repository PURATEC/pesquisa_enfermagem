$("#personanswersurveyquestion-12-answer").on("change", function()
{
    if($(this).val() === '1') $('#personanswersurveyquestionoption-12-0-option_answer').show(); 
    else $('#personanswersurveyquestionoption-12-0-option_answer').hide();
});
$("input[name='PersonAnswerSurveyQuestion[13][answer][]']").change(function() {
    if(this.value === '7') $('#personanswersurveyquestionoption-13-0-option_answer').toggle();
});
$("input[name='PersonAnswerSurveyQuestion[14][answer][]']").change(function() {
    if(this.value === '8') $('#personanswersurveyquestionoption-14-0-option_answer').toggle();
});
$("input[name='PersonAnswerSurveyQuestion[20][answer][]']").change(function() {
    if(this.value === '6') $('#personanswersurveyquestionoption-20-0-option_answer').toggle();
});



$("#personanswersurveyquestion-23-answer").on("change", function()
{
    if($(this).val() === '3') 
    {
        $('#personanswersurveyquestionoption-23-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-23-1-option_answer], input#personanswersurveyquestionoption-23-1-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-23-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-23-1-option_answer], input#personanswersurveyquestionoption-23-1-option_answer').hide();
    }
});
$("#personanswersurveyquestion-24-answer").on("change", function()
{
    if($(this).val() === '1') { 
        $('#personanswersurveyquestionoption-24-1-option_answer').show(); 
        $('#personanswersurveyquestionoption-24-2-option_answer').show();
        $('label[for=personanswersurveyquestionoption-24-1-option_answer], input#personanswersurveyquestionoption-24-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-24-2-option_answer], input#personanswersurveyquestionoption-24-2-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-24-1-option_answer').hide();
        $('#personanswersurveyquestionoption-24-2-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-24-1-option_answer], input#personanswersurveyquestionoption-24-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-24-2-option_answer], input#personanswersurveyquestionoption-24-2-option_answer').hide();
    }
});
$("#personanswersurveyquestion-25-answer").on("change", function()
{
    if($(this).val() === '1') { 
        $('#personanswersurveyquestionoption-25-1-option_answer').show(); 
        $('#personanswersurveyquestionoption-25-2-option_answer').show();
        $('label[for=personanswersurveyquestionoption-25-1-option_answer], input#personanswersurveyquestionoption-25-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-25-2-option_answer], input#personanswersurveyquestionoption-25-2-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-25-1-option_answer').hide();
        $('#personanswersurveyquestionoption-25-2-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-25-1-option_answer], input#personanswersurveyquestionoption-25-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-25-2-option_answer], input#personanswersurveyquestionoption-25-2-option_answer').hide();
    }
});
$("#personanswersurveyquestion-29-answer").on("change", function()
{
    if($(this).val() === '1') { 
        $('#personanswersurveyquestionoption-29-0-option_answer').show(); 
        $('#personanswersurveyquestionoption-29-1-option_answer').show();
        $('#personanswersurveyquestionoption-29-2-option_answer').show();
        $('label[for=personanswersurveyquestionoption-29-0-option_answer], input#personanswersurveyquestionoption-29-0-option_answer').show();
        $('label[for=personanswersurveyquestionoption-29-1-option_answer], input#personanswersurveyquestionoption-29-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-29-2-option_answer], input#personanswersurveyquestionoption-29-2-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-29-0-option_answer').hide(); 
        $('#personanswersurveyquestionoption-29-1-option_answer').hide();
        $('#personanswersurveyquestionoption-29-2-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-29-0-option_answer], input#personanswersurveyquestionoption-29-0-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-29-1-option_answer], input#personanswersurveyquestionoption-29-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-29-2-option_answer], input#personanswersurveyquestionoption-29-2-option_answer').hide();
    }
});
$("#personanswersurveyquestion-31-answer").on("change", function()
{
    if($(this).val() === '1') { 
        $('#personanswersurveyquestionoption-31-0-option_answer').show(); 
        $('#personanswersurveyquestionoption-31-1-option_answer').show();
        $('#personanswersurveyquestionoption-31-2-option_answer').show();
        $('#personanswersurveyquestionoption-31-3-option_answer').show();
        $('label[for=personanswersurveyquestionoption-31-0-option_answer], input#personanswersurveyquestionoption-31-0-option_answer').show();
        $('label[for=personanswersurveyquestionoption-31-1-option_answer], input#personanswersurveyquestionoption-31-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-31-2-option_answer], input#personanswersurveyquestionoption-31-2-option_answer').show();
        $('label[for=personanswersurveyquestionoption-31-3-option_answer], input#personanswersurveyquestionoption-31-3-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-31-0-option_answer').hide(); 
        $('#personanswersurveyquestionoption-31-1-option_answer').hide();
        $('#personanswersurveyquestionoption-31-2-option_answer').hide();
        $('#personanswersurveyquestionoption-31-3-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-31-0-option_answer], input#personanswersurveyquestionoption-31-0-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-31-1-option_answer], input#personanswersurveyquestionoption-31-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-31-2-option_answer], input#personanswersurveyquestionoption-31-2-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-31-3-option_answer], input#personanswersurveyquestionoption-31-3-option_answer').hide();
    }
});

$("#personanswersurveyquestion-32-answer").on("change", function()
{
    if($(this).val() === '1') { 
        $('#personanswersurveyquestionoption-32-0-option_answer').show(); 
        $('#personanswersurveyquestionoption-32-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-32-0-option_answer], input#personanswersurveyquestionoption-32-0-option_answer').show();
        $('label[for=personanswersurveyquestionoption-32-1-option_answer], input#personanswersurveyquestionoption-32-1-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-32-0-option_answer').hide(); 
        $('#personanswersurveyquestionoption-32-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-32-0-option_answer], input#personanswersurveyquestionoption-32-0-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-32-1-option_answer], input#personanswersurveyquestionoption-32-1-option_answer').hide();
    }
});
$("#personanswersurveyquestion-33-answer").on("change", function()
{
    if($(this).val() === '1') { 
        $('#personanswersurveyquestionoption-33-0-option_answer').show();
        $('label[for=personanswersurveyquestionoption-33-0-option_answer], input#personanswersurveyquestionoption-33-0-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-33-0-option_answer').hide(); 
        $('label[for=personanswersurveyquestionoption-33-0-option_answer], input#personanswersurveyquestionoption-33-0-option_answer').hide();
    }
});
$("#personanswersurveyquestion-34-answer").on("change", function()
{
    if($(this).val() === '1') { 
        $('#personanswersurveyquestionoption-34-0-option_answer').show(); 
        $('#personanswersurveyquestionoption-34-1-option_answer').show();
        $('#personanswersurveyquestionoption-34-2-option_answer').show();
        $('label[for=personanswersurveyquestionoption-34-0-option_answer], input#personanswersurveyquestionoption-34-0-option_answer').show();
        $('label[for=personanswersurveyquestionoption-34-1-option_answer], input#personanswersurveyquestionoption-34-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-34-2-option_answer], input#personanswersurveyquestionoption-34-2-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-34-0-option_answer').hide(); 
        $('#personanswersurveyquestionoption-34-1-option_answer').hide();
        $('#personanswersurveyquestionoption-34-2-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-34-0-option_answer], input#personanswersurveyquestionoption-34-0-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-34-1-option_answer], input#personanswersurveyquestionoption-34-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-34-2-option_answer], input#personanswersurveyquestionoption-34-2-option_answer').hide();
    }
});
$("#personanswersurveyquestion-35-answer").on("change", function()
{
    if($(this).val() === '1') { 
        $('#personanswersurveyquestionoption-35-0-option_answer').show(); 
        $('#personanswersurveyquestionoption-35-1-option_answer').show();
        $('#personanswersurveyquestionoption-35-2-option_answer').show();
        $('label[for=personanswersurveyquestionoption-35-0-option_answer], input#personanswersurveyquestionoption-35-0-option_answer').show();
        $('label[for=personanswersurveyquestionoption-35-1-option_answer], input#personanswersurveyquestionoption-35-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-35-2-option_answer], input#personanswersurveyquestionoption-35-2-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-35-0-option_answer').hide(); 
        $('#personanswersurveyquestionoption-35-1-option_answer').hide();
        $('#personanswersurveyquestionoption-35-2-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-35-0-option_answer], input#personanswersurveyquestionoption-35-0-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-35-1-option_answer], input#personanswersurveyquestionoption-35-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-35-2-option_answer], input#personanswersurveyquestionoption-35-2-option_answer').hide();
    }
});
$("#personanswersurveyquestion-36-answer").on("change", function()
{
    if($(this).val() === '1') { 
        $('#personanswersurveyquestionoption-36-0-option_answer').show(); 
        $('#personanswersurveyquestionoption-36-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-36-0-option_answer], input#personanswersurveyquestionoption-35-0-option_answer').show();
        $('label[for=personanswersurveyquestionoption-36-1-option_answer], input#personanswersurveyquestionoption-35-1-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-36-0-option_answer').hide(); 
        $('#personanswersurveyquestionoption-36-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-36-0-option_answer], input#personanswersurveyquestionoption-36-0-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-36-1-option_answer], input#personanswersurveyquestionoption-36-1-option_answer').hide();
    }
});
$("#personanswersurveyquestion-37-answer").on("change", function()
{
    if($(this).val() === '1') 
    { 
        $('#personanswersurveyquestionoption-37-0-option_answer').show(); 
        $('#personanswersurveyquestionoption-37-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-37-0-option_answer], input#personanswersurveyquestionoption-37-0-option_answer').show();
        $('label[for=personanswersurveyquestionoption-37-1-option_answer], input#personanswersurveyquestionoption-37-1-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-37-0-option_answer').hide(); 
        $('#personanswersurveyquestionoption-37-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-37-0-option_answer], input#personanswersurveyquestionoption-37-0-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-37-1-option_answer], input#personanswersurveyquestionoption-37-1-option_answer').hide();
    }
});
$("#personanswersurveyquestion-40-answer").on("change", function()
{
    if($(this).val() === '1') 
    { 
        $('#personanswersurveyquestionoption-40-0-option_answer').show(); 
        $('#personanswersurveyquestionoption-40-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-40-0-option_answer], input#personanswersurveyquestionoption-40-0-option_answer').show();
        $('label[for=personanswersurveyquestionoption-40-1-option_answer], input#personanswersurveyquestionoption-40-1-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-40-0-option_answer').hide(); 
        $('#personanswersurveyquestionoption-40-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-40-0-option_answer], input#personanswersurveyquestionoption-40-0-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-40-1-option_answer], input#personanswersurveyquestionoption-40-1-option_answer').hide();
    }
});
$("#personanswersurveyquestion-41-answer").on("change", function()
{
    if($(this).val() === '1') 
    { 
        $('#personanswersurveyquestionoption-41-0-option_answer').show(); 
        $('#personanswersurveyquestionoption-41-1-option_answer').show();
        $('#personanswersurveyquestionoption-41-2-option_answer').show();
        $('label[for=personanswersurveyquestionoption-41-0-option_answer], input#personanswersurveyquestionoption-41-0-option_answer').show();
        $('label[for=personanswersurveyquestionoption-41-1-option_answer], input#personanswersurveyquestionoption-41-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-41-2-option_answer], input#personanswersurveyquestionoption-41-2-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-41-0-option_answer').hide(); 
        $('#personanswersurveyquestionoption-41-1-option_answer').hide();
        $('#personanswersurveyquestionoption-41-2-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-41-0-option_answer], input#personanswersurveyquestionoption-41-0-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-41-1-option_answer], input#personanswersurveyquestionoption-41-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-41-2-option_answer], input#personanswersurveyquestionoption-41-2-option_answer').hide();
    }
});
$("#personanswersurveyquestion-42-answer").on("change", function()
{
    if($(this).val() === '1') { 
        $('#personanswersurveyquestionoption-42-0-option_answer').show(); 
        $('#personanswersurveyquestionoption-42-1-option_answer').show();
        $('#personanswersurveyquestionoption-42-2-option_answer').show();
        $('label[for=personanswersurveyquestionoption-42-0-option_answer], input#personanswersurveyquestionoption-42-0-option_answer').show();
        $('label[for=personanswersurveyquestionoption-42-1-option_answer], input#personanswersurveyquestionoption-42-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-42-2-option_answer], input#personanswersurveyquestionoption-42-2-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-42-0-option_answer').hide(); 
        $('#personanswersurveyquestionoption-42-1-option_answer').hide();
        $('#personanswersurveyquestionoption-42-2-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-42-0-option_answer], input#personanswersurveyquestionoption-42-0-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-42-1-option_answer], input#personanswersurveyquestionoption-42-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-42-2-option_answer], input#personanswersurveyquestionoption-42-2-option_answer').hide();
    }
});
$("#personanswersurveyquestion-43-answer").on("change", function()
{
    if($(this).val() === '1') 
    { 
        $('#personanswersurveyquestionoption-43-0-option_answer').show(); 
        $('#personanswersurveyquestionoption-43-1-option_answer').show();
        $('#personanswersurveyquestionoption-43-2-option_answer').show();
        $('label[for=personanswersurveyquestionoption-43-0-option_answer], input#personanswersurveyquestionoption-43-0-option_answer').show();
        $('label[for=personanswersurveyquestionoption-43-1-option_answer], input#personanswersurveyquestionoption-43-1-option_answer').show();
        $('label[for=personanswersurveyquestionoption-43-2-option_answer], input#personanswersurveyquestionoption-43-2-option_answer').show();
    }
    else 
    {
        $('#personanswersurveyquestionoption-43-0-option_answer').hide(); 
        $('#personanswersurveyquestionoption-43-1-option_answer').hide();
        $('#personanswersurveyquestionoption-43-2-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-43-0-option_answer], input#personanswersurveyquestionoption-43-0-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-43-1-option_answer], input#personanswersurveyquestionoption-43-1-option_answer').hide();
        $('label[for=personanswersurveyquestionoption-43-2-option_answer], input#personanswersurveyquestionoption-43-2-option_answer').hide();
    }
});

function setActiveTab(divID2Enable) {
    $('.li_form_navs').removeClass('active');
    $('#' + divID2Enable).addClass('active');
}