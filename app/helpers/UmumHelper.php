
<?php
function user($col = null)
{
    $user = auth()->user();
    if ($col)
        return $user->{$col};
    return $user;
}
