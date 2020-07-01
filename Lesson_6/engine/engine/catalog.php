<?php
function getCatalog() {
    return getAssocResult("SELECT * FROM goods");
}

function getItem(int $id)
{
    return getAssocResult("SELECT * FROM goods WHERE id = {$id}");
}
