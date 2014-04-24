<div>
<legend> Question </legend>
     <select class="source" id="selType">
    <option>Select</option>
    <option value="A1"> Answer1 </option>
    <option value="A2"> Answer2 </option>
    <option value="A3"> Answer3 </option>
</select>
</div>
<div id="Answers">
<div id="A1" style="display: none;">
    <select id="Option1">
    <label>Select Workshop</label>
    <option value="1"> 1 </option>
    <option value="2"> 2 </option>
    <option value="3"> 3 </option>
    </select>
</div>

<div id="A2" style="display: none;">
    <select id="Option2">
        <-- list items -->
    </select>
</div>

<div id="A3" style="display: none;">
    <select id="Option3">
        <-- list items -->
    </select>
</div>
</div>  

<script>
$(function () {
$('#selType').change(function () {
    $('#Answers > div').hide();
    $('#Answers').find('#' + $(this).val()).show();
});
});
</script>