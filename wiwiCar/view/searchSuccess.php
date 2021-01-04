<form id="form_search" method="get">
    <input id="action" type="hidden" name="action" value="result">
    <input type="text" list="depart" name="depart" <?php if ($context->depart) echo "value=\"".$context->depart."\"";  ?>>
    <datalist id="depart"><?php foreach ($context->tableData as $data): ?>
            <option><?php echo $data['depart'];?></option>
        <?php endforeach; ?>
    </datalist>
    <input type="text" list="arrivee" name="arrivee" <?php if ($context->arrivee) echo "value=\"".$context->arrivee."\"";  ?>>
    <datalist id="arrivee"><?php foreach ($context->tableData as $data): ?>
            <option><?php echo $data['depart'];?></option>
        <?php endforeach; ?>
    </datalist>
    <input id="submit_search" type="submit" value="chercher voyage">
</form>


