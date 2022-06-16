@props(['val', 'ctl', 'old' => ''])

<option value={{ $val }} {{ old($ctl) == $val || $old == $val ? 'selected' : '' }}>{{ $val }}</option>
